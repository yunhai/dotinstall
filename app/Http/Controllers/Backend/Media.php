<?php
namespace App\Http\Controllers\Backend;

use App\Http\Service\Common\Upload\ChunkUpload;
use App\Http\Service\Common\Upload\ContentUpload;
use App\Models\Backend\Media as MediaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Media extends Base
{
    public function __construct(
        MediaModel $media_model
    ) {
        $this->model = $media_model;
    }

    public function postChunk(Request $request)
    {
        $uploader = new ChunkUpload();
        $info = $uploader->save($request, 'media');
        return response()->json($info);
    }

    public function getChecksum(Request $request)
    {
        $media = $request->get('path');
        $check_sum = $request->get('checksum');

        $path = Storage::disk('media')->path($media);
        $md5 = shell_exec('md5sum ' . escapeshellarg($path));
        if ($md5) {
            $tmp = explode(' ', $md5);
            $md5 = array_shift($tmp);
        }

        $result = ($check_sum == $md5);
        return $this->json(compact('result', 'md5', 'check_sum', 'path'));
    }

    public function getDownload(int $media_id)
    {
        set_time_limit(3600);

        $target = $this->model->get($media_id);

        $fs = Storage::disk('media')->getDriver();

        $file_path = $target['path'];
        $file_name = $target['original_name'];
        $file_mime = $target['mime'];
        $file_size = $target['size'];
        $handle = $fs->readStream($file_path);

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Transfer-Encoding: binary');
        header('Content-Disposition: attachment; filename="' . $file_name . '";');
        header('Content-Type: ' . $file_mime);
        header('Content-Length: ' . $file_size);

        $chunkSize = 1024 * 1024;

        while (!feof($handle)) {
            $buffer = fread($handle, $chunkSize);
            echo $buffer;
            ob_flush();
            flush();
        }

        fclose($handle);
        return '';
    }

    public function postContent(Request $request)
    {
        $uploader = new ContentUpload();
        $info = $uploader->save($request->all(), 'media');
        return response()->json($info);
    }
}

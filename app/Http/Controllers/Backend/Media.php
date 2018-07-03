<?php
namespace App\Http\Controllers\Backend;

use App\Http\Service\Common\Upload\ChunkUpload;
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

    public function getDownload(int $media_id)
    {
        $target = $this->model->get($media_id);

        return response(Storage::disk('media')->get($target['path']))
            ->header('Content-Type', $target['mime'])
            ->header('Content-Disposition', 'attachment; filename="' . $target['original_name'] . '"');
    }
}

#mklink /j /path/to/laravel/public/avatars /path/to/laravel/storage/avatars
#ln -s "$(pwd)/storage/app/media" "$(pwd)/public/media"

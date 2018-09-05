<?php

namespace App\Http\Service\Common\Upload;

use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class ChunkUpload extends BasicUpload
{
    public function upload($request, string $disk_name, string $path = null)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        $save = $receiver->receive();
        if ($save->isFinished()) {
            $thumbnail = $request->query('thumbnail') ? true : false;
            $width = $request->query('width') ?? 420;

            $result = $this->store($save->getFile(), $disk_name, $path, $thumbnail, $width);

            return array_merge($result, ['done' => 100]);
        }

        $handler = $save->handler();

        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function save($request, string $disk_name, string $path = null)
    {
        $result = $this->upload($request, $disk_name, $path);
        if ($result['done'] === 100) {
            $result['type'] = $request->query('media_type');
            $result = $this->saveDb($result);
    
            $result['url'] = Storage::disk($disk_name)->url($result['path']);
        }
        return $result;
    }
}

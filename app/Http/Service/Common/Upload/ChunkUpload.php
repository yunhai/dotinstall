<?php

namespace App\Http\Service\Common\Upload;

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
            $result = $this->store($save->getFile(), $disk_name, $path);
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
            return $this->saveDb($result);
        }
        return $result;
    }
}

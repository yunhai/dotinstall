<?php

namespace App\Http\Service\Common\Upload;

use Illuminate\Http\UploadedFile;
use App\Models\Backend\Media;

class BasicUpload
{
    protected function generatePath(string $path = null)
    {
        $prefix = date('y/m/W');
        if ($path) {
            return $prefix . '/' .  $path;
        }
        return $prefix;
    }

    protected function store(UploadedFile $file, string $disk_name, string $path = null)
    {
        $location = $this->generatePath($path);

        $mime = $file->getClientMimeType();
        $original_name = $file->getClientOriginalName();
        $hash_name = $file->hashName();

        $extension = $file->extension();
        $size = $file->getClientSize();

        $path = $file->store($location, $disk_name);

        return compact('location', 'path', 'mime', 'original_name', 'hash_name', 'extension', 'size');
    }

    public function save(UploadedFile $file, string $disk_name, string $path = null)
    {
        $result = $this->store($file, $disk_name, $path);
        $target = (new Media())->create($result);

        return $target->toArray();
    }
}

<?php

namespace App\Http\Service\Common\Upload;

use App\Models\Backend\Media;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

    public function upload($target, string $disk_name, string $path = null)
    {
        return $this->store($target, $disk_name, $path);
    }

    protected function store(UploadedFile $file, string $disk_name, string $path = null, bool $thumbnail = false)
    {
        if ($thumbnail) {
            return $this->storeImage($file, $disk_name, $path);
        }

        $location = $this->generatePath($path);

        $mime = $file->getClientMimeType();
        $original_name = $file->getClientOriginalName();
        $hash_name = $file->hashName();

        $extension = substr($original_name, strrpos($original_name, '.') + 1);
        $extension = substr($extension, 0, 8);
        $size = $file->getClientSize();

        $hash_name = substr($hash_name, 0, strrpos($hash_name, '.') + 1);
        $hash_name = $hash_name . $extension;
        $path = $file->storeAs($location, $hash_name, ['disk' => $disk_name]);

        return compact('location', 'path', 'mime', 'original_name', 'hash_name', 'extension', 'size');
    }

    protected function storeImage(UploadedFile $file, string $disk_name, string $path = null)
    {
        $location = $this->generatePath($path);

        $mime = $file->getClientMimeType();
        $original_name = $file->getClientOriginalName();
        $hash_name = $file->hashName();

        $extension = substr($original_name, strrpos($original_name, '.'));
        $extension = substr($extension, 0, 8);
        $size = $file->getClientSize();

        $hash_name = substr($hash_name, 0, strrpos($hash_name, '.'));
        $path_original = $file->storeAs($location, "{$hash_name}_original{$extension}", ['disk' => $disk_name]);
        $path_new = Storage::disk($disk_name)->path("{$location}/{$hash_name}{$extension}");

        $path = "{$location}/{$hash_name}{$extension}";
        Image::make(Storage::disk($disk_name)->path($path_original))
                ->resize(420, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($path_new);

        $hash_name = trim($extension, '.');
        return compact('location', 'path', 'mime', 'original_name', 'hash_name', 'extension', 'size');
    }

    public function save($file, string $disk_name, string $path = null)
    {
        $result = $this->store($file, $disk_name, $path);
        return $this->saveDb($result);
    }

    protected function saveDb($result)
    {
        $target = (new Media())->create($result);

        return $target->toArray();
    }
}

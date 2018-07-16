<?php

namespace App\Http\Service\Common\Upload;

use Illuminate\Support\Facades\Storage;

class ContentUpload extends BasicUpload
{
    public function upload($input, string $disk_name, string $path = null)
    {
        $content = preg_replace('#^data:image/\w+;base64,#i', '', $input['content']);
        $content = str_replace(' ', '+', $content);
        $content = base64_decode($content);

        $extension = 'png';
        $hash_name = str_random(40) . '.' . $extension;
        $original_name = $input['name'];
        $location = $this->generatePath($path);
        $path = $location . '/' . $hash_name;

        $disk = Storage::disk($disk_name);
        $disk->put($path, $content);
        $size = $disk->size($path);
        $mime = $disk->mimeType($path);

        return compact('location', 'path', 'mime', 'original_name', 'hash_name', 'extension', 'size');
    }

    public function save($input, string $disk_name, string $path = null)
    {
        $result = $this->upload($input, $disk_name, $path);
        $result['type'] = $input['media_type'];
        $result = $this->saveDb($result);
        $result['url'] = Storage::disk($disk_name)->url($result['path']);
        return $result;
    }
}

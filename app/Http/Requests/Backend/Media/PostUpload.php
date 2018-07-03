<?php

namespace App\Http\Requests\Backend\Media;

use App\Http\Requests\Backend\Base;

class PostUpload extends Base
{
    public function rules()
    {
        return [
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $map = [
                'video' => ['mp4'],
                'image' => ['jpg', 'jpeg', 'png'],
                'attachment' => ['zip'],
                'document' => ['doc', 'docx']
            ];
            $media_type = $this->query('media_type');
            $ext = pathinfo($this->query('resumableFilename'), PATHINFO_EXTENSION);
            if (!in_array($media_type, $map[$media_type])) {
                return response()->json([
                    'done' => 0,
                    'status' => false
                ], 400);
            }
        });
    }
}

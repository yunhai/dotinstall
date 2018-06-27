<?php
namespace App\Http\Controllers\Backend;

use App\Http\Service\Common\Upload\ChunkUpload;
use Illuminate\Http\Request;

class Media extends Base
{
    public function postChunk(Request $request)
    {
        $uploader = new ChunkUpload();
        $info = $uploader->save($request, 'video');
        return response()->json($info);
    }
}

#mklink /j /path/to/laravel/public/avatars /path/to/laravel/storage/avatars
#ln -s "$(pwd)/storage/app/media" "$(pwd)/public/media"

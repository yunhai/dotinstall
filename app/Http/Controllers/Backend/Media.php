<?php
namespace App\Http\Controllers\Backend;

use App\Http\Service\Common\Upload\ChunkUpload;
use Illuminate\Http\Request;

class Media extends Base
{
    public function postChunk(Request $request)
    {
        $media_type = $request->query('resumableType');
        $type = $request->query('type');
        
        $uploader = new ChunkUpload();
        $info = $uploader->save($request, 'video');
        
        
        $info = array_merge($info, compact('type', 'media_type'));
        return response()->json($info);
    }
}

#mklink /j /path/to/laravel/public/avatars /path/to/laravel/storage/avatars
#ln -s "$(pwd)/storage/app/media" "$(pwd)/public/media"

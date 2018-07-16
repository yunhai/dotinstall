<?php
namespace App\Http\Controllers;

use App\Models\Media as MediaModel;
use Illuminate\Support\Facades\Storage;

class Media extends Base
{
    public function __construct(
        MediaModel $media_model
    ) {
        $this->model = $media_model;
    }

    public function getDownload(int $media_id)
    {
        $target = $this->model->get($media_id);

        return response(Storage::disk('media')->get($target['path']))
            ->header('Content-Type', $target['mime'])
            ->header('Content-Disposition', 'attachment; filename="' . $target['original_name'] . '"');
    }
}

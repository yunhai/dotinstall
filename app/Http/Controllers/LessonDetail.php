<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LessonDetail as LessonDetailModel;

class LessonDetail extends Controller
{
    public function __construct(
        LessonDetailModel $lesson_detail_model
    ) {
        $this->model = $lesson_detail_model;
    }

    public function getDetail($lesson_id, $lesson_detail_id)
    {
        $lesson_details = $this->model::with(['poster'])
        ->where('id', '<>', $lesson_detail_id)
        ->where('lesson_id', $lesson_id)
        ->get();
        if (!empty($lesson_details)) {
            $lesson_details = $lesson_details->toArray();
        }
        return \View::make('lesson_detail')->with(
            compact(
                'lesson_id',
                'lesson_details'
            )
        );
    }
}

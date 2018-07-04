<?php

namespace App\Models\Backend\Traits\Lesson\LessonDetail;

use App\Models\Backend\Lesson\Lesson;

trait UpdateLessonVideoCount
{
    public static function bootUpdateLessonVideoCount()
    {
        static::created(function ($model) {
            $model->updateLessonVideoCount($model);
        });

        static::updated(function ($model) {
            $model->updateLessonVideoCount($model);
        });

        static::deleted(function ($model) {
            $model->updateLessonVideoCount($model);
        });
    }

    protected function updateLessonVideoCount($model)
    {
        (new Lesson())->updateVideoCount($model->lesson_id);
    }
}

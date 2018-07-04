<?php

namespace App\Models\Backend\Lesson;

use App\Models\Backend\Base;
use App\Models\Backend\Media;
use App\Models\Backend\Lesson\LessonDetail\LessonDetail;

class Lesson extends Base
{
    public $fillable = [
        'name',
        'caption',
        'poster',
        'note',
        'category_id',
        'video_count',
    ];

    public function posters()
    {
        return $this->hasMany(Media::class, 'id', 'poster');
    }

    public function getWithRelation(int $id)
    {
        $relations = [
            'posters'
        ];
        return $this
                ->with($relations)
                ->findOrFail($id);
    }

    public function updateVideoCount(int $lesson_id)
    {
        $count = LessonDetail::where('lesson_id', $lesson_id)
            ->count();

        $this
            ->where('id', $lesson_id)
            ->update(['video_count' => $count]);
    }
}

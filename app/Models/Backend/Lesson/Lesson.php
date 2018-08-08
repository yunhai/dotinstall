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
        'sort',
        'mode',
        'free_mode',
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

    public function sort(array $list)
    {
        foreach ($list as $index => $id) {
            $this->where('id', $id)->update(['sort' => ++$index]);
        }
    }
    
    public function getCount()
    {
        return $this->count();
    }

    public function remove($id)
    {
        parent::remove($id);
        $target = $this
                    ->select(['id', 'sort'])
                    ->withTrashed()
                    ->where('id', $id)
                    ->first();
        $this->where('sort', '>', $target->sort)
            ->decrement('sort', 1);
        return true;
    }
}

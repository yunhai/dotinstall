<?php

namespace App\Models\Backend\Lesson;

use App\Models\Backend\Base;
use App\Models\Backend\Media;
use App\Models\Backend\Lesson\LessonDetail\LessonDetail;
use App\Models\Backend\Setting;

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
        'difficulty',
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

    public function remove(int $id)
    {
        parent::remove($id);
        $target = $this
                    ->select(['id', 'sort'])
                    ->withTrashed()
                    ->where('id', $id)
                    ->first();

        $this->where('sort', '>', $target->sort)
             ->decrement('sort', 1);

        $lesson_detail_model = new LessonDetail();
        $lesson_detail_model->where('lesson_id', $id)->delete();

        return true;
    }

    public function statLesson()
    {
        $list = $this->all()->toArray();

        $total_lesson = count($list);
        $total_enable_lesson = count(array_filter($list, function ($item) {
            return $item['mode'] == MODE_ENABLE && $item['video_count'];
        }));

        $setting_model = new Setting();
        $setting_model->where('key', 'total_lesson')
                    ->update(['value' => $total_lesson]);
        $setting_model->where('key', 'total_enable_lesson')
                    ->update(['value' => $total_enable_lesson]);
    }
}

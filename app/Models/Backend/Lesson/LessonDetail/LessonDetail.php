<?php

namespace App\Models\Backend\Lesson\LessonDetail;

use App\Models\Backend\Base;
use App\Models\Backend\Media;
use App\Models\Backend\Setting;
use App\Models\Backend\Traits\Lesson\LessonDetail\UpdateLessonVideoCount;

class LessonDetail extends Base
{
    use UpdateLessonVideoCount;

    public $fillable = [
        'name',
        'caption',
        'lesson_id',
        'video',
        'url',
        'url_female',
        'default_gender',
        'duration',
        'duration_female',
        'poster',
        'sort',
        'mode',
        'free_mode',
        'new_mode',
    ];

    public function resources()
    {
        return $this->hasMany(LessonDetailAttachment::class)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE);
    }

    public function source_codes()
    {
        return $this->hasMany(LessonDetailAttachment::class)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE);
    }

    public function videos()
    {
        return $this->hasMany(Media::class, 'id', 'video');
    }

    public function posters()
    {
        return $this->hasMany(Media::class, 'id', 'poster');
    }

    public function source_code_contents()
    {
        return $this->hasMany(LessonDetailAttachment::class)
                    ->where('ref_id', '<>', 0)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT);
    }

    public function getWithRelation($id)
    {
        $relations = [
            'resources',
            'resources.media',
            'source_codes',
            'source_codes.media',
            'source_code_contents',
            'source_code_contents.media',
            'videos',
            'posters'
        ];
        return $this
                ->with($relations)
                ->findOrFail($id);
    }

    public function create($input)
    {
        $result = parent::create($input);
        if (!empty($input['lesson_detail_attachments'])) {
            $input = data_set($input['lesson_detail_attachments'], '*.lesson_detail_id', $result->id);
            (new LessonDetailAttachment)->createMany($input);
        }
        return $result;
    }

    public function edit(int $id, array $input = [])
    {
        $result = parent::edit($id, $input);

        $input = data_set($input['lesson_detail_attachments'], '*.lesson_detail_id', $id);

        (new LessonDetailAttachment)->editMany($input, $id);
        return $result;
    }

    public function statLessonDetail()
    {
        $list = $this->all()->toArray();

        $total_video = count($list);
        $total_enable_video = count(array_filter($list, function ($item) {
            return $item['mode'] == MODE_ENABLE;
        }));

        $setting_model = new Setting();
        $setting_model->where('key', 'total_video')
                    ->update(['value' => $total_video]);
        $setting_model->where('key', 'total_enable_video')
                    ->update(['value' => $total_enable_video]);
    }
}

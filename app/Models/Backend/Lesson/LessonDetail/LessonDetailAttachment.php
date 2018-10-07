<?php

namespace App\Models\Backend\Lesson\LessonDetail;

use App\Models\Backend\Base;
use App\Models\Backend\Media;

class LessonDetailAttachment extends Base
{
    public $fillable = [
        'lesson_detail_id',
        'media_id',
        'type',
        'language',
        'ref_id',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function createMany($input)
    {
        $source_code_content = [];
        $ref = [];
        foreach ($input as $item) {
            if ($item['type'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) {
                array_push($source_code_content, $item);
                continue;
            }
            $target = $this->create($item);
            $ref[$item['media_id']] = $target->id;
        }

        foreach ($source_code_content as $item) {
            $item['ref_id'] = $ref[$item['ref_media_id']] ?? 0;
            $this->create($item);
        }
    }

    public function editMany($input, $lesson_detail_id)
    {
        $input_media_id = data_get($input, '*.media_id');

        $old = $this
            ->select('id', 'media_id')
            ->where('lesson_detail_id', $lesson_detail_id)
            ->get()
            ->pluck('media_id')
            ->toArray();

        $delete_media_id = array_diff($old, $input_media_id);

        $source_code_content = [];
        $ref = [];
        foreach ($input as $item) {
            if ($item['type'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) {
                array_push($source_code_content, $item);
                continue;
            }

            if (empty($item['id'])) {
                $target = $this->create($item);
                $ref[$item['media_id']] = $target->id;
            } else {
                $data = array_intersect_key($item, array_flip($this->fillable));
                $this->where('id', $item['id'])->update($data);
            }
        }

        foreach ($source_code_content as $item) {
            $item['ref_id'] = $ref[$item['ref_media_id']] ?? 0;
            $this->create($item);
        }

        $delete_id = $this->select('id')
                        ->where('lesson_detail_id', $lesson_detail_id)
                        ->whereIn('media_id', $delete_media_id)
                        ->whereIn('type', [LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE, LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE])
                        ->get()
                        ->pluck('id', 'id')
                        ->toArray();

        $this->whereIn('id', $delete_id)
            ->delete();

        $this->whereIn('ref_id', $delete_id)
            ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT)
            ->delete();
    }

    public function getByLessonDetailId(int $lesson_detail_id)
    {
        return $this->with($with)
                    ->where('lesson_detail_id', $lesson_detail_id)
                    ->where('ref_id', '<>', 0)
                    ->where('type', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT)
                    ->get();
    }
}

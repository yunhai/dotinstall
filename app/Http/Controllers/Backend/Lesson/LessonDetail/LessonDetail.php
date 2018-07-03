<?php

namespace App\Http\Controllers\Backend\Lesson\LessonDetail;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Lesson\LessonDetail\PostInput;
use App\Models\Backend\Lesson\LessonDetail\LessonDetail as LessonDetailModel;
use Illuminate\Support\Facades\Storage;

class LessonDetail extends Base
{
    public function __construct(
        LessonDetailModel $model
    ) {
        $this->model = $model;
    }

    public function getCreate()
    {
        return $this->render('lesson.lesson_detail.input');
    }

    public function postCreate(PostInput $request, int $lesson_id)
    {
        $input = $request->all();
        $input = $this->format($input, $lesson_id);

        $target = $this->model->create($input);

        $lesson_detail_id = $target->id;
        return redirect()->route('lesson_detail.edit', compact('lesson_id', 'lesson_detail_id'));
    }

    protected function format(array $input, int $lesson_id, int $lesson_detail_id = 0, bool $mode = MODE_CREATE)
    {
        $input['lesson_id'] = $lesson_id;

        $input['poster'] = empty($input['poster']) ? 0 : key($input['poster']);
        $input['video'] = empty($input['video']) ? 0 : key($input['video']);

        $map = [
            'source_code' => LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE,
            'resource' => LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE,
        ];
        $attachments = [];
        foreach ($map as $key => $value) {
            if (!empty($input[$key])) {
                foreach ($input[$key] as $item) {
                    $tmp = [
                        'media_id' => $item['id'],
                        'type' => $value
                    ];
                    array_push($attachments, $tmp);
                }
                unset($input[$key]);
            }
        }
        $input['lesson_detail_attachments'] = $attachments;
        return $input;
    }

    public function getEdit($lesson_id, $lesson_media_id)
    {
        $target = $this->model->getWithRelation($lesson_media_id, false);
        return $this->render('lesson.lesson_detail.input', compact('target'));
    }

    public function postEdit(PostInput $request, $lesson_id, $lesson_detail_id)
    {
        $input = $request->all();
        $input = $this->format($input, $lesson_id, $lesson_detail_id, MODE_EDIT);
        $this->model->edit($lesson_detail_id, $input);

        return redirect()->route('lesson_detail.edit', compact('lesson_id', 'lesson_detail_id'));
    }

    public function getIndex($lesson_id)
    {
        $data = $this->model->orderBy('sort')->paginate(20);
        return $this->render('lesson.lesson_detail.index', compact('data', 'lesson_id'));
    }

    public function getDelete($lesson_id, $lesson_detail_id)
    {
        $this->model->remove($lesson_detail_id);
        return redirect()->route('lesson_detail.index', compact('lesson_id'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\LessonMedia\PostInput;
use App\Models\Backend\LessonMedia as LessonMediaModel;

class LessonMedia extends Base
{
    public function __construct(
        LessonMediaModel $lesson_media_model
    ) {
        $this->model = $lesson_media_model;
    }
    
    public function getEdit($lesson_id, $lesson_media_id)
    {
        $target = $this->model->get($lesson_media_id);
        return $this->render('lesson_media.input', compact('target'));
    }
    
    public function postEdit(PostInput $request, $lesson_id, $lesson_media_id)
    {
        $input = $request->all();
        $this->model->edit($lesson_media_id, $input);

        return redirect()->route('lesson.detail', $lesson_id);
    }
    
    public function getCreate()
    {
        return $this->render('lesson_media.input');
    }
    
    public function postCreate(PostInput $request, $lesson_id)
    {
        $input = $request->all();
        $input['lesson_id'] = $lesson_id;
        $this->model->create($input);

        return redirect()->route('lesson.detail', $lesson_id);
    }
    
    public function getDelete($lesson_id, $lesson_media_id)
    {
        $this->model->destroy($lesson_media_id);
        return redirect()->route('lesson.detail', $lesson_id);
    }
}

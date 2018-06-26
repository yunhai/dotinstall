<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Lesson\PostInput;
use App\Models\Backend\Lesson as LessonModel;

class Lesson extends Base
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }
    
    public function index()
    {
        $lessons = $this->model->paginate(20);
        return $this->render('lesson.index', compact('lessons'));
    }
    
    public function getEdit($id)
    {
        $target = $this->model->get($id);
        return $this->render('lesson.input', compact('target'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->edit($id, $input);

        return redirect()->route('lesson.index');
    }
    
    public function getCreate()
    {
        return $this->render('lesson.input');
    }
    
    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        $input['user_id'] = 1;
        $this->model->create($input);

        return redirect()->route('lesson.index');
    }
    
    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('lesson.index');
    }
    
    public function getDetail($id)
    {
        $lesson = $this->model->get($id);
        $lesson_media = LessonModel::find($id)->lesson_media()->paginate(20);
        return $this->render('lesson.detail', compact('id', 'lesson', 'lesson_media'));
    }
}

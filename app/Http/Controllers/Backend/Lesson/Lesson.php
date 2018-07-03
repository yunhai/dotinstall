<?php

namespace App\Http\Controllers\Backend\Lesson;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Lesson\PostInput;
use App\Models\Backend\Lesson as LessonModel;

class Lesson extends Base
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }

    public function getIndex()
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

    public function postDelete($id)
    {
        $this->model->remove($id);
        return redirect()->route('lesson.index');
    }

    public function getCreate()
    {
        return $this->render('lesson.input');
    }

    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        $this->model->create($input);

        return redirect()->route('lesson.index');
    }

    public function getDelete($id)
    {
        $this->model->remove($id);
        return redirect()->route('lesson.index');
    }
}

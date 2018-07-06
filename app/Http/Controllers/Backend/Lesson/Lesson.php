<?php

namespace App\Http\Controllers\Backend\Lesson;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Lesson\PostInput;
use App\Models\Backend\Lesson\Lesson as LessonModel;
use App\Models\Backend\MsCategory as MsCategoryModel;

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
        $form = $this->form();

        return $this->render('lesson.index', compact('lessons', 'form'));
    }

    public function getEdit($id)
    {
        $target = $this->model->getWithRelation($id);
        $option = [
            'target' => $target,
            'form' => $this->form()
        ];

        return $this->render('lesson.input', $option);
    }

    public function postEdit(PostInput $request, int $lesson_id)
    {
        $input = $this->makeInput($request, $lesson_id, MODE_EDIT);
        $this->model->edit($lesson_id, $input);

        return redirect()->route('backend.lesson.edit', compact('lesson_id'));
    }

    public function getCreate()
    {
        $option = [
            'form' => $this->form()

        ];
        return $this->render('lesson.input', $option);
    }

    public function postCreate(PostInput $request)
    {
        $input = $this->makeInput($request);
        $target = $this->model->create($input);

        $lesson_id = $target->id;
        return redirect()->route('backend.lesson.edit', compact('lesson_id'));
    }

    public function getDelete($id)
    {
        $this->model->remove($id);
        return redirect()->route('backend.lesson.index');
    }

    protected function makeInput(PostInput $request, int $id = 0, bool $mode = MODE_CREATE)
    {
        $input = $request->all();
        $input['poster'] = empty($input['poster']) ? 0 : key($input['poster']);

        return $input;
    }

    private function form($available_category = true)
    {
        $category = $this->getAvailableCategory();
        $mode = config('master.common.mode');
        return compact('category', 'mode');
    }

    private function getAvailableCategory($available_category = true)
    {
        $func = $available_category ? 'availableList' : 'allList';
        $model = new MsCategoryModel();
        return $model->$func();
    }
}

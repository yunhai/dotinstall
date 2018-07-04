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
        $category = $this->getCategory();

        foreach ($lessons as $item) {
            $item->category_name = $category[$item->category_id] ?? '';
        }

        return $this->render('lesson.index', compact('lessons'));
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

        return redirect()->route('lesson.edit', compact('lesson_id'));
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
        $this->model->create($input);

        return redirect()->route('lesson.index');
    }

    public function getDelete($id)
    {
        $this->model->remove($id);
        return redirect()->route('lesson.index');
    }

    protected function makeInput(PostInput $request, int $id = 0, bool $mode = MODE_CREATE)
    {
        $input = $request->all();
        $input['poster'] = empty($input['poster']) ? 0 : key($input['poster']);

        return $input;
    }

    private function form()
    {
        $category = $this->getCategory();

        return compact('category');
    }

    private function getCategory()
    {
        $model = new MsCategoryModel();
        return $model->availableList();
    }
}

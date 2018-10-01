<?php

namespace App\Http\Controllers\Backend\MsCategory;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\MsCategory\Attribute\PostInput;
use App\Models\Backend\MsCategory as MsCategoryModel;
use App\Models\Backend\MsCategory\MsCategoryAttribute as MsCategoryAttributeModel;

class Attribute extends Base
{
    public function __construct(
        MsCategoryAttributeModel $model,
        MsCategoryModel $ms_category_model
    ) {
        $this->model = $model;
        $this->ms_category_model = $ms_category_model;
    }

    public function getIndex()
    {
        $ms_categories = $this->model->orderBy('id')->paginate(20);
        $form = $this->form();

        return $this->render('ms_category.attribute.index', compact('ms_categories', 'form'));
    }

    public function getEdit($id)
    {
        $target = $this->model->getWithRelation($id);
        $media = $target->media->toArray();

        $target = $target->toArray();
        $target['media'] = [$media];
        $form = $this->form();

        return $this->render('ms_category.attribute.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $this->makeInput($request);
        $this->model->edit($id, $input);

        return redirect()->route('backend.ms_category.attribute.index')->with('input.success', 'input.success');
    }

    public function getCreate()
    {
        $form = $this->form();

        return $this->render('ms_category.attribute.input', compact('form'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $this->makeInput($request);
        $target = $this->model->create($input);

        return redirect()->route('backend.ms_category.attribute.index')->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);

        return redirect()->route('backend.ms_category.attribute.index')->with('delete.success', 'delete.success');
    }

    protected function form()
    {
        $ms_category = $this->ms_category_model->availableList();

        return [
            'mode' => config('master.common.mode'),
            'level' => config('master.lesson.difficulty'),
            'ms_category' => $ms_category
        ];
    }

    protected function makeInput(PostInput $request)
    {
        $input = $request->all();
        $input['mode'] = 1;
        $input['sort'] = 1;

        $input['media_id'] = is_array($input['media_id']) ? key($input['media_id']) : 0;

        return $input;
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\MsCategory\PostInput;
use App\Models\Backend\MsCategory as MsCategoryModel;

class MsCategory extends Base
{
    public function __construct(
        MsCategoryModel $ms_category_model
    ) {
        $this->model = $ms_category_model;
    }

    public function getIndex()
    {
        $ms_categories = $this->model->orderBy('id')->paginate(20);
        $form = $this->form();
        return $this->render('ms_category.index', compact('ms_categories', 'form'));
    }

    public function getEdit($id)
    {
        $form = $this->form();

        $target = $this->model->getWithRelation($id);
        $media = $target->media->toArray();
        $target = $target->toArray();
        $target['media'] = [$media];
        return $this->render('ms_category.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $this->makeInput($request);
        $this->model->edit($id, $input);

        return redirect()->route('backend.ms_category.index')->with('input.success', 'input.success');
    }

    public function getCreate()
    {
        $form = $this->form();
        return $this->render('ms_category.input', compact('form'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $this->makeInput($request);
        // dd($input);
        $target = $this->model->create($input);
        return redirect()->route('backend.ms_category.index')->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('backend.ms_category.index')->with('delete.success', 'delete.success');
    }

    protected function form()
    {
        return [
            'mode' => config('master.common.mode'),
            'level' => config('master.ms_category.level')
        ];
    }

    protected function makeInput(PostInput $request)
    {
        $input = $request->all();
        $input['mode'] = 1;
        $input['sort'] = 1;

        if (!empty($input['media_id'])) {
            $input['media_id'] = key($input['media_id']);
        }

        return $input;
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Setting\PostInput;
use App\Models\Backend\Setting as SettingModel;

class Setting extends Base
{
    public function __construct(
        SettingModel $setting_model
    ) {
        $this->model = $setting_model;
    }

    public function getIndex()
    {
        $data = $this->model->orderBy('id')->paginate(20);
        return $this->render('setting.index', compact('data'));
    }

    public function getEdit($id)
    {
        $target = $this->model->get($id);
        $form = $this->form();
        return $this->render('setting.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $this->makeInput($request);
        $this->model->edit($id, $input);

        return redirect()->route('backend.setting.index')->with('input.success', 'input.success');
    }

    public function getCreate()
    {
        $form = $this->form();
        return $this->render('setting.input', compact('form'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $this->makeInput($request);
        $target = $this->model->create($input);
        return redirect()->route('backend.setting.index')->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('backend.setting.index')->with('delete.success', 'delete.success');
    }

    protected function form()
    {
        return [
            'mode' => config('master.common.mode')
        ];
    }

    protected function makeInput(PostInput $request)
    {
        $input = $request->all();

        return $input;
    }
}

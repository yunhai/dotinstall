<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Affiliator\PostInput;
use App\Models\Backend\Affiliator as AffiliatorModel;

class Affiliator extends Base
{
    public function __construct(
        AffiliatorModel $model
    ) {
        $this->model = $model;
    }

    public function getIndex()
    {
        $data = $this->model->paginate(20);
        $form = $this->form();
        return $this->render('affiliator.index', compact('data', 'form'));
    }

    public function getEdit($id)
    {
        $target = $this->model->get($id);

        $form = $this->form();
        return $this->render('affiliator.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->edit($id, $input);

        return redirect()->route('backend.affiliator.edit', ['affiliator_id' => $id]);
    }

    public function getCreate()
    {
        $form = $this->form();
        $target['password'] = $this->generatePassword();
        return $this->render('affiliator.input', compact('form', 'target'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        $input['token'] = $this->generateToken();
        $target = $this->model->create($input);
        $affiliator_id = $target->id;
        return redirect()->route('backend.affiliator.edit', compact('affiliator_id'));
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('backend.affiliator.index');
    }

    protected function form()
    {
        return [
            'mode' => config('master.common.mode')
        ];
    }

    protected function generateToken()
    {
        return str_random(4) . dechex(time()) . str_random(4);
    }

    protected function generatePassword()
    {
        return str_random(8);
    }
}

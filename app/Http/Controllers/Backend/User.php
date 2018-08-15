<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\PostInput;
use App\Http\Requests\Backend\User\GetFilter;

use App\Models\Backend\User as UserModel;

class User extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function getIndex(GetFilter $request)
    {
        $filter_form = $request->all();
        $data = $this->model->get($filter_form);
        $form = $this->form();
        return $this->render('user.index', compact('data', 'filter_form', 'form'));
    }
    
    private function form()
    {
        return [
            'grade' => config('master.user.grade'),
            'mode' => config('master.user.mode'),
        ];
    }

    public function getEdit($id)
    {
        $target = $this->model->findOrFail($id);
        return $this->render('user.input', compact('target'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->findOrFail($id)->update($input);

        return redirect()
                  ->route('backend.user.index')
                  ->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()
                    ->route('backend.user.index')
                    ->with('delete.success', 'delete.success');
    }
}

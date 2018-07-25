<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\PostInput;
use App\Models\Backend\User as UserModel;

class User extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function getIndex()
    {
        $users = $this->model->orderBy('id', 'desc')->paginate(20);
        return $this->render('user.index', compact('users'));
    }

    public function getEdit($id)
    {
        $target = $this->model->findOrFail($id);
        return $this->render('user.input', compact('target'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->findOrFail($id)->update($input);;

        return redirect()->route('backend.user.index');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('backend.user.index');
    }
}

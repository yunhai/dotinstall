<?php

namespace App\Http\Requests\Backend\User;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\User as UserModel;

class PostInput extends Base
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route()->parameter('user_id');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ];
    }
}

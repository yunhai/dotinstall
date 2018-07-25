<?php

namespace App\Http\Requests\Backend\User;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\User as UserModel;

class PostChangePasswordInput extends Base
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
        return [
            'password' => 'required|min:6',
        ];
    }
}

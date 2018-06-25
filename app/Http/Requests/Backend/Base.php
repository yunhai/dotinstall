<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

// use Illuminate\Support\Facades\Gate;

class Base extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function all($keys = null)
    {
        $list = array_keys($this->rules());
        $input = parent::all($keys);

        $result = [];
        foreach ($list as $path) {
            if (array_has($input, $path)) {
                array_set($result, $path, array_get($input, $path));
            }
        }

        return $result;
    }
}

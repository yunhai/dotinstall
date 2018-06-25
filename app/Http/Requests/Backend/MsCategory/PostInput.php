<?php

namespace App\Http\Requests\Backend\MsCategory;

use App\Http\Requests\Backend\Base;
use App\Models\Backend\MsCategory as MsCategoryModel;

class PostInput extends Base
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'sort' => 'nullable|integer',
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            if ($this->checkUniqueName($data['name'])) {
                $validator->errors()->add('name', 'カテゴリー名は既に存在しています');
            }
        });
    }
    
    public function checkUniqueName($name)
    {
        $id = $this->route()->parameter('ms_category_id');
        $ms_categories = MsCategoryModel::where('deleted_at', NULL)
            ->where('name', $name)
            ->where('id', '<>' , $id)
            ->first();
        return !empty($ms_categories) ? true : false;
    }
}

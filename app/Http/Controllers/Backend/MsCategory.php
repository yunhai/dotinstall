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
        $ms_categories = $this->model->paginate(20);
        return $this->render('ms_category.index', compact('ms_categories'));
    }

    public function getEdit($id)
    {
        $target = $this->model->get($id);
        return $this->render('ms_category.input', compact('target'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->edit($id, $input);

        return redirect()->route('ms_category.index');
    }

    public function getCreate()
    {
        return $this->render('ms_category.input');
    }

    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        $this->model->create($input);

        return redirect()->route('ms_category.index');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('ms_category.index');
    }
}

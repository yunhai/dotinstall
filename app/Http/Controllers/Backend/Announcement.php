<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Notification\PostInput;
use App\Models\Backend\Announcement as AnnouncementModel;

class Announcement extends Base
{
    public function __construct(
        AnnouncementModel $model
    ) {
        $this->model = $model;
    }

    public function getIndex()
    {
        $data = $this->model->orderBy('id', 'desc')->paginate(20);
        $form = $this->form();
        return $this->render('announcement.index', compact('data', 'form'));
    }

    public function getEdit($id)
    {
        $target = $this->model->get($id);
        $form = $this->form(MODE_EDIT);
        return $this->render('announcement.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->edit($id, $input);

        return redirect()
                  ->route('backend.announcement.index')
                  ->with('input.success', 'input.success');
    }

    public function getCreate()
    {
        $form = $this->form(MODE_CREATE);
        return $this->render('announcement.input', compact('form'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        $target = $this->model->create($input);

        return redirect()
                  ->route('backend.announcement.index')
                  ->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()
                ->route('backend.announcement.index')
                ->with('delete.success', 'delete.success');
    }

    protected function form(int $mode = 0)
    {
        return [
            'mode' => $mode
        ];
    }
}

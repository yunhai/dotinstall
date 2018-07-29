<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\YoutubeLink\PostInput;
use App\Models\Backend\YoutubeLink as YoutubeLinkModel;

class YoutubeLink extends Base
{
    public function __construct(
        YoutubeLinkModel $youtube_link_model
    ) {
        $this->model = $youtube_link_model;
    }

    public function getIndex()
    {
        $data = $this->model->paginate(20);
        $form = $this->form();
        return $this->render('youtube_link.index', compact('data', 'form'));
    }

    public function getEdit($id)
    {
        $target = $this->model->get($id);
        $form = $this->form();

        return $this->render('youtube_link.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->edit($id, $input);

        $form = $this->form();
        return $this->render('youtube_link.index', compact('data', 'form'));
    }

    public function getCreate()
    {
        $form = $this->form();

        $target = [
            'mode' => MODE_ENABLE
        ];
        return $this->render('youtube_link.input', compact('form', 'target'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        $target = $this->model->create($input);

        $form = $this->form();
        return $this->render('youtube_link.index', compact('data', 'form'));
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()->route('backend.youtube_link.index');
    }

    protected function form()
    {
        return [
            'mode' => config('master.common.mode')
        ];
    }
}

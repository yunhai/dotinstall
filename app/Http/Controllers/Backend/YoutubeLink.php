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
        $target = $this->model->getWithRelation($id, false);
        $form = $this->form();
        
        $youtube_link_media = [];
        foreach ($target->youtube_link_media as $item) {
            $tmp = $item->media->toArray();
            $tmp['url'] = $item->url;
            array_push($youtube_link_media, $tmp);
        }
        $target = $target->toArray();
        $target['youtube_link_media'] = $youtube_link_media;
        
        return $this->render('youtube_link.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $this->format($request->all());
        $this->model->edit($id, $input);

        return redirect()
                  ->route('backend.youtube_link.index')
                  ->with('input.success', 'input.success');
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
        $input = $this->format($request->all());
        $target = $this->model->create($input);
        return redirect()
                  ->route('backend.youtube_link.index')
                  ->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()
                  ->route('backend.youtube_link.index')
                  ->with('delete.success', 'delete.success');
    }

    protected function form()
    {
        return [
            'mode' => config('master.common.mode'),
            'type' => config('master.youtube.type'),
        ];
    }

    protected function format(array $input)
    {
        if (!empty($input['media_id'])) {
            foreach ($input['media_id'] as $media_id => $item) {
                $input['youtube_link_media'][$media_id] = [
                    'media_id' => $media_id,
                    'url' => $item['url'] ?? ''
                ];
            }
        }

        return $input;
    }
}

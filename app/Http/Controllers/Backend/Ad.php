<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Ad\PostInput;
use App\Models\Backend\Ad as AdModel;

class Ad extends Base
{
    public function __construct(
        AdModel $model
    ) {
        $this->model = $model;
    }

    public function getIndex()
    {
        $data = $this->model->paginate(20);

        $form = $this->form();
        return $this->render('ad.index', compact('data', 'form'));
    }

    public function getEdit($id)
    {
        $target = $this->model->getWithRelation($id, false);
        $form = $this->form();

        $ad_media = '';
        if ($target->media) {
            $ad_media = [$target->media->toArray()];
        }

        $target = $target->toArray();
        $target['ad_media'] = $ad_media;
        return $this->render('ad.input', compact('target', 'form'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $this->format($request->all());
        $this->model->edit($id, $input);

        return redirect()
                  ->route('backend.ad.index')
                  ->with('input.success', 'input.success');
    }

    public function getCreate()
    {
        $form = $this->form();
        $target = [
            'mode' => MODE_ENABLE
        ];
        return $this->render('ad.input', compact('form', 'target'));
    }

    public function postCreate(PostInput $request)
    {
        $input = $this->format($request->all());
        $target = $this->model->create($input);
        return redirect()
                  ->route('backend.ad.index')
                  ->with('input.success', 'input.success');
    }

    public function getDelete($id)
    {
        $this->model->destroy($id);
        return redirect()
                  ->route('backend.ad.index')
                  ->with('delete.success', 'delete.success');
    }

    protected function form()
    {
        return [
            'mode' => config('master.common.mode'),
            'type' => config('master.ad.type'),
        ];
    }

    protected function format(array $input)
    {
        if (!empty($input['media_id'])) {
            $input['media_id'] = key($input['media_id']);
        }

        return $input;
    }
}

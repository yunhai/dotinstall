<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Lesson\PostInput;
use App\Http\Service\Common\Upload\BasicUpload;
use App\Models\Backend\Lesson as LessonModel;
use Illuminate\Http\UploadedFile;

class Lesson extends Base
{
    public function __construct(
        LessonModel $lesson_model
    ) {
        $this->model = $lesson_model;
    }

    public function index()
    {
        $lessons = $this->model->paginate(20);
        return $this->render('lesson.index', compact('lessons'));
    }

    public function getEdit($id)
    {
        $target = $this->model->get($id);
        return $this->render('lesson.input', compact('target'));
    }

    public function postEdit(PostInput $request, $id)
    {
        $input = $request->all();
        $this->model->edit($id, $input);

        return redirect()->route('lesson.index');
    }

    public function postDelete($id)
    {
        $this->model->remove($id);
        return redirect()->route('lesson.index');
    }

    public function getCreate()
    {
        return $this->render('lesson.input');
    }

    public function postCreate(PostInput $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $this->upload($request->file('image'));
            $input['image_id'] = $image['id'];
        }

        $this->model->create($input);

        return redirect()->route('lesson.index');
    }

    protected function upload(UploadedFile $file)
    {
        $uploader = new BasicUpload();
        return $uploader->save($file, 'attachment');
    }

    public function getDelete($id)
    {
        $this->model->remove($id);
        return redirect()->route('lesson.index');
    }

    public function getDetail($id)
    {
        $lesson = $this->model->get($id);
        // $lesson_media = LessonModel::find($id)->lesson_media()->paginate(20);
        return $this->render('lesson.detail', compact('id', 'lesson', 'lesson_media'));
    }
}

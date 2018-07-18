<?php

namespace App\Http\Controllers\Backend\Lesson\LessonDetail;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Lesson\LessonDetail\PostInput;
use App\Models\Backend\Lesson\LessonDetail\LessonDetail as LessonDetailModel;
use App\Models\Backend\MsLanguage as MsLanguageModel;
use App\Http\Service\Common\Reader\Office as OfficeReader;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\Storage;

class LessonDetail extends Base
{
    public function __construct(
        LessonDetailModel $model
    ) {
        $this->model = $model;
    }

    public function getCreate(int $lesson_id)
    {
        $form = $this->form();
        return $this->render('lesson.lesson_detail.input', compact('form', 'lesson_id'));
    }

    public function postCreate(PostInput $request, int $lesson_id)
    {
        $input = $request->all();
        $input = $this->format($input, $lesson_id);

        $target = $this->model->create($input);

        $lesson_detail_id = $target->id;
        return redirect()->route('backend.lesson_detail.edit', compact('lesson_id', 'lesson_detail_id'));
    }

    public function getEdit($lesson_id, $lesson_media_id)
    {
        $form = $this->form();
        $target = $this->model->getWithRelation($lesson_media_id, false);
        return $this->render('lesson.lesson_detail.input', compact('target', 'form', 'lesson_id', 'lesson_media_id'));
    }

    public function postEdit(PostInput $request, $lesson_id, $lesson_detail_id)
    {
        $input = $request->all();
        $input = $this->format($input, $lesson_id, $lesson_detail_id, MODE_EDIT);

        $this->model->edit($lesson_detail_id, $input);

        return redirect()->route('backend.lesson_detail.edit', compact('lesson_id', 'lesson_detail_id'));
    }

    public function getIndex($lesson_id)
    {
        $data = $this
                    ->model
                    ->where('lesson_id', $lesson_id)
                    ->orderBy('sort')
                    ->paginate(20);

        $form = $this->form();
        return $this->render('lesson.lesson_detail.index', compact('data', 'lesson_id', 'form'));
    }

    public function getDelete($lesson_id, $lesson_detail_id)
    {
        $this->model->remove($lesson_detail_id);
        return redirect()->route('backend.lesson_detail.index', compact('lesson_id'));
    }

    private function form()
    {
        $mode = config('master.common.mode');
        $free_mode = config('master.lesson.lesson_detail.free_mode');

        $language = $this->getLanguage(true);
        return compact('mode', 'free_mode', 'language');
    }

    private function getLanguage($available_category = true)
    {
        $func = $available_category ? 'availableList' : 'allList';
        $model = new MsLanguageModel();
        return $model->$func();
    }

    private function format(array $input, int $lesson_id, int $lesson_detail_id = 0, bool $mode = MODE_CREATE)
    {
        $input['lesson_id'] = $lesson_id;

        $input['poster'] = empty($input['poster']) ? 0 : key($input['poster']);
        $input['video'] = empty($input['video']) ? 0 : key($input['video']);

        $map = [
            'source_code' => LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE,
            'resource' => LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE,
        ];
        $attachments = [];
        $ref = [];
        foreach ($map as $key => $value) {
            if (!empty($input[$key])) {
                foreach ($input[$key] as $item) {
                    $tmp = [
                        'id' => $item['lesson_detail_attachment__id'] ?? 0,
                        'media_id' => $item['id'],
                        'type' => $value,
                        'language' => $item['language'] ?? '',
                    ];
                    array_push($attachments, $tmp);

                    if ($value === LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE) {
                        $ref[$item['id']] = $item;
                    }
                }
                unset($input[$key]);
            }
        }

        $attachments = array_merge($attachments, $this->makeSourceCodeConent($ref));
        $input['lesson_detail_attachments'] = $attachments;

        return $input;
    }

    private function makeSourceCodeConent(array $ref)
    {
        $lesson_detail_attactment = [];
        $reader = new OfficeReader();

        foreach ($ref as $media_id => $item) {
            $media_path = storage_path('app/media') . '/' . $item['path'];
            $content = $reader->read($media_path);
            array_push($lesson_detail_attactment, $this->storeContent($content, $media_id, $item)) ;
        }

        return $lesson_detail_attactment;
    }

    private function storeContent($content, $media_id, $item)
    {
        $extension = 'txt';
        $hash_name = str_random(40) . '.' . $extension;
        $original_name = $item['original_name'];
        $location = date('y/m/W');
        $path = $location . '/' . $hash_name;

        $disk = Storage::disk('media');
        $disk->put($path, $content);
        $size = $disk->size($path);
        $mime = $disk->mimeType($path);

        $info = compact('location', 'path', 'mime', 'original_name', 'hash_name', 'extension', 'size');

        $target = (new Media())->create($info);
        $target = $target->toArray();

        return [
            'media_id' => $target['id'],
            'type' => LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT,
            'language' => $item['language'],
            'ref_media_id' => $media_id
        ];
    }
}

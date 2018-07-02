<!-- <?php -->

namespace App\Http\Controllers\Backend\Lesson\Detail;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Lesson\Detail\PostInput;
use App\Models\Backend\Lesson\Detail\LessonDetail as LessonDetailModel;
use Illuminate\Support\Facades\Storage;

class LessonDetail extends Base
{
    public function __construct(
        LessonDetailModel $model
    ) {
        $this->model = $model;
    }
    
    public function getCreate()
    {
        print_r('<pre>');
        print_r(Storage::disk('video')->url('file.jpg'));
        print_r('</pre>');
        exit;
        return $this->render('lesson.detail.input');
    }
    
    // public function getEdit($lesson_id, $lesson_media_id)
    // {
    //     $target = $this->model->get($lesson_media_id);
    //     return $this->render('lesson_media.input', compact('target'));
    // }
    //
    // public function postEdit(PostInput $request, $lesson_id, $lesson_media_id)
    // {
    //     $input = $request->all();
    //     $this->model->edit($lesson_media_id, $input);
    //
    //     return redirect()->route('lesson.detail', $lesson_id);
    // }
    //
    //
    //
    // public function postCreate(PostInput $request, $lesson_id)
    // {
    //     $input = $request->all();
    //     $input['lesson_id'] = $lesson_id;
    //     $this->model->create($input);
    //
    //     return redirect()->route('lesson.detail', $lesson_id);
    // }
    //
    // public function getDelete($lesson_id, $lesson_media_id)
    // {
    //     $this->model->destroy($lesson_media_id);
    //     return redirect()->route('lesson.detail', $lesson_id);
    // }
}

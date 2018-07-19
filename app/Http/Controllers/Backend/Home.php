<?php

namespace App\Http\Controllers\Backend;

class Home extends Base
{
    public function dashboard()
    {
        return redirect()->route('backend.lesson.index');
    }
}

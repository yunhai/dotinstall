<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class MsCategory extends Controller
{
    public function index()
    {
        $ms_categories = DB::table('ms_categories')->orderBy('sort', 'asc')->paginate(20);
        return view('backend.MsCategory.index', ['ms_categories' => $ms_categories]);
    }
    
    public function create()
    {
        return view('backend.MsCategory.create');
    }
}

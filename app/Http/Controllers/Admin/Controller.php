<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //addアクションを追加
    public function add()
    {
        return view('admin.news.create');
    }
}

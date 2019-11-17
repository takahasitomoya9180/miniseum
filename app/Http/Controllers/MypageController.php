<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    
    public function index(Request $request)
    {
        return view('mypage/index');
    }
    
    public function items(Request $request)
    {
        return view('mypage/items/index');
    }
    
    public function edit(Request $request)
    {
        return view('mypage/items/edit');
    }
    
    
}

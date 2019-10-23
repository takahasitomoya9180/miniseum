<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{  
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Item::where('title', $cond_title)->get();
        } else {
            $posts = Item::all();
        }
        return view('home',['posts' => $posts,'cond_title =>$cond_title']);
    }
    
    public function detail(Request $request)
    {
            
            $Item = item::find($request->id);
            if (empty($Item)) {
                abort(404);
        }
            return view('item_detail', ['news_form' => $news]);
    }
   
}

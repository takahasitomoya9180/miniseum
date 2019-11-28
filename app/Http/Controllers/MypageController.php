<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Item;

class MypageController extends Controller
{
    
    public function index(Request $request)
    {
        return view('mypage/index');
    }
    
    public function items(Request $request)
    {
        $own_user_id = Auth::user()->id;
        $items = Item::where('user_id', $own_user_id)->get();
        
        return view('mypage/items/index',['items' => $items]);
        
        
    }
    
    public function edit(Request $request)
    {
        $own_user_id = Auth::user()->id;
        $items = Item::where('user_id',$own_user_id)->get();
        if (empty($items)){
            abort(404);
        }
        
        return view('mypage/items/edit',['items'=> $items]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Item::$rules);
        $item = Item::find($request->id);
        
        $item_form = $request->all();
        unset($item_form['_token']);
        
        $item->fill($item_form)->save();

        
        
        
    }
    
}

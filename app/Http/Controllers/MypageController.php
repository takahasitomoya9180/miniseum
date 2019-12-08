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
        $items = Item::find(1);
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
        
        if($request->remove =='true'){
            $item_form['image_path'] = null;
        }elseif($request->file('image')){
            $path =$request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        }
        unset($item_form['_token']);
        $item->fill($item_form)->save();
        return redirect('mypage/items/index');
    }
    
    public function delete(Request $request)
    {
        $item = Item::where($request->id)->first();
        $item->delete();
      return redirect('mypage/items/index');
    }  
    
    
    
}

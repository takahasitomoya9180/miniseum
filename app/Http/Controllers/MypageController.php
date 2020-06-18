<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Item;
use App\Bookmark;

class MypageController extends Controller
{
    
    public function index(Request $request)
    {
        return view('mypage/index');
    }
    
    public function items(Request $request)
    {
        //ログインしたユーザIDを取得する
        $own_user_id = Auth::user()->id;
        //自身のIDと紐づくすべてのアイテムを取得する
        $items = Item::where('user_id', $own_user_id)->get();
         
         //ここからの表示で絞り込めていない
        $items =  Item::orderBy('id','desc')->paginate(5);
        return view('mypage/items/index',['items' => $items]);
    }
    
    public function edit(Request $request)
    {
        $items = Item::find($request->id);
        if (empty($items)){
            abort(404);
        }
         // 登録した人のユーザーID
        $user_id = $items->user_id;
        // 今ログインしているユーザーID
        $own_user_id = Auth::user()->id;
        // 登録した本人じゃないユーザーがアクセスした場合
        if ($user_id !== $own_user_id) {
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
            $item_form['image_path'] = basename($path);
        }
        unset($item_form['_token']);
        $item->fill($item_form)->save();
        return redirect('mypage/items/index');
    }
    
    public function delete(Request $request)
    {
        $item = Item::find($request->id);
        if (empty($item)){
            abort(404);
        }
        // 登録した人のユーザーID
        $user_id = $item->user_id;
        // 今ログインしているユーザーID
        $own_user_id = Auth::user()->id;
        // 登録した本人じゃないユーザーがアクセスした場合
        if ($user_id !== $own_user_id) {
            abort(404);
        }
        $item->delete();
        return redirect('mypage/items/index');
    }
    
    public function bookmarks(Request $request)
    {
        $user_id = Auth::user()->id;
        
        Bookmark::where('user_id',$user_id)->first();
        $bookmarks=  Bookmark::orderBy('id','desc')->paginate(5);
        return view('mypage/bookmarks',compact('bookmarks'));  
      
    }
    
    
}

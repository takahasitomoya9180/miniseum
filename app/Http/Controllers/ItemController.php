<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use Auth;
use App\Bookmark;


class ItemController extends Controller
{  
    
      public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Item::where('title','like', "%$cond_title%")->orderBy('id', 'desc')->paginate(5);
        } else {
           $posts = Item::orderBy('id', 'desc')->paginate(5);
        } 
        
        
        //ブックマークされているか判定する変数を書く
        //ログインしてるユーザーのidを取得
        $user_id = Auth::user()->id;
        // $is_bookmarks配列のindexは、item_idとする
        // 対象のitemがブックマーク登録済みの場合はtrue、未登録の場合はfalseが入る
        // 例えばログインユーザーがid:1のitemをBookmark登録していた場合
        // $is_bookmarks[1] = true
        // 例えばログインユーザーがid:3のitemをBookmark登録していた場合
        // $is_bookmarks[3] = true;
        // 逆に、id:2のitemをBookmark登録していない場合
        // $is_bookmarks[2] = false;
        
        $is_bookmarks = [];
        foreach($posts as $item) {
            $item_id = $item->id;
            $is_bookmarks[$item_id] = null;
            //bookmarkテーブルからuser=idとitem_idで検索する
            //データがあればtrue,無ければfalse
        $bookmark = Bookmark::where('user_id',$user_id)->where('item_id',$item_id)->first();
        if(empty($bookmark)){
            $is_bookmarks[$item_id] = false; 
        } else{
            $is_bookmarks[$item_id] =true;
        }
        }
        return view('items/index',compact('posts','cond_title','is_bookmarks'));
    }
    
   public function create(Request $request)
  {
     
      $this->validate($request, Item::$rules);
      
      
      $Item = new Item;
      $form = $request->all();
      unset($form['_token']);
      $form['user_id'] = Auth::user()->id;
      if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
          $form['image_path'] = basename($path);
      } else {
          $form['image_path'] = null;
      }
      $Item->fill($form);
      $Item->save();
      return redirect('/mypage/items/index');
  }
  
 
  public function add(Request $request)
  {
     
      return view('items/create');
  } 
  
  public function detail(Request $request)
    {
        $return_bookmark = $request->bookmark;
        $user_id = Auth::user()->id;
        $item_id =$request->id;
        $item = Item::find($item_id);
        $bookmark = Bookmark::where('user_id',$user_id)->where('item_id',$item_id)->first();
        if(empty($bookmark)){
            $is_bookmark = false; 
        } else{
            $is_bookmark =true;
        }
       
        return view('items/detail', compact('item','is_bookmark','return_bookmark'));
    }
}
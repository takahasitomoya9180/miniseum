<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;


class ItemController extends Controller
{  
   
    
    public function detail(Request $request)
    {
            
            $item = Item::find($request->id);
            if (empty($Item)) {
                abort(404);
        }
            return view('item_detail', ['news_form' => $news]);
    }
   
   
    
      public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Item::where('title', $cond_title)->get();
        } else {
            $posts = Item::all();
        }
        return view('items/index',['posts' => $posts,'cond_title' =>$cond_title]);
    }
    
   public function create(Request $request)
  {
     
      $this->validate($request, Item::$rules);
      $item = new Item;
      $form = $request->all();
      unset($form['_token']);
      $item->fill($form);
     
    
      $item->save();
      
      return redirect('items/create');
  }
  
  public function edit(Request $request)
    {
            
            $item = Item::find($request->id);
            if (empty($item)) {
                abort(404);
        }
            return view('items/edit', ['item_form' => $news]);
    }
  
  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Item::$rules);
      // Item Modelからデータを取得する
      $item = Item::find($request->id);
      // 送信されてきたフォームデータを格納する
      $item_form = $request->all();
      if (isset($item_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $item->image_path = basename($path);
        unset($item_form['image']);
      } elseif (isset($request->remove)) {
        $item->image_path = null;
        unset($item_form['remove']);
      }
      unset($item_form['_token']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('/items');
  }
  
  
  
  public function add(Request $request)
  {
     
      return view('items/create');
  }  




   
}

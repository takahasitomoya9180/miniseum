<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use Auth;


class ItemController extends Controller
{  
    
      public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Item::where('title','like', $cond_title)->get();
        } else {
           $posts = Item::orderBy('id', 'desc')->paginate(5);
        } 
        
        return view('items/index',['posts' => $posts,'cond_title' =>$cond_title]);
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
        $item_id =$request->id;
        $item = Item::find($item_id);
       
        return view('items/detail', ['item' => $item]);
    }
}
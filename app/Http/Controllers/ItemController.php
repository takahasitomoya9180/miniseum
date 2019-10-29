<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;


class ItemController extends Controller
{  
   
    
    public function detail(Request $request)
    {
            
            $Item = item::find($request->id);
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
        return view('home',['posts' => $posts,'cond_title =>$cond_title']);
    }
    
   public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, Item::$rules);
      
      $Item = new Item;
      $form = $request->all();
      unset($form['_token']);
      $Item->fill($form);
     
    
      $Item->save();
      
      return redirect('items/create');
  }
  
  public function add(Request $request)
  {
     
      return view('items/create');
  }  




   
}

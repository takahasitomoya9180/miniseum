<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function create(Request $request)
    {
        
        $Item = new Item;
        $form = $request->all();
        unset($form['_token']);
        $form['user_id'] = Auth::user()->id;
        
        $Item->fill($form);
        
        $Item->save();
        return redirect('/mypage/items/index');
    }
    
    
    public function delete(Request $request)
    {
        
        $items=Item::find($request->id);
        if (empty($item)){
            abort(404);
        }
        
        $items->delete();
        return redirect('/mypage/items/index');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

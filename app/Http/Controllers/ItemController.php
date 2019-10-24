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
   
}

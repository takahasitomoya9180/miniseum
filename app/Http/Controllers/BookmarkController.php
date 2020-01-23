<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
class BookmarkController extends Controller
{
    public function create(Request $request)
    {
        $bookmarks = new Bookmark;
        $form = $request->all();
        $items = Bookmark::where('user_id',Auth::user()->id)
                         ->where('item_id',$item_id)->first;
        $items->fill($form);
        $items->save();
                        
        
        return redirect('/mypage/items/index',compact('items'));
    }
    
    
    public function delete(Request $request)
    {
        $item=Bookmark::find($request->id);
        if (empty($item)){
            abort(404);
        }
        
        //ログイン中のユーザーIDと削除するアイテムIDを検索
        $items=where('user_id',Auth::user()->id)
            ->where('item_id',$item_id)->first;
        
        $items->delete();
        return redirect('/mypage/items/index',compact('items'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

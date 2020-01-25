<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
class BookmarkController extends Controller
{
    public function create(Request $request)
    {
        //newしてインスタンスを作成した
        $bookmarks = new Bookmark;
        //入力された全てのデータを取得
        $form = $request->all();
        //インスタンスに
        $bookmarks->fill($form);
        //データを保存する
        $bookmarks->save();
        
        return redirect('items/index');
    }
    
    
    public function delete(Request $request)
    {
        //削除対象のブックマークを取得する(登録したユーザーのuser_idと登録したアイテムのitem_idを検索して１件だけ取得する)
        $bookmarks=Bookmark::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->first();
        if (empty($bookmarks)){
            abort(404);
        }
        $bookmarks->delete();
        return redirect('items/index');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

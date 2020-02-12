<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use Auth;
use Illuminate\Support\Facades\Response;
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
        $bookmarks->user_id = Auth::user()->id;
        //データを保存する
        $bookmarks->save();
        
        $response = array();
        $response["status"] ="OK";
        $response["message"] = "お気に入り登録されました";
        
        
        return Response::json($response);
    }
    
    
    public function delete(Request $request)
    {
        
         
       
        //削除対象のブックマークを取得する(登録したユーザーのuser_idと登録したアイテムのitem_idを検索して１件だけ取得する)
        $bookmarks=Bookmark::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->first();
        if (empty($bookmarks)){
            abort(404);
        }
        $bookmarks->delete();
        $response = array();
        $response["status"] ="OK";
        $response["message"] = "お気に入りを解除しました";
        
       
        return Response::json($response);
    }
    
    
    public function ajaxsample(Request $request)
    {
        $response = array();
        $response["status"] ="OK";
        $response["message"] = "ajax 通信　成功";
        $name =$request->name;
        
        $response["result"] = $name;
        
        return Response::json($response);
    }
}

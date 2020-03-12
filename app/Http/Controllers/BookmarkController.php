<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use Auth;
use App\Item;
use Illuminate\Support\Facades\Response;
class BookmarkController extends Controller
{
     public function create(Request $request)
      {
          // レスポンス用の配列を初期化
          $response = array();
      
          $item_id = $request->item_id;
          // もし、対象のitemが存在しなければ
          if (Item::where('id', $item_id)->doesntExist()) {
              $response["status"] ="NG";
              $response["message"] = "対象のitemが存在しません。";
          // もし、対象のitemが存在すれば
          } else {
              //newしてインスタンスを作成した
              $bookmarks = new Bookmark;
              //入力された全てのデータを取得
              $form = $request->all();
              //インスタンスに
              $bookmarks->fill($form);
              $bookmarks->user_id = Auth::user()->id;
              //データを保存する
              $bookmarks->save();
              $response["status"] ="OK";
              $response["message"] = "お気に入り登録しました。";
          }
      
          return Response::json($response);
      }
    
    public function delete(Request $request)
    {
        $response = array();
        
        //削除対象のブックマークを取得する(登録したユーザーのuser_idと登録したアイテムのitem_idを検索して１件だけ取得する)
        $bookmarks=Bookmark::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->first();
        if (empty($bookmarks)){
            abort(404);
            $response["status"]="NG";
            $response["message"] ="対象のidが存在しません";
        }else {
            $bookmarks->delete();
            $response["status"] ="OK";
            $response["message"] = "お気に入りを解除しました";
        }
        return Response::json($response);
    }
    
    public function destroy(Request $request)
    {
        $bookmarks=Bookmark::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->first();
        if (empty($item)){
            abort(404);
          }
          $bookmarks->delete();
      
          return redirect('mypage/bookmark');
      }
}

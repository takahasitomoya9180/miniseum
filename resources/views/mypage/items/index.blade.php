@extends('layouts.app')

@section('content')
     <nav>
        <ul class="mypage-items-index-nav">
            <ul><a href="/items" role="button" class="btn btn-primary">TOP</a></ul>
            <ul><a href="/mypage" role="button" class="btn btn-primary">マイページ</a></ul>
            <ul><a href="{{ action('ItemController@add') }}" role="button" class="btn btn-primary">新規作成</a></ul>
            <ul><a onclick="document.logoutForm.submit()" role="button" class="btn btn-primary">ログアウト</a></ul>
        </ul>
    </nav>
@foreach ($items as $item)
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                   <th width="10%">id</th>
                   <th width="10%">画像</th>
                   <th width="20%">タイトル</th>
                   <th width="40%">本文</th>
                   <th width="10%">
                   <th　width="20%"> 
                   <a href="{{ action('MypageController@edit', ['id' => $item->id]) }}">編集</a>
                   <a href="#" onclick="confirm_delete({{ $item->id }})">削除</a>
                   </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>
                         @if($item->image_path !==null)
                         <img src="{{ "/storage/image/$item->image_path" }}" alt="画像" width="100">
                         @endif
                    </td>
                    <td>{{ str_limit($item->title, 100) }}</td>
                    <td>{{ str_limit($item->body) }}</td>
                    <td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  @endforeach
   {{ $items->Links() }}
  
   <script>
  function confirm_delete(item_id) {
      if (window.confirm('本当に削除してもよろしいですか。')) {
          window.location.href ="{{ action('MypageController@delete') }}?id=" + item_id;
          window.open('#', '_blank');
                }
            }
    </script>
  
 
@endsection

@section('style')
<style>
    body{
        background-image: url("/images/items.index.jpg");
        background-position: center center;
        background-size:cover; 
        background-repeat: no-repeat;
        background-attachment: fixed;
        width:100%; 
        height:200px;       
        margin-top: 100px;
        color: white;
        }
</style>
@endsection
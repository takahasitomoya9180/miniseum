@extends('layouts.app')


@section('content')
<div class="items-index">
         <nav>
             <ul class="main-nav">
                 <li>
                 <a href="/mypage">マイページへ</a>
                 <form action="{{ url('/logout') }}" method="post" name="logoutForm">
                       {{ csrf_field() }}
                       <a onclick="document.logoutForm.submit()">ログアウト</a>
                 </form>
             </ul>
             　　</li>
         </nav>
<div class="container">
    <div class="col-md-8">
        <form action="{{ url('/items') }}" method="get">
            <buttun class="btn btn-warning" id="ajax-sample"> Ajaxサンプル</buttun>
            <div class="form-group row">
                <label class="col-md-2">タイトル</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" size="30" name="cond_title" value="{{ $cond_title }}">
                </div>
                 <div class="col-md-2">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="検索">
            </div>
            </div>
           
        </form>
    </div>
</div>  
<div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">id</th>
                                <th width="10%">画像</th>
                                <th width="20%">タイトル</th>
                                <th width="40%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $items)
                                <tr>
                                    <td>{{ $items->id }}</td>
                                    <td>
                                        @if($items->image_path !==null)
                                        <img src="{{ "/storage/image/$items->image_path" }}" alt="画像" width="100">
                                        @endif
                                    </td>
                                    <td>{{ \Str::limit($items->title, 100) }}</td>
                                    <td>{{ \Str::limit($items->body, 250) }}</td>
                                    <td><a href="{{ action('ItemController@detail') }}?id={{ $items->id }}">詳細</a></td>
                                    @if($is_bookmarks[$items->id])
        <!-- 塗りつぶされている方：ブックマーク登録済み -->
        <td>
            <a href="{{ action('BookmarkController@delete') }}?item_id={{ $items->id }}">
                <i class="fas fa-bookmark"></i>
            </a>
        </td>
    @else
        <!-- 塗りつぶされていない方：ブックマーク未登録 -->
        <td>
            <a href="{{ action('BookmarkController@create') }}?item_id={{ $items->id }}">
                <i class="far fa-bookmark"></i>
            </a>
        </td>
    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->Links() }}
                </div>
            </div>
        </div>
</div>
<script>
          $(function() {
              $('#ajax-sample').on('click', function() {
                  // ajaxを書いてみる
                  $.ajax({
                      url: '/ajax/sample', // 通信したいコントローラーのアクションへのURL
                      type: 'POST', // リクエストのタイプ
                      data:  // コントローラーに渡したいアクション
                          {'number1': 10, 'number2': 2},
                      headers: {
                          // CSRF対策
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                  })
                      .done(function(response) {
                          console.log(response);
                          // 通信が成功した場合
                          alert(response.result);
                      })
                      .fail(function() {
                          // 通信が失敗した場合
                          alert('エラー');
                      });
              });
          });
      </script>

@endsection

@section('style')
 <style>
     body{
       background-image: url("/images/home.jpg");
       margin-top: 200px;
       background-position: center center;
       background-size:cover; 
       background-repeat: no-repeat;
       background-attachment: fixed;
       width:100%; 
       height:400px; 
      
     }
     
 </style>
@endsection
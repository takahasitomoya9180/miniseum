@extends('layouts.app')

@section('content')
    <nav>
        <ul class="main-nav">
            <li>
                 <a href="/mypage">マイページへ</a>
                 <form action="{{ url('/logout') }}" method="post" name="logoutForm">
                       {{ csrf_field() }}
                       <a onclick="document.logoutForm.submit()">ログアウト</a>
                 </form>
                  @if($is_bookmarks)
 <!-- 塗りつぶされている方：ブックマーク登録済み -->
    <a class ="bookmark-delete" data-id="{{ $item->id }}">
        <i class="fas fa-bookmark"></i>
    </a>
    @else
    <!-- 塗りつぶされていない方：ブックマーク未登録 -->
        <a class="bookmark-create" data-id="{{ $item->id }}">
            <i class="far fa-bookmark"></i>
        </a>
    @endif
            </ul>
             </li>
     </nav>
    <div class="detail-title">
        <h1>{{ $item->title}}</h1>
    </div>
    <div class="detail-body">
         <p>{{ $item->body }}</p>
    </div>
    <div class="detail-image">
        @if($item->image_path !=null)
        <p><img src="{{ "/storage/image/$item->image_path" }}" alt="画像" width="400" ></p>
    </div>
    @endif
    <center><a href="/items" class="btn btn-primary">戻る</a></center>


    
    <script>
    $(function() {
        $(document).on("click", ".bookmark-create", function () {
            if(!$(this).hasClass("wait")) {
            $(this).addClass("wait")
            $.ajax({
                url: '/bookmark/create', // 通信したいコントローラーのアクションへのURL
                type: 'post', // リクエストのタイプ
                data:  // コントローラーに渡したいアクション
                    {'item_id':$(this).data('id')},
                headers: {
                    // CSRF対策
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                context: $(this) 
                 // ここでdone()のなかで使用したい値を渡す (=doneのなかで'this'で使用できる）
            })
                .done(function(response) {
                    console.log(response);
                     // 通信が成功した場合
                     alert(response.message);
                     this.find('i').removeClass('far');
                     this.find('i').addClass('fas');
                     this.removeClass('bookmark-create');
                     this.addClass('bookmark-delete');
                     this.removeClass('wait');
                })
                .fail(function() {
                    // 通信が失敗した場合
                    alert('エラー');
                      });
            }
                    });
              });
     $(function() {
         $(document).on("click", ".bookmark-delete", function () {
             if(!$(this).hasClass("wait")) {
             $(this).addClass("wait")
             $.ajax({
                 url: '/bookmark/delete', // 通信したいコントローラーのアクションへのURL
                 type: 'post', // リクエストのタイプ
                 data:  // コントローラーに渡したいアクション
                     {'item_id':$(this).data('id')},
                 headers: {
                     // CSRF対策
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 context: $(this)
                 
             })
                .done(function(response) {
                    console.log(response);
                    // 通信が成功した場合
                    alert(response.message);
                    this.find('i').removeClass('fas');
                    this.find('i').addClass('far');
                    this.removeClass('bookmark-delete');
                    this.addClass('bookmark-create');
                    this.removeClass('wait');
                    
                })
                .fail(function() {
                    // 通信が失敗した場合
                    alert('エラー');
                      });
             }
              });
          });
</script>

@endsection

@section('style')
    <style>
    body{
        
        background-position: center center;
        background-size:cover; 
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color:black;
        width:100%; 
        height:400px; 
        color:white;
        }
        
        
    </style>
@endsection    
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
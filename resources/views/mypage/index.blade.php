@extends('layouts.app')


@section('content')
   <div class="mypage-index-container">
       <h1 class="mypage">マイページ</h1>
       <p class="mypage" ><a href="/mypage/items/index" >投稿一覧</a></p>
       <p class="mypage"><a href="/mypage">ブックマーク一覧</a></p>
   </div>


   
@endsection

@section('style')
    <style>
        body{
            background-image: url("/images/mypage.top.jpg");
            background-position: center center;
            background-size:cover; 
            background-repeat: no-repeat;
            background-attachment: fixed;
            width:100%; 
            height:200px;       
            margin-top: 100px;
        }
    </style>
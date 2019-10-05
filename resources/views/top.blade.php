@extends('layouts.app')

@section('content')
    <div class="container">    
       <h1>miniseum</h1><br><br><br><br><br>
       <h2>-最小限の博物館-</h2>
       <p>ミニマリスト・シンプリストの残したアイテム達</p>
       <center>
       <a href="#" class="cp_btn" >新規作成</a>
       <a href="#" class="cp_btn1">ログイン</a>
       </center>
    </div>
@endsection

@section('style')
 <style>
     body{
       background-image: url("/images/top.jpg");
       margin-top: 200px;
     }
     
 </style>
@endsection
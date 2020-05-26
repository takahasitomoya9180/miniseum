@extends('layouts.app')

@section('content')
    <div class="container">    
       <h1 class="top">miniseum</h1><br><br><br><br><br>
       <h2>-最小限の博物館-</h2>
       <center>
       <a href="/register" class="cp_btn" >新規作成</a>
       <a href="/login" class="cp_btn">ログイン</a>
       
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
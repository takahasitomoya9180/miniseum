@extends('layouts.app')


@section('content')
<div class="home">
     <center>
   ログインに成功しました<br>
   <a href="/" class="cp_btn">マイページへ</a>
   <a href="/" class="cp_btn">ログアウト</a>
   
     </center>
</div>
@endsection

@section('style')
 <style>
     body{
       background-image: url("/images/freely.jpg");
       margin-top: 200px;
       background-position:center bottom; 
       background-size:cover; 
       width:100%; 
       height:400px; 
      
     }
     
 </style>
@endsection
@extends('layouts.app')


@section('content')
<div class="home">
         <nav>
             
             <ul class="main-nav">
                 <li>
                 <a href="/" >マイページへ</a>
                 <form action="{{ url('/logout') }}" method="post" name="logoutForm">
                      {{ csrf_field() }}
                      <a onclick="document.logoutForm.submit()">ログアウト</a>
                 </form>
             </ul>
             　　</li>
         </nav>
     
     
</div>
@endsection

@section('style')
 <style>
     body{
       background-image: url("/images/home.jpg");
       margin-top: 200px;
       background-position:center bottom; 
       background-size:cover; 
       width:100%; 
       height:400px; 
      
     }
     
 </style>
@endsection
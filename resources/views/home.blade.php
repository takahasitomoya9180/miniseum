@extends('layouts.app')


@section('content')
<div class="home">
         <nav>
             
             <ul class="main-nav">
                 <li><a href="/" >マイページへ</a></li>
                 <li><a href="{{ Auth::logout() }}">ログアウト</a></li>
             </ul>
         </nav>
     
     
</div>
@endsection

@section('style')
 <style>
     body{
       background-image: url("/images/an.jpg");
       margin-top: 200px;
       background-position:center bottom; 
       background-size:cover; 
       width:100%; 
       height:400px; 
      
     }
     
 </style>
@endsection
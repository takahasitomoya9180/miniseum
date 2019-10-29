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
<div class="container">
    <div class="row">
        <a href="{{ action('ItemController@add') }}" role="button" class="btn btn-primary">新規作成</a>
    </div>
    <div class="col-md-8">
        <form action="{{ url('/home') }}" method="get">
            <div class="form-group row">
                <label class="col-md-2">タイトル</label>
            </div>
        </form>
    </div>
    
</div>  
         
         
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
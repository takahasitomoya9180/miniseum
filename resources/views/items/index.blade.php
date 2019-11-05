@extends('layouts.app')


@section('content')
<div class="index">
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
        <form action="{{ url('/items') }}" method="get">
            <div class="form-group row">
                <label class="col-md-2">タイトル</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" size="30" name="cond_title" value="{{ $cond_title }}">
                </div>
            </div>
            <div class="col-md-2">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="検索">
            </div>
        </form>
    </div>
</div>  
<div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="40%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $items)
                                <tr>
                                    <th>{{ $items->id }}</th>
                                    <td>{{ \Str::limit($items->title, 100) }}</td>
                                    <td>{{ \Str::limit($items->body, 250) }}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
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
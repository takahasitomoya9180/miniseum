@extends('layouts.app')

@section('content')
    <div class="detail-title">
        <h1>{{ $item->title}}</h1>
    </div>
    
    <div class="detail-body">
         <p>{{ $item->body }}</p>
    </div>
    
    <div class="detail-image">
        <img src="{{ "/storage/image/$item->image_path" }}" alt="画像" width="200" >
    </div>
<input type="submit", class="btn btn-primry" value="検索">

@endsection


@section('style')
    <style>
    body{
        
        background-position: center center;
        background-size:cover; 
        background-repeat: no-repeat;
        background-attachment: fixed;
        width:100%; 
        height:400px; 
    }
        
        
    </style>
@endsection    
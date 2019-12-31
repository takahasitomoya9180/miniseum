@extends('layouts.app')

@section('content')
    <div class="detail-title">
        <h1>{{ $item->title}}</h1>
    </div>
    
    <div class="detail-body">
         <p>{{ $item->body }}</p>
    </div>
    
    <div class="detail-image">
        <p><img src="{{ "/storage/image/$item->image_path" }}" alt="画像" width="200" ></p>
    </div>
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
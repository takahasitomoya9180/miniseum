@extends('layouts.app')

@section('content')



 @foreach ($item as $item)
    <div>
        <center>
        <ul>
        <h1><li>{{ $item->title }}</li></h1>
        <left><li>
            @if($item->image_path !==null)
            <img src="{{ "/storage/image/$item->image_path" }}" alt="画像" width="200">
            
            @endif
        </li></left>
        <li>{{ $item->body }}</li>
        </center>
        </ul>
    </div>
  @endforeach


@endsection


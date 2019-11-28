@extends('layouts.app')

@section('content')
@foreach ($items as $item)
    <!-- TODO: テーブル形式で表示、編集・削除ボタンをつける -->
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                   <th width="10%">id</th>
                   <th width="10%">画像</th>
                   <th width="20%">タイトル</th>
                   <th width="40%">本文</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{str_limit($item->image_path,50) }}</td>
                    <td>{{ str_limit($item->title, 100) }}</td>
                    <td>{{ str_limit($item->body) }}</td>
                    <td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  @endforeach



@endsection

@section('style')
<style>
    body{
        background-image: url("/images/items.index.jpg");
        background-position:center bottom; 
        background-size:cover; 
        width:100%; 
        height:200px;       
        margin-top: 100px;
        color: white;
        }
</style>



@endsection
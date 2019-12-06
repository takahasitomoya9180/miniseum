@extends('layouts.app')

@section('content')
<div class="container">
        <div class="create-row">
            <div class="col-md-8 mx-auto">
                <h2>商品編集</h2>
                <form action="{{ action('MypageController@update') }}" method="post" enctype="multipart/form-data">
                    

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ ($items->title) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="15">{{ $items->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="cheak box">
                        <lavel class="col-md-2">
                            <input type="checkbox" class="form-check-input"　name="remove" value="true">
                            画像を削除
                        </lavel>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                     <input type="hidden" name="id" value="{{ $items->id }}">
                </form>
            </div>
        </div>
    </div>



@endsection

<style>
    body{
        background-image: url("/images/mypage.items.edit.jpg");
        background-position:center bottom; 
        background-size:cover; 
        width:100%; 
        height:200px;       
        margin-top: 100px;
        color: white;
        }
</style>

@extends('layouts.app')


@section('content')
  <div class="row">
            <div class="list-news col-md-12">
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
                            @foreach($bookmarks as $bookmark)
                            <tr>
                                <td>{{ $bookmark->item->id }}</td>
                                <td>
                                      @if($bookmark->item->image_path !==null)
                                      <img src="{{ "/storage/image/{$bookmark->item->image_path}" }}" alt="画像" width="100">
                                      @endif
                                </td>
                                <td>{{ \Str::limit($bookmark->item->title, 100) }}</td>
                                <td>{{ \Str::limit($bookmark->item->body, 250) }}</td>
                                <td><a href="{{ action('ItemController@detail') }}?id={{ $bookmark->item->id }}">詳細</a></td>
                                <td>
                                    <a href="{{ action('BookmarkController@destroy') }}?item_id={{ $item->id }}"
                                    <i class="fas fa-bookmark"></i>
                                    </a> 
                                </td>
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
            background-image: url("/images/mypage.jpg");
            background-position: center center;
            background-size:cover; 
            background-repeat: no-repeat;
            background-attachment: fixed;
            width:100%; 
            height:200px;       
            margin-top: 100px;
        }
        
        .items-index{
            margin-top:100px;
        }
    </style>
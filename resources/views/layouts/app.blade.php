<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--    <script src="{{ secure_asset('js/app.js') }}" defer></script>--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spirax|Tulpen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kosugi|M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    
    
    
    @yield('style')
</head>
<body>
    <div id="app">
        <main class="py-4">
             @if(\Illuminate\Support\Facades\Auth::check())
                <ul class="topnav">
	                <li><a href="/items" >Home</a></li>
	                <li><a href="/mypage">mypage</a></li>
	                <form action="{{ url('/logout') }}" method="post" name="logoutForm">
                        {{ csrf_field() }}
                        <li> <a onclick="document.logoutForm.submit()">logout</a></li>
                    </form>
                </ul>
             @endif
            @yield('content')
        </main>
    </div>
</body>
</html>

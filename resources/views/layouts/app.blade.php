<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/app.js"></script>
</head>
<body>
    @include('inc.header')
    
    @if(Request::is('/'))
    @include('inc.hero')
    @endif
    
    <div class="container mt-5">

        @include('inc.messages')

        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
            <div class="col-4">
                @if(!Request::is('login') and !Request::is('registration'))
                @include('inc.aside')
                @endif
            </div>
        </div>
    </div>

    
    @include('inc.footer')
</body>
</html>
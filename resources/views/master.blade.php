<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Админка: @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/admin.css" rel="stylesheet">
        <link href="/css/starter-template.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{route('cars.index')}}">Вернуться на первую страницу</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
                <div class="starter-template">
                    @if (session()->has('success'))
                        <p class="alert alert-success">{{session()->get('success')}}</p>
                    @endif
                    @if (session()->has('warning'))
                        <p class="alert alert-warning">{{session()->get('warning')}}</p>
                    @endif
                </div>
            </div>
            <div class="py-4">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>

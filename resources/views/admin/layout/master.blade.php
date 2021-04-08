<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&family=Nunito:wght@300&display=swap" rel="stylesheet">

        <title>Maquetacion</title>

        @include("admin.layout.partials.styles")
    </head>    

    <body>

            <div class=web>
                <div class="sidebar">
                    @include("admin.layout.partials.sidebar")
                </div>

                <div class="main">
                    @yield('content')
                </div>      
            </div>

            @include("admin.layout.partials.js")
    </body>

</html>


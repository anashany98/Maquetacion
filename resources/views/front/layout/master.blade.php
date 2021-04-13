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

        @include("front.layout.partials.styles")
    </head>    

    <body>
        @include("front.layout.partials.header")

        <div class="main-content">
            @yield("content")
            @yield("login")

        </div>


        @include("front.layout.partials.js")
    </body>

</html>
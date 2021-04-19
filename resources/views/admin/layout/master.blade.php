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

        @include("front.layout.partials.header")
        
      
        <div class="wrap">

          
            <button class="sidebutton">
                <svg viewBox="0 0 24 24">
                    <path  d="M2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2A10,10 0 0,0 2,12M4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12M10,17L15,12L10,7V17Z" />
                </svg>
            </button>
           
            @include("admin.layout.partials.sidebar")

            <div class="main">
                <div class="search-master">
                     @include('admin.layout.partials.search')
                </div>
    

                @yield('content')
            </div>      
        </div>

        @include("admin.layout.partials.js")

    </body>

</html>


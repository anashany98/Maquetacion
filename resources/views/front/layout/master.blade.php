<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">        
        <link rel="shortcut icon" href="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="">

		<title>@yield('title', trans('front/seo.title'))</title>
		<meta name="description" content="@yield('description', trans('front/seo.description'))">
        <meta name="keywords" 	 content="@yield('keywords', trans('front/seo.keywords'))">
        <link rel=”canonical” href=”https://dev-maquetacion.com”>

		<meta property="fb:app_id"        content="" /> 
		<meta property="og:url"           content="@yield('facebook-url', 'https://dev-maquetacion.com')" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="@yield('facebook-title',  trans('front/seo.title'))"/>
		<meta property="og:description"   content="@yield('facebook-description', trans('front/seo.description'))" />

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
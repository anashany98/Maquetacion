@extends('front.layout.master')

@section('title')@lang('front/seo.web-name') | {{$coin->seo->title}} @stop
@section('description'){{$coin->seo->description != null? $coin->seo->description : $coin->seo->locale_seo->description}} @stop
@section('keywords'){{$coin->seo->keywords != null ? $coin->seo->keywords : $coin->seo->locale_seo->keywords}} @stop
@section('facebook-url'){{URL::asset('/coins/' . $coin->seo->slug)}} @stop
@section('facebook-title'){{$coin->seo->title}} @stop
@section('facebook-description'){{$coin->seo->description != null ? $coin->seo->description : $coin->seo->locale_seo->description}} @stop

@section("content")
    @if($agent->isDesktop())
        <div class="page-section">
            @include("front.pages.coins.desktop.coin")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section">
            @include("front.pages.coins.mobile.coins")
        </div>
    @endif
@endsection
        
        
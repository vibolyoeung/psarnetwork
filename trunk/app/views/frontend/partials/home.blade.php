@extends('frontend.layout')
@section('title')
    Home
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Home</li>
    </ul>
@endsection
@section('content')
    
    {{trans('menu.about')}}
    <a href="{{URL::to('en/')}}">En</a>
    <a href="{{URL::to('zh/')}}">Zh</a>
    <a href="{{URL::to(Request::segment(1).'/')}}">about</a>
@endsection
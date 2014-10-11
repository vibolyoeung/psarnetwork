<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    <div class="header">
          @include('frontend.partials.header')
    </div>
    <div class="breadcrumb">
        @yield('breadcrumb')
    </div>
    <div class="menu">
         @include('frontend.partials.menu')
    </div>
    <div class="left">
         @include('frontend.partials.left')
    </div>
    <div class="right">
         @include('frontend.partials.right')
    </div>
    <div class="slider">
         @include('frontend.partials.slider')
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
         @include('frontend.partials.footer')
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Bootstrap CSS -->
    {{HTML::style('backend/css/bootstrap.css')}}
    <!-- date range -->
    {{HTML::style('backend/css/daterange.css')}}
    <!-- Main CSS -->
    {{HTML::style('backend/css/main.css')}}
    <!-- Font Awesome CSS -->
    {{HTML::style('backend/fonts/font-awesome.css')}}
    {{HTML::style('backend/css/custom.css')}}
    <!--[if IE 7]>
    {{HTML::style('backend/fonts/font-awesome.css')}}
    <![endif]-->

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{HTML::script('backend/js/html5shiv.js')}}
    {{HTML::script('backend/js/respond.min.js')}}
    <![endif]-->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-46527722-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
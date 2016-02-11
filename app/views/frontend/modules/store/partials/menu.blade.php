<!--=============Menu==========-->
<div class="container" style="padding-left: 0;padding-right: 0;">
<nav class='navix' id='nav'>
    <div class="container" style="padding-left: 0;padding-right: 0;">
    <div class='wrap'>      
        <a href='#' id='mobilenav'>Menu</a>
        @if($dataCategory)
            {{$dataCategory}}
        @endif
    </div>
    </div>
    <div class='bgnya'></div>      
</nav>
<div style="clear: both;"></div>

<!-- second menu page -->
@if($dataUserPage)
<ol class="breadcrumb">
  {{$dataUserPage}}
</ol>
@endif
</div>
<script class='jshilang' type='text/javascript'>
//<![CDATA[
    menunav(jQuery);
//]]>
</script>
<!-- end second menu page -->
</header>
<!--==============Closing header=========-->
<!--=============Menu==========-->
<nav class='navix' id='nav'>
    <div class="container" style="padding-left: 0;padding-right: 0;">
    <div class='wrap'>      
        <a href='#' id='mobilenav'>Menu</a>
        @if($dataCategory)
            {{$dataCategory}}
        @endif
        <div id='searchnya'>
            <form action='/search' id='ajax-search-form'>
                <input name='q' onblur='if (this.value == &quot;&quot;) {this.value = &quot;Text to search...&quot;;}' onfocus='if (this.value == &quot;Text to search...&quot;) {this.value = &quot;&quot;;}' type='text' value='Text to search...'/>
                <button title='Search' type='submit'>Search</button>
            </form>
        </div> 
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
<script class='jshilang' type='text/javascript'>
//<![CDATA[
    menunav(jQuery);
//]]>
</script>
<!-- end second menu page -->
</header>
<!--==============Closing header=========-->
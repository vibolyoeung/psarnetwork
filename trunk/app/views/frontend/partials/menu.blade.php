<!--=============Menu==========-->
<div class="header-bottom">
    <div class="container">
        <div class="row visible-lg">
            <div class="col-sm-5">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left menu-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="index.html" class="active">Hot Promotion</a></li>
                        <li><a href="404.html">News  Arrival</a></li>
                        <li><a href="contact-us.html">Secondhand&nbsp;&nbsp;&nbsp;/</a></li>
                        <li><a href="contact-us.html">Buy</a></li>
                        <li><a href="contact-us.html">Sell</a></li>
                        <li><a href="contact-us.html">Monthly Pay</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-7">
                <img class="imgmenu" src="{{Config::get('app.url')}}/frontend/images/home/right-menu.png"/>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span>
                    </button>
                </div>
                <div class="category-tab">
                    <div class="mainmenu">
                        <ul class="nav nav-tabs navbar-nav collapse navbar-collapse">
                        	<li></li>
                            <li><a href="#tshirt" data-toggle="tab">Home</a></li>
                            <li><a href="#blazers" data-toggle="tab">Super Market</a></li>
                            <li><a href="#blazers" data-toggle="tab">Tradictional Market</a></li>
                            <li><a href="#blazers" data-toggle="tab">Private Company</a></li>
                            <li><a href="#blazers" data-toggle="tab">Home Shop</a></li>
                            <li><a href="#blazers" data-toggle="tab">Individual</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row sub-menu">
            <div class="category-tab col-sm-12">
                <div class="mainmenu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <ul class="nav navbar-nav collapse navbar-collapse submenu">
                        <li><a href="#tshirt" data-toggle="tab">Phone</a></li>
                        <li><a href="#blazers" data-toggle="tab">Tablet</a></li>
                        <li><a href="#blazers" data-toggle="tab">Laptop</a></li>
                        <li><a href="#blazers" data-toggle="tab">Moto</a></li>
                        <li><a href="#blazers" data-toggle="tab">Car</a></li>
                        <li><a href="#blazers" data-toggle="tab">House</a></li>
                        <li><a href="#blazers" data-toggle="tab">Land</a></li>
                        <li><a href="#blazers" data-toggle="tab">Instrument</a></li>
                        <li><a href="#blazers" data-toggle="tab">Clothes</a></li>
                        <li><a href="#blazers" data-toggle="tab">Jewellery</a></li>
                        <li><a href="#blazers" data-toggle="tab">Cosmetic Wakeup</a></li>
                        <li><a href="#blazers" data-toggle="tab">Food</a></li>
                        <li><a href="#blazers" data-toggle="tab">Furniture</a></li>
                        <li><a href="#blazers" data-toggle="tab">Entertainment</a></li>
                        <li><a href="#blazers" data-toggle="tab">Fussiness Service</a></li>
                    </ul>
                </div>
            </div><br /><br /><br />
        </div>
        <div class="row">
            <!-- ========Start Breadcrumb here============ -->
            <session id="breadcrumb">
                <!--@yield('breadcrumb')-->
            </session>
            <!-- ========End Breadcrumb here============ -->
        </div>
    </div>
</div>
</header>
<!--==============Closing header=========-->
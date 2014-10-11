     <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">&nbsp;</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

        <ul class="nav navbar-nav">
            <li class="active">
                <a href="./index.html">Dashboard</a>
            </li>
            <li>
                <a href="./graphs.html">Graphs</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">UI elements <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="./buttons.html">Buttons</a></li>
                    <li><a href="./panels.html">Panels &amp; List Groups</a></li>
                    <li><a href="./notifications.html">Notifications</a></li>
                    <li><a href="./typography.html">Typography</a></li>
                    <li class="divider"></li>
                    <li><a href="./grid.html">Grid</a></li>
                    <li class="divider"></li>
                    <li><a href="./ui-elements.html">More UI Elements...</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forms <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="./forms.html">Form Elements</a></li>
                    <li><a href="./wizards.html">Form Wizards</a></li>
                </ul>
            </li>
            <li>
                <a href="./tables.html">Tables</a>
            </li>
            <li>
                <a href="./gallery.html">Gallery</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bonus Pages <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="./invoice.html">Invoice</a></li>
                </ul>
            </li>
        </ul>

        <!-- Mini navigation start -->
        <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> 
                	@if(Session::has('SESSION_LOGIN_NAME'))
                		{{Session::get('SESSION_LOGIN_NAME')}}
                	@endif
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">My Inbox</a></li>
                    <li class="divider"></li>
                    <li><a href="{{URL::to('admin/logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Mini navigation end -->
    </nav>
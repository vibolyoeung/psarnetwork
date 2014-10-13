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
                <a href="{{URL::to('admin/dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="{{URL::to('admin/users')}}">Users</a>
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
                    <li><a href="{{URL::to('admin/profile')}}">My Profile</a></li>
                    <li><a href="{{URL::to('admin/changepassword')}}">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{URL::to('admin/logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Mini navigation end -->
    </nav>
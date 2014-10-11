@include('backend.partials.header')
<div class="container">
    <!-- Top bar start -->
    <div class="top-bar">
        @include('backend.partials.top_menu')
    </div>
    <!-- Top bar end -->

    <!-- Header start -->
    <header class="navbar" role="navigation">
            @include('backend.partials.menu')
    </header>
    <!-- Header end -->

    <!--Breadcrumb Start -->
    <div class="page-title">
        @include('backend.partials.breadcrumb')
    </div>
    <!-- Breadcrumb  end -->
    <!-- Content Start -->
        @yield('content')
    <!-- Content End -->
</div>
@include('backend.partials.footer')


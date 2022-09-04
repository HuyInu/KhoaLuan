<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang chủ | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO</title>

        @include('Admin.head')
        @yield('head')

    </head>
    <body>
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="blue">
                    
                    <a href="index.html" class="logo">
                        <img class="main-logo" src="/image/main-logo.png" alt="navbar brand" class="navbar-brand" style="width: 50px;height: 50px;">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                @include('Admin.navbar')
                <!-- End Navbar -->
            </div>
                <!-- Sidebar -->
                @include('Admin.sidebar')
                <!-- End Sidebar -->

            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="page-header">
                            <ul class="breadcrumbs">
                                <li class="nav-home">
                                    <a href="{{route('home')}}">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                @yield('pageHeader')  
                            </ul>
                        </div>
                        <div class="row">
                            @yield('content')  								
                        </div>
                    </div>
                </div>
            </div>
        </div>
		@include('Admin.foot')
        @yield('footer')
	</body>
</html>

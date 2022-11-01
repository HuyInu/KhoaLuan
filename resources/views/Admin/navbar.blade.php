<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    
    <div class="container-fluid">
        <a href="{{route('home')}}" class="logo" style="margin-right: 33px;">
                        <img class="main-logo" src="/image/main-logo.png" alt="navbar brand" class="navbar-brand" style="width: 50px;height: 50px;">
        </a>
        <h1 class="head1">HỆ THỐNG QUẢN LÝ QUY HOẠCH VÀ HẠ TẦNG KỸ THUẬT THÀNH PHỐ MỸ THO</h1>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
                @php
                $userType = Auth::user()->MaLoaiNguoiDung;
                $avatarSrc = null;
                switch ($userType) {
                    case 1:
                        $avatarSrc = "/image/admin.jpg";
                        break;
                    case 2:
                        $avatarSrc = '/image/user-default.jpg';
                        break;
                    case 3:
                        $avatarSrc = '/image/user-default.jpg';
                        break;
                };
                @endphp
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{$avatarSrc}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="{{$avatarSrc}}" alt="image profile" class="avatar-img rounded">           
                                </div>
                                <div class="u-text">
                                    <h4>
                                        {{Auth()->user()->Ho.' '.Auth()->user()->Ten}}
                                    </h4>
                                    <p class="text-muted">{{Auth()->user()->Email ? Auth()->user()->Email : 'Chưa có Email'}}</p><a href="{{route('profile')}}" class="btn btn-xs btn-secondary btn-sm">Thông tin cá nhân</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
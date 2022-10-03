
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    
    <div class="container-fluid">
        <h1 class="head1">HỆ THỐNG QUẢN LÝ QUY HOẠCH VÀ HẠ TẦNG KỸ THUẬT THÀNH PHỐ MỸ THO</h1>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-layer-group"></i>
                </a>
                <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                    <div class="quick-actions-header">
                        <span class="title mb-1">Quick Actions</span>
                        <span class="subtitle op-8">Shortcuts</span>
                    </div>
                    <div class="quick-actions-scroll scrollbar-outer">
                        <div class="quick-actions-items">
                            <div class="row m-0">
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-file-1"></i>
                                        <span class="text">Generated Report</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-database"></i>
                                        <span class="text">Create New Database</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-pen"></i>
                                        <span class="text">Create New Post</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-interface-1"></i>
                                        <span class="text">Create New Task</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-list"></i>
                                        <span class="text">Completed Tasks</span>
                                    </div>
                                </a>
                                <a class="col-6 col-md-4 p-0" href="#">
                                    <div class="quick-actions-item">
                                        <i class="flaticon-file"></i>
                                        <span class="text">Create New Invoice</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        @switch(Auth()->user()->MaLoaiNguoiDung)
                            @case(1)
                                <img src="/image/admin.jpg" alt="..." class="avatar-img rounded-circle">
                                @break
                            @case(2)
                                <img src="/image/user-default.jpg" alt="..." class="avatar-img rounded-circle">
                                @break
                            @case(3)
                                <img src="/image/user-default.jpg" alt="..." class="avatar-img rounded-circle">
                                @break
                        @endswitch
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                @switch(Auth()->user()->MaLoaiNguoiDung)
                                    @case(1)
                                        <img src="/image/admin.jpg" alt="image profile" class="avatar-img rounded">
                                        @break
                                    @case(2)
                                        <img src="/image/user-default.jpg" alt="image profile" class="avatar-img rounded">
                                        @break
                                    @case(3)
                                        <img src="/image/user-default.jpg" alt="image profile" class="avatar-img rounded">
                                        @break
                                @endswitch
                                    
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
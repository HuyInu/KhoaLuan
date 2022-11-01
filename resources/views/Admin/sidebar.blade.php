<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
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
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{Auth()->user()->Ho.' '.Auth()->user()->Ten}}
                            <span class="user-level">{{Auth()->user()->LoaiNguoiDung->TenLoai}}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('profile')}}">
                                    <span class="link-collapse">Thông tin cá nhân</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                @include('Admin.SideBar.AllUser_Sidebar')

                @switch(Auth()->user()->MaLoaiNguoiDung)
                    @case(1)
                        @include('Admin.SideBar.SuperAdmin_Sidebar')
                        @break
                    @case(2)
                        
                        @break
                    @case(3)
                        
                        @break
                @endswitch

                <div class="card card-stats card-primary card-round" style="height: 3px; margin: 0 10px 0 13px;"></div>
            </ul>
        </div>
    </div>
</div>

@extends('Admin.main')

@section('head')
    @include('Admin.QLHaTangKyThuat.MenuDanhMuc.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Quản lý hạ tầng kỹ thuật</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Quản lý hạ tầng kỹ thuật</div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Cấp điện</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <a href="{{route('QLDuongDayDien')}}">
                                <div class="card card-stats card-primary card-round card-hover"  style="background-color: #f15555!important;color: white;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-battery-half"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <h4 class="card-title">Đường dây điện</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="{{route('QLTramBienAp')}}">
                                <div class="card card-stats card-primary card-round card-hover"  style="background-color: #ff8989!important;color: white;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fab fa-houzz"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <h4 class="card-title">Trạm biến áp</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Cấp nước</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <a href="{{route('QLDuongCapNuoc')}}">
                                <div class="card card-stats card-primary card-round card-hover">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-burn"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <h4 class="card-title">Đường ống cấp nước</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="{{route('QLNhaMayNuoc')}}">
                                <div class="card card-stats card-info card-round card-hover">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fab fa-houzz"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <h4 class="card-title">Nhà máy nước</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    @include('Admin.QLHaTangKyThuat.MenuDanhMuc.foot') 
@endsection
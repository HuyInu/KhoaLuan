@extends('Admin.main')

@section('head')
    @include('Admin.QLDanhMuc.MenuDanhMuc.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Quản lý danh mục</a>
</li>
@endsection

@section('content')
<h4 class="page-title">Quản lý danh mục</h4>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Quy hoạch đất</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('QLLoaiQuyHoach')}}">
                    <div class="card card-stats card-primary card-round card-hover">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-th-list"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h4 class="card-title">Loại quy hoạch</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('QLLoaiDuAn')}}">
                    <div class="card card-stats card-info card-round card-hover">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-th-list"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h4 class="card-title">Loại dự án</h4>
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

@endsection

@section('footer')
    @include('Admin.QLDanhMuc.MenuDanhMuc.foot') 
@endsection
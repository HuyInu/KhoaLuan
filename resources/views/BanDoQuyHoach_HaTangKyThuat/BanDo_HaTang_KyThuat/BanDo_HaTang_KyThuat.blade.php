@extends('BanDoQuyHoach_HaTangKyThuat.BanDoMain')

@section('head')
    @include('BanDoQuyHoach_HaTangKyThuat.BanDo_HaTang_KyThuat.head')
@endsection

@section('content')
    @if(Auth()->check())
        @if(Auth()->user()->MaLoaiNguoiDung ==1 || $QuyenQLHaTangKyThuat)
            @include('Admin.QLHaTangKyThuat.CapDien.DuongDayDien.Edit_DuongDayDIen_Modal')
            @include('Admin.QLHaTangKyThuat.CapDien.TramBienAp.Edit_TramBienAp_Modal')
            @include('Admin.QLHaTangKyThuat.CapNuoc.DuongCapNuoc.Edit_DuongCapNuoc_Modal')
            @include('Admin.QLHaTangKyThuat.CapNuoc.NhaMayNuoc.Edit_NhaMayNuoc_Modal')
        @endif
    @endif

@endsection

@section('foot')
    @include('BanDoQuyHoach_HaTangKyThuat.BanDo_HaTang_KyThuat.foot')
@endsection
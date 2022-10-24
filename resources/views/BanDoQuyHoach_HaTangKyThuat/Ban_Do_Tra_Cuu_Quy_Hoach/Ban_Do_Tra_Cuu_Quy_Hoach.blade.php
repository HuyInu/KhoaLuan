@extends('BanDoQuyHoach_HaTangKyThuat.BanDoMain')

@section('head')
    @include('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.head')
@endsection

@section('search-card-title')
    <div class="card-title">Tra cứu thửa đất</div>
@endsection

@section('soThua-soTo-input')
    <div class="form-group">
        <label for="SoThua">Số thửa</label>
        <input type="text" class="form-control" id="SoThua" name="SoThua" >
    </div>
    <div class="form-group">
        <label for="SoTo">Số tờ</label>
        <input type="SoTo" class="form-control" id="SoTo" name="SoTo" >
    </div>
@endsection

@section('content')
    @include('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.leffInfor')
@endsection


@section('foot')
    @include('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.foot')
@endsection
@extends('BanDoQuyHoach_HaTangKyThuat.BanDoMain')

@section('head')
    @include('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.head')
@endsection

@section('search')
<div id="search_Container" class="container hide">
    <div class="card-title">Tra cứu thửa đất</div>
    <form id="timKiem_form">
        <div class="form-group">
            <label for="Huyen">Quận huyện*</label>
            <select class="form-control" id="Huyen" name="Huyen">
                <option disabled selected hidden>Chọn quận huyện</option>
                @foreach($Huyen_Data as $item)
                <option value="{{$item->MaHuyen}}">{{$item->TenHuyen}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Xa">Phường xã*</label>
            <select class="form-control" id="Xa" name="Xa">
                <option value='' disabled selected hidden>Chọn phường xã</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="SoThua">Số thửa</label>
            <input type="text" class="form-control" id="SoThua" name="SoThua" >
        </div>
        <div class="form-group">
            <label for="SoTo">Số tờ</label>
            <input type="SoTo" class="form-control" id="SoTo" name="SoTo" >
        </div>
        <div class="form-group pull-right">
            <button type="button" id="TimKiem" class="btn btn-info"> <i class="fas fa-search"></i> Tìm</button>
        </div>
    </form>
</div>
@endsection

@section('search_menu')
<div class="menu-item">
    <button type="button" class="btn btn-icon btn-round btn-primary item-button" id="search">
        <i class="fas fa-search"></i>
    </button>
</div>
@endsection

@section('content')
    @include('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.leffInfor')
@endsection


@section('foot')
    @include('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.foot')
@endsection
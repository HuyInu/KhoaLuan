@extends('Admin.main')

@section('head')
    @include('Admin.QLHaTangKyThuat.CapNuoc.DuongCapNuoc.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="{{route('QLHaTangKyThuat')}}">Quản lý hạ tầng kỹ thuật</a>
</li>
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Đường cấp nước</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Quản lý loại dự án</h4>
            </div>
        </div>
        <div class="card-body">
            @include('Admin.QLHaTangKyThuat.CapNuoc.DuongCapNuoc.Edit_DuongCapNuoc_Modal')
            <div class='row'>
                <div class="form-group">
                    <label for="defaultSelect">Loại ống cấp nước:</label>
                    <select class="form-control" id="LoaiOngCapNuoc_Sort"  >
                        <option value="" selected hidden disablded>Chọn Loai đường dây điện</option>
                        <option value="" >Tất cả</option>
                        @foreach($LoaiDuongCapNuoc_list as $item)
                        <option value="{{$item->TenLoai}}">{{$item->TenLoai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="defaultSelect">Dự án quy hoạch:</label>
                    <select class="form-control" id="DAQH_DuongCapNuoc_Sort"  >
                        <option value="" selected hidden disablded>Chọn dự án quy hoạch</option>
                        <option value="" >Tất cả</option>
                        @foreach($DAQH_List as $item)
                        <option value="{{$item->TenDuAn}}">{{$item->TenDuAn}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Loại đường cấp nước</th>
                            <th>Đường kính (mm)</th>
                            <th>Chiều dài (mm)</th>
                            <th>Dự án quy hoạch</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @foreach($DuongCapOngNuoc as $item)
                        <tr>
                            <td>{{$item->LoaiDuongOngCapNuoc->TenLoai ?? ''}}</td>
                            <td>{{($item->DuongKinh != .0 && $item->DuongKinh != null ) ? str_replace('.',',',(float)$item->DuongKinh) : ''}}</td>
                            <td>{{($item->ChieuDai != .0 && $item->ChieuDai != null ) ? str_replace('.',',',(float)$item->ChieuDai) : ''}}</td>
                            <td>{{$item->DuAnQuyHoach->TenDuAn ?? ''}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary " data-original-title="Sửa" id="edit" OBJECTID="{{$item->OBJECTID}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger " data-original-title="Xóa" id="delete" OBJECTID="{{$item->OBJECTID}}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('Admin.QLHaTangKyThuat.CapNuoc.DuongCapNuoc.foot') 
@endsection
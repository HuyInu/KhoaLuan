@extends('Admin.main')

@section('head')
    @include('Admin.QLHaTangKyThuat.GiaoThong.head')
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
    <a href="#">Nhà máy nước</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Quản lý giao thông</h4>
            </div>
        </div>
        <div class="card-body">
            @include('Admin.QLHaTangKyThuat.GiaoThong.Edit_GiaoThong_Modal')
            <div class="row">
                <div class="form-group">
                    <label for="defaultSelect">Dự án quy hoạch:</label>
                    <select class="form-control" id="DAQH_NhaMayNuoc_Sort" >
                        <option value="" selected hidden disablded>Chọn dự án quy hoạch</option>
                        <option value=''>Tất cả</option>
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
                            <th>Tên đối tượng</th>
                            <th>Loại đường</th>
                            <th>Dự án quy hoạch</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @foreach($GiaoThongList as $item)
                        <tr>
                            <td>{{$item->Ten}}</td>
                            <td>{{$item->LoaiDuong}}</td>
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
    @include('Admin.QLHaTangKyThuat.GiaoThong.foot') 
@endsection
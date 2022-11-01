@extends('Admin.main')

@section('head')
    @include('Admin.QLSuDungDat.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Sử dụng đất</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Quản lý sử dụng đất</h4>
            </div>
        </div>
        <div class="card-body">
            @include('Admin.QLSuDungDat.EditModal')
            <div class="row" style="padding-left: 15px;">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Dự án quy hoạch:</label>
                    <select class="form-control" id="MaDuAnQuyHoach_Sort">
                        <option selected hidden disabled>Chọn dự án</option>
                        <option value>Tất cả</option>
                        @foreach($DuAnQuyHoach_list as $item)
                        <option value="{{$item->TenDuAn}}">{{$item->TenDuAn}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Loại đất QHXD:</label>
                    <select class="form-control" id="MaLoaiDatQHXD_Sort">
                        <option selected hidden disabled>Chọn loại đất</option>
                        <option value>Tất cả</option>
                        @foreach($DMLoaiDatQHXD_list as $item)
                        <option value="{{$item->TenLoaiDat}}">{{$item->TenLoaiDat}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Mã lô đất</th>
                            <th>Tên loại đất theo dự án</th>
                            <th>Diện tích</th>
                            <th>Hệ số sử dụng đất</th>
                            <th>Tầng cao xây dựng</th>
                            <th>Mật độ xây dựng</th>
                            <th>Dự án quy hoạch</th>
                            <th>Loại đất</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @foreach($SuDungDat_list as $item)
                        <tr>
                            <td>{{$item->OBJECTID}}</td>
                            <td>{{$item->TenLoaiDatTheoDA}}</td>
                            <td>{{$item->DienTich}}</td>
                            <td>{{$item->HeSoSuDungDat}}</td>
                            <td>{{$item->TangCaoXayDung}}</td>
                            <td>{{$item->MatDoXayDung}}</td>
                            <td>{{$item->DuAnQuyHoach->TenDuAn}}</td>
                            <td>{{$item->DMLoaiDatQHXD->TenLoaiDat}}</td>
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
    @include('Admin.QLSuDungDat.foot') 
@endsection
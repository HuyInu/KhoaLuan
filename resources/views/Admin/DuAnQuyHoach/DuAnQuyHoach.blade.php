@extends('Admin.main')

@section('head')
    @include('Admin.DuAnQuyHoach.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Danh mục dự án quy hoạch</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Dự án quy hoạch</h4>
                <button class="btn btn-primary btn-round ml-auto" id="insert">
                    <i class="fa fa-plus"></i>
                    Thêm
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
                <!-- edit -->
                @include('Admin.DuAnQuyHoach.EditModal')
                <!-- insert -->
                @include('Admin.DuAnQuyHoach.InsertModal')
                
            <!-- End Modal -->

            <div class="table-responsive">
                <table id="DuAnQuyHoachTable" class="display table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr >
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <th>Loại quy hoạch</th>
                            <th>Tình trạng phê duyệt</th>
                            <th>Ngày ký quyết định</th>
                            <th>Số quyết định phê duyệt </th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($dataDuAnQuyHoach as $item)
                        <tr>
                            <td></td>
                            <td >{{ $item->MaDuAn}}</td>
                            <td >{{$item->TenDuAn}}</td>
                            <td >{{ isset($item->LoaiQuyHoach->TenLoaiQuyHoach) ? $item->LoaiQuyHoach->TenLoaiQuyHoach : ''}}</td>
                            <td>{{$item->TinhTrangPheDuyet == 1 ? 'Đã phê duyệt' : 'Chưa phê duyệt'}}</td>
                            <td>{{$item->NgayKyQuyetDinh}}</td>
                            <td>{{$item->SoQuyetDinhPheDuyet}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" id="edit" class="btn btn-link btn-primary btn-lg" MaDuAn='{{$item->MaDuAn}}' data-original-title="Sửa">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" id="delete" class="btn btn-link btn-danger" MaDuAn='{{$item->MaDuAn}}' data-original-title="Xóa">
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
    @include('Admin.DuAnQuyHoach.foot') 
@endsection
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
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Thêm
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 1000px;">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Thêm mới dự án quy hoạch</span> 
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Mã dự án*:</label>
                                            <input type="text" class="form-control form-control" id="MaDuAn" name="MaDuAn">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Tên dự án*:</label>
                                            <input type="text" class="form-control form-control" id="TenDuAn" name="TenDuAn">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Loại quy hoạch:</label>
                                            <select class="form-control form-control" id="MaLoaiQuyHoach" name="MaLoaiQuyHoach">
                                                <option value="">Chọn loại quy hoạch</option>
                                                @foreach($dataLoaiQuyHoach as $item)
                                                <option value="{{$item['MaLoaiQuyHoach']}}">{{$item['TenLoaiQuyHoach']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Tình trạng phê duyệt:</label>
                                            <select class="form-control form-control" id="TinhTrangPheDuyet" name="TinhTrangPheDuyet">
                                                <option value="">Chọn tình trạng</option>
                                                <option value="0">Chưa phê duyệt</option>
                                                <option value="1">Đã phê duyệt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Số quyết định phê duyệt:</label>
                                            <input type="text" class="form-control form-control" id="SoQuyetDinhPheDuyet" name="SoQuyetDinhPheDuyet">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Ngày ký quyết định:</label>
                                            <input type="date" class="form-control form-control" id="NgayKyQuyetDinh" name="NgayKyQuyetDinh">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Quy mô dân số:</label>
                                            <input type="text" class="form-control form-control" id="QuyMoDanSo" name="QuyMoDanSo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Tỷ lệ bản vẻ:</label>
                                            <input type="text" class="form-control form-control" id="TyLeBanVe" name="TyLeBanVe">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Tiến độ dự án:</label>
                                            <select class="form-control form-control" id="MaTienDoDuAn" name="MaTienDoDuAn">
                                                <option value="">Chọn tiến độ dự án</option>
                                                @foreach($dataTienDoDuAn as $item)
                                                <option value="{{$item['id']}}">{{$item['TenTienDoDuAn']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Diện tích:</label>
                                            <input type="text" class="form-control form-control" id="DienTich" name="DienTich">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Loại dự án:</label>
                                            <select class="form-control form-control" id="MaLoaiDuAn" name="MaLoaiDuAn">
                                                <option value="">Chọn loại dự án</option>
                                                @foreach($dataLoaiDuAn as $item)
                                                <option value="{{$item['MaLoaiDuAn']}}">{{$item['TenLoaiDuAn']}}</option>
                                                @endforeach
                                                <option value="K">Loại khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian xin phê duyệt:</label>
                                            <input type="date" class="form-control form-control" id="ThoiGianXinPheDuyet" name="ThoiGianXinPheDuyet">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian quy hoạch:</label>
                                            <input type="date" class="form-control form-control" id="ThoiGianQuyHoach" name="ThoiGianQuyHoach">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian lấy ý kiến:</label>
                                            <input type="date" class="form-control form-control" id="ThoiGianLayYKien" name="ThoiGianLayYKien">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian công bố:</label>
                                            <input type="date" class="form-control form-control" id="ThoiGianCongBo" name="ThoiGianCongBo" value="{{date('Y-m-d')}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Đơn vị quản lý:</label>
                                            <input type="text" class="form-control form-control" id="DonViQuanLy" name="DonViQuanLy">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Đơn vị cập nhật</label>
                                            <input type="text" class="form-control form-control" id="DonViCapNhat" name="DonViCapNhat">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="DuAnQuyHoachTable" class="display table table-striped table-hover" >
                    <thead>
                        <tr role="row">
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <th>Loại quy hoạch</th>
                            <th>Tình trạng phê duyệt</th>
                            <th>Ngày ký quyết định</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <th>Loại quy hoạch</th>
                            <th>Tình trạng phê duyệt</th>
                            <th>Ngày ký quyết định</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <@foreach($dataDuAnQuyHoach as $item)
                        <tr role="row" class="odd">
                            <th>{{$loop->index}}</th>
                            <th>{{$item->MaDuAn}}</th>
                            <th>{{$item->TenDuAn}}</th>
                            <th>{{$item->LoaiQuyHoach->TenLoaiQuyHoach}}</th>
                            <th>{{$item->MaDuAn}}</th>
                            <th>{{$item->MaDuAn}}</th>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Sửa">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa">
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
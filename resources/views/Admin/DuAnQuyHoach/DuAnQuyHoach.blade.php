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
                                            <input type="text" class="form-control form-control" id="maDuAn" placeholder="Mã dự án">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Tên dự án*:</label>
                                            <input type="text" class="form-control form-control" id="tenDuAn">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Loại quy hoạch:</label>
                                            <select class="form-control form-control" id="loaiQuyHoach">
                                                <option value="">Chọn loại quy hoạch</option>
                                                <option value="QHCT">Quy hoạch chi tiết</option>
                                                <option value="QHCDT">Quy hoạch chung đô thị</option>
                                                <option value="QHCTT">Quy hoạch chung toàn tỉnh</option>
                                                <option value="QHKCN">Quy hoạch khu công nghiệp</option>
                                                <option value="QHNTM">Quy hoạch nông thôn mới</option>
                                                <option value="QHPK">Quy hoạch phân khu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Tình trạng phê duyệt:</label>
                                            <select class="form-control form-control" id="tinhTrangPheDuyet">
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Số quyết định phê duyệt:</label>
                                            <input type="text" class="form-control form-control" id="soQDPD">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Ngày ký quyết định:</label>
                                            <input type="date" class="form-control form-control" id="ngayKyQuyetDinh" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Quy mô dân số:</label>
                                            <input type="text" class="form-control form-control" id="quyMoDanSo" placeholder="Default Input">
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Tỷ lệ bản vẻ:</label>
                                            <input type="text" class="form-control form-control" id="tiLeBanVe">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Tiến độ dự án:</label>
                                            <select class="form-control form-control" id="tienDoDuAn">
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Diện tích:</label>
                                            <input type="text" class="form-control form-control" id="dienTich">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="defaultSelect">Loại dự án:</label>
                                            <select class="form-control form-control" id="loaiDuAn">
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian xin phê duyệt:</label>
                                            <input type="date" class="form-control form-control" id="thoiGianXinPheDuyet" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian quy hoạch:</label>
                                            <input type="date" class="form-control form-control" id="thoiGianQuyHoach" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian lấy ý kiến:</label>
                                            <input type="date" class="form-control form-control" id="thoiGianLayYKien" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Thời gian công bố:</label>
                                            <input type="date" class="form-control form-control" id="thoiGiangCongBo" value="{{date('Y-m-d')}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Đơn vị quản lý:</label>
                                            <input type="text" class="form-control form-control" id="donViQuanLy">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 .col-4">
                                        <div class="form-group">
                                            <label for="largeInput">Đơn vị cập nhật</label>
                                            <input type="text" class="form-control form-control" id="donViCapNhat">
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
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
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
                        <tr>
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
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
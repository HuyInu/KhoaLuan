<div class="modal fade" id="Add_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <h2 class="fw-mediumbold">
                    Thêm mới dự án quy hoạch</h2> 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Add_Form" >
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group Add_MaDuAn_group">
                                <label for="largeInput">Mã dự án*:</label>
                                <input type="text" class="form-control" id="Add_MaDuAn" name="Add_MaDuAn" >
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group Add_TenDuAn_group">
                                <label for="largeInput">Tên dự án*:</label>
                                <input type="text" class="form-control" id="Add_TenDuAn" name="Add_TenDuAn">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Loại quy hoạch:</label>
                                <select class="form-control" id="Add_MaLoaiQuyHoach"  name="Add_MaLoaiQuyHoach">
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
                                <select class="form-control" id="Add_TinhTrangPheDuyet" name="Add_TinhTrangPheDuyet">
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
                                <input type="text" class="form-control" id="Add_SoQuyetDinhPheDuyet" name="Add_SoQuyetDinhPheDuyet">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Ngày ký quyết định:</label>
                                <input type="date" class="form-control" id="Add_NgayKyQuyetDinh" name="Add_NgayKyQuyetDinh">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Quy mô dân số:</label>
                                <input type="text" class="form-control" id="Add_QuyMoDanSo" name="Add_QuyMoDanSo">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Tỷ lệ bản vẻ:</label>
                                <input type="text" class="form-control" id="Add_TyLeBanVe" name="Add_TyLeBanVe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Tiến độ dự án:</label>
                                <select class="form-control" id="Add_MaTienDoDuAn" name="Add_MaTienDoDuAn">
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
                                <input type="text" class="form-control" id="Add_DienTich" name="Add_DienTich">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Loại dự án:</label>
                                <select class="form-control" id="Add_MaLoaiDuAn" name="Add_MaLoaiDuAn">
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
                                <input type="date" class="form-control" id="Add_ThoiGianXinPheDuyet" name="Add_ThoiGianXinPheDuyet">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Thời gian quy hoạch:</label>
                                <input type="date" class="form-control" id="Add_ThoiGianQuyHoach" name="Add_ThoiGianQuyHoach">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Thời gian lấy ý kiến:</label>
                                <input type="date" class="form-control" id="Add_ThoiGianLayYKien" name="Add_ThoiGianLayYKien">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Thời gian công bố:</label>
                                <input type="date" class="form-control" id="Add_ThoiGianCongBo" name="Add_ThoiGianCongBo" value="{{date('Y-m-d')}}" >
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Đơn vị quản lý:</label>
                                <input type="text" class="form-control" id="Add_DonViQuanLy" name="Add_DonViQuanLy">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Đơn vị cập nhật</label>
                                <input type="text" class="form-control" id="Add_DonViCapNhat" name="Add_DonViCapNhat">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="modal-footer no-bd">
                                <button type="submit" id="addRowButton" class="btn btn-primary">Thêm</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
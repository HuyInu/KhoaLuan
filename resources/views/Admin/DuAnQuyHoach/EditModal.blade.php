<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <h2 class="fw-mediumbold">
                    Sửa dự án quy hoạch</h2> 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Edit_Form" >
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Mã dự án*:</label>
                                <input type="text" class="form-control" id="MaDuAn" name="MaDuAn" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Tên dự án*:</label>
                                <input type="text" class="form-control" id="TenDuAn" name="TenDuAn">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Loại quy hoạch:</label>
                                <select class="form-control" id="MaLoaiQuyHoach"  name="MaLoaiQuyHoach">
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
                                <select class="form-control" id="TinhTrangPheDuyet" name="TinhTrangPheDuyet">
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
                                <input type="text" class="form-control" id="SoQuyetDinhPheDuyet" name="SoQuyetDinhPheDuyet">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Ngày ký quyết định:</label>
                                <input type="date" class="form-control" id="NgayKyQuyetDinh" name="NgayKyQuyetDinh">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Quy mô dân số:</label>
                                <input type="text" class="form-control" id="QuyMoDanSo" name="QuyMoDanSo">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Tỷ lệ bản vẻ:</label>
                                <input type="text" class="form-control" id="TyLeBanVe" name="TyLeBanVe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Tiến độ dự án:</label>
                                <select class="form-control" id="MaTienDoDuAn" name="MaTienDoDuAn">
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
                                <input type="text" class="form-control" id="DienTich" name="DienTich">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Loại dự án:</label>
                                <select class="form-control" id="MaLoaiDuAn" name="MaLoaiDuAn">
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
                                <input type="date" class="form-control" id="ThoiGianXinPheDuyet" name="ThoiGianXinPheDuyet">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Thời gian quy hoạch:</label>
                                <input type="date" class="form-control" id="ThoiGianQuyHoach" name="ThoiGianQuyHoach">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Thời gian lấy ý kiến:</label>
                                <input type="date" class="form-control" id="ThoiGianLayYKien" name="ThoiGianLayYKien">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Thời gian công bố:</label>
                                <input type="date" class="form-control" id="ThoiGianCongBo" name="ThoiGianCongBo" value="{{date('Y-m-d')}}" >
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Đơn vị quản lý:</label>
                                <input type="text" class="form-control" id="DonViQuanLy" name="DonViQuanLy">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Đơn vị cập nhật</label>
                                <input type="text" class="form-control" id="DonViCapNhat" name="DonViCapNhat">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="editRowButton" class="btn btn-primary">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
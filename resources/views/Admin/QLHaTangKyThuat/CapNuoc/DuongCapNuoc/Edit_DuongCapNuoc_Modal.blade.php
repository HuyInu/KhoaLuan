<div class="modal fade" id="Edit_DuongCapNuoc_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head" style="color: white; background-color: #1269db;">
                <h5 class="modal-title">
                    <h2 id="modal_title" class="fw-mediumbold">
                    Cập nhật đường cấp nước mã:</h2><h2 id="OBJECTID_DuongCapNuoc" class="fw-mediumbold"></h2><p hidden id='rowID'></p>
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Edit_DuongCapNuoc_Form" >
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Đường kính(mm):</label>
                                <input type="number" class="form-control" id="DuongKinh" name="DuongKinh">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Chiều dài(mm):</label>
                                <input type="number" class="form-control" id="ChieuDai" name="ChieuDai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Loại ống cấp nước:</label>
                                <select class="form-control" id="LoaiOngCapNuoc"  name="LoaiOngCapNuoc">
                                    <option value="" selected hidden disablded>Chọn Loai đường dây điện</option>
                                    @foreach($LoaiDuongCapNuoc_list as $item)
                                    <option value="{{$item->MaLoai}}">{{$item->TenLoai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Dự án quy hoạch:</label>
                                <select class="form-control" id="DAQH_DuongCapNuoc"  name="DAQH_DuongCapNuoc">
                                    <option value="" selected hidden disablded>Chọn dự án quy hoạch</option>
                                    @foreach($DAQH_List as $item)
                                    <option value="{{$item->MaDuAn}}">{{$item->TenDuAn}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="button" id="edit_DuongCapNuoc_btn" class="btn btn-primary">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Edit_NhaMayNuoc_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head" style="color: white; background-color: #1269db;">
                <h5 class="modal-title">
                    <h2 id="modal_title" class="fw-mediumbold">
                    Cập nhật nhà máy nước mã:</h2><h2 id="OBJECTID_NhaMayNuoc" class="fw-mediumbold"></h2><p hidden id='rowID'></p>
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Edit_NhaMayNuoc_Form" >
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Tên đối tượng:</label>
                                <input type="text" class="form-control" id="TenNhaMayNuoc" name="TenNhaMayNuoc">
                            </div>
                        </div>
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="largeInput">Công xuất:</label>
                                <input type="text" class="form-control" id="CongSuat" name="CongSuat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 .col-4">
                            <div class="form-group">
                                <label for="defaultSelect">Dự án quy hoạch:</label>
                                <select class="form-control" id="DAQH_NhaMayNuoc"  name="DAQH_NhaMayNuoc">
                                    <option value="" selected hidden disablded>Chọn dự án quy hoạch</option>
                                    @foreach($DAQH_List as $item)
                                    <option value="{{$item->MaDuAn}}">{{$item->TenDuAn}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="button" id="edit_NhaMayNuoc_btn" class="btn btn-primary">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
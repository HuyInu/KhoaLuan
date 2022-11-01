<div class="modal fade" id="Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head" style="color: white; background-color: #1269db;">
                <h5 class="modal-title">
                    <h2 id="modal_title" class="fw-mediumbold">
                    Thêm mới loại quy hoạch</h2>
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Form" >
                    <div class="form-group" id="Ma-form-group">
                        <label for="largeInput">mã loại quy hoạch:</label>
                        <input type="text" class="form-control" id="MaLoaiQuyHoach" name="MaLoaiQuyHoach">
                    </div>
                    <div class="form-group" id="Ten-form-group">
                        <label for="largeInput">Tên loại quy hoạch:</label>
                        <input type="text" class="form-control" id="TenLoaiQuyHoach" name="TenLoaiQuyHoach">
                    </div>
                    <div class="modal-footer no-bd" style="margin-top: 1rem;">
                        <button type="button" id="addRowButton" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head" style="color: white; background-color: #1269db;">
                <h5 class="modal-title">
                    <h2 id="modal_title" class="fw-mediumbold">
                    Sửa loại quy hoạch mã: </h2> <h2 id="MaLoaiQuyHoach_Old" class="fw-mediumbold"></h2> <p hidden id='rowID'></p>
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Edit_Form" >
                    <div class="form-group" id="MaEdit-form-group">
                        <label for="largeInput">mã loại quy hoạch:</label>
                        <input type="text" class="form-control" id="MaLoaiQuyHoach_Edit" name="MaLoaiQuyHoach_Edit">
                    </div>
                    <div class="form-group" id="TenEdit-form-group">
                        <label for="largeInput">Tên loại quy hoạch:</label>
                        <input type="text" class="form-control" id="TenLoaiQuyHoach_Edit" name="TenLoaiQuyHoach_Edit">
                    </div>
                    <div class="modal-footer no-bd" style="margin-top: 1rem;">
                        <button type="button" id="editRowButton" class="btn btn-primary">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

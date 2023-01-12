<div class="modal fade" id="QuyenList_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head">
                <h5 class="modal-title">
                    <h2 class="fw-mediumbold">Danh sách nhóm quyền</h2>
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="card-sub">									
                        Tên đăng nhập : <span id="TenDangNhap_table_head" style="color:#2cabe3;"></span>
                    </div>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Quyền</th>
                            </tr>
                        </thead>
                        <tbody id="Quyen_NguoiDung_bodyTable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
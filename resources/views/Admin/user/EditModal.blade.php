<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head">
                <h5 class="modal-title">
                    <h2 class="fw-mediumbold">Sửa người dùng mã: &nbsp</h2> <h2 id="MaNguoiDung" class="fw-mediumbold"></h2>
                    <input type="hidden" id="rowID">
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Edit_Form" >
                    <fieldset class="fieldset-border">
                        <legend class="fieldset-border text-primary">THÔNG TIN CÁ NHÂN</legend>
                            <div class="row">
                                <div class="col-md-4 .col-4">
                                    <div class="form-group">
                                        <label for="largeInput">Họ, tên đệm*:</label>
                                        <input type="text" class="form-control" id="Edit_Ho" name="Edit_Ho" >
                                    </div>
                                </div>
                                <div class="col-md-2 .col-4">
                                    <div class="form-group">
                                        <label for="largeInput">Tên*:</label>
                                        <input type="text" class="form-control" id="Edit_Ten" name="Edit_Ten">
                                    </div>
                                </div>
                                <div class="col-md-6 .col-4">
                                    <div class="form-group">
                                        <label for="defaultSelect">Giới tính:</label>
                                        <select class="form-control" id="Edit_GioiTinh" name="Edit_GioiTinh">
                                            <option value="">Chọn giới tính</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 .col-4">
                                    <div class="form-group" id="Edit_DienThoai-form-group">
                                        <label for="largeInput">Điện thoại:</label>
                                        <input type="text" class="form-control" id="Edit_DienThoai" name="Edit_DienThoai" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>
                                <div class="col-md-6 .col-4">
                                    <div class="form-group" id="Edit_Email-form-group">
                                        <label for="largeInput">Email:</label>
                                        <input type="Email" class="form-control" id="Edit_Email" name="Edit_Email">
                                    </div>
                                </div>
                            </div>
                    </fieldset>
                    <fieldset class="fieldset-border">
                        <legend class="fieldset-border text-primary">THÔNG TIN TÀI KHOẢN</legend>
                            <div class="row">
                                <div class="col-md-6 .col-4">
                                    <div class="form-group" id="Edit_TenDangNhap-form-group">
                                        <label for="largeInput">Tên đăng nhập*:</label>
                                        <input type="text" class="form-control" id="Edit_TenDangNhap" name="Edit_TenDangNhap" >
                                    </div>
                                </div>
                                <div class="col-md-6 .col-4">
                                    <div class="form-group">
                                        <label for="defaultSelect">Cơ quan:</label>
                                        <select class="form-control" id="Edit_CoQuan" name="Edit_CoQuan">
                                            <option value="">Chọn cơ quan</option>
                                            @foreach($CoQuan as $item)
                                            <option value="{{$item->MaCoQuan}}">{{$item->TenCoQuan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 .col-4">
                                    <div class="form-group ">
                                        <label for="largeInput">Đổi mật khẩu:</label>
                                        <label class="switch">
                                            <input id="togglePassword" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group " id="Edit_password-form-group">
                                        <label for="largeInput">Mật khẩu mới*:</label>
                                        <div class="input-group ">	
                                            <input type="password" class="form-control" id="Edit_password" name="Edit_password" disabled>
                                            <div class="input-group-append" >
                                                <span class="input-group-text" id="Edit_btnShowPassword"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="largeInput">Nhập lại mật khẩu*:</label>
                                        <div class="input-group ">	
                                            <input type="password" class="form-control" id="Edit_password_confirm" name="Edit_password_confirm" disabled>
                                            <div class="input-group-append" >
                                                <span class="input-group-text" id="Edit_btnShowPassword_confirm"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 .col-4">
                                    <div class="form-group">
                                        <label for="defaultSelect">Loại người dùng:</label>
                                        <select class="form-control" id="Edit_LoaiNguoiDung" name="Edit_LoaiNguoiDung">
                                            <option value="">Chọn loại người dùng</option>
                                            @foreach($LoaiNguoiDung as $item)
                                            <option value="{{$item->MaLoai}}">{{$item->TenLoai}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="modal-footer no-bd" style="margin-top: 1rem;">
                                        <button type="submit"  class="btn btn-primary">Sửa</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                    </fieldset>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
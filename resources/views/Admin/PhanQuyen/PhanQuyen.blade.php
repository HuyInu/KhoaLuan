@extends('Admin.main')

@section('head')
    @include('Admin.PhanQuyen.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Phân quyền</a>
</li>
@endsection

@section('content')
<div class="modal fade" id="Add_Edit_Modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header no-bd modal_main_head">
                <h5 class="modal-title">
                    <h2 class="fw-mediumbold" id="modal-title"></h2>
                    <input type="hidden" id="rowID">
                </h5>
                <button type="button" class="close modal_main_CloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Them_Sua_Nhom_Quyen_Form" class="Them_Quyen Sua_Quyen">
                    <div class="form-group" id="TenNhomQuyen-form-group">
                        <label for="defaultSelect">Tên nhóm quyền:</label>
                        <input type="text" class="form-control" id="TenNhomQuyen" name="TenNhomQuyen">
                    </div>
                    <div class="modal-footer no-bd" style="margin-top: 1rem;">
                        <button type="submit" id="addNhomQuyenBtn"  class="btn btn-primary">Thêm</button>
                        <button type="submit" id="editNhomQuyenBtn"  class="btn btn-primary">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Phân quyền</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Phân quyền</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <select class="selectpicker" id="select-NhomQuyen" data-live-search="true">
                                        <option value='' disabled selected>Chọn nhóm quyền</option>
                                        @foreach($NhomQuyen_list as $item)
                                        <option value='{{$item->MaNhomQuyen}}'>{{$item->TenNhomQuyen}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="Open_ThemNhomQuyenForm"><i class="fas fa-plus" title="Thêm nhóm quyền"></i></button>
                                        <button class="btn btn-warning" id="Open_SuaNhomQuyenForm"><i class="fas fa-edit" title="Sửa nhóm quyền"></i></button>
                                        <button class="btn btn-danger" id="XoaNhomQuyen"><i class="fas fa-trash" title="Xóa nhóm quyền"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="divLabelQuyen" style="display: block;">
                                <ul class="list-group" id="list-quyen">
                                </ul>
                            </div>
                            <div id="CapNhat_Div" style="display:none">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tim_Quyen" placeholder="Tìm quyền">
                                </div>
                                <div id="tree_Quyen" class="form-group">
                                    <ul id="treeData" style="display: none;">
                                        <li id="0" class="folder">Tất cả
                                        <ul>
                                            @foreach($Quyen_list as $item)
                                            <li id="{{$item->MaQuyen}}">{{$item->TenQuyen}}
                                            @endforeach
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="form-check pull-left" id='CapNhat_checkbox_div' style="display:none">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" id="CapNhat_checkbox">
                                    <span class="form-check-sign">Cập nhật</span>
                                </div>
                                <div class="form-group text-right" id="Div_Luu_Quyen" style="display:none">
                                    <button class="btn btn-success" id="save_NhomQuyen_Quyen">Lưu</button>
                                </div> 
                            </div> 
                        </div>    
                    </div>                     
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Người dùng</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="tim_taiKhoan" placeholder="Tìm người dùng">
                            </div>
                            <div class="form-group">
                                <div id="treeData_NguoiDung">
                                    <ul id="treeData" style="display: none;">
                                        <li id="0" class="folder">Phòng quản lý đô thị TP Mỹ Tho
                                        <ul role="group">
                                            @foreach($NguoiDung_list as $item)
                                            <li id="{{$item->id }}">{{$item->Ho}}
                                            @endforeach
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success" id="save_NhomQuyen_NguoiDung">Lưu</button>
                            </div> 
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('Admin.PhanQuyen.foot') 
@endsection
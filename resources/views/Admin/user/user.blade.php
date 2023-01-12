@extends('Admin.main')

@section('head')
    @include('Admin.user.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Quản lý tài khoản</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Quản lý tài khoản</h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#Add_Modal">
                    <i class="fa fa-plus"></i>
                    Thêm
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            @include('Admin.user.InsertModal')
            @include('Admin.user.EditModal')
            @include('Admin.user.DSNhomQuyenModal')
            <div class="row" style="padding-left: 15px;">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Loại người dùng:</label>
                    <select class="form-control" id="LoaiNguoiDung_Sort">
                        <option selected hidden disabled>Chọn loại người dùng</option>
                        <option value>Tất cả</option>
                        @foreach($LoaiNguoiDung as $item)
                        <option value="{{$item->TenLoai}}">{{$item->TenLoai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cơ quan:</label>
                    <select class="form-control" id="CoQuan_Sort">
                        <option selected hidden disabled>Chọn cơ quan</option>
                        <option value>Tất cả</option>
                        @foreach($CoQuan as $item)
                        <option value="{{$item->TenCoQuan}}">{{$item->TenCoQuan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="user_table" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Tên đăng nhập</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Loại người dùng</th>
                            <th>Cơ quan</th>
                            <th>Điện thoại</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @foreach($NguoiDungList as $item)
                        <tr>
                            <td>{{$item->TenDangNhap ? $item->TenDangNhap : null}}</td>
                            <td>{{$item->Ho && $item->Ten ? $item->Ho .' '.$item->Ten : null}}</td>
                            <td>{{$item->Email ? $item->Email : null}}</td>
                            <td>{{$item->GioiTinh ? $item->GioiTinh == 1 ? 'Nam' : 'Nữ' : null}}</td>
                            <td>{{$item->LoaiNguoiDung ? $item->LoaiNguoiDung->TenLoai : null}}</td>
                            <td>{{$item->CoQuan ? $item->CoQuan->TenCoQuan : null}}</td>
                            <td>{{$item->DienThoai ? $item->DienThoai : null}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary " data-original-title="Sửa" id="edit" MaNguoiDung="{{$item->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Nhóm quyền" id="ShowQuyen" MaNguoiDung="{{$item->id}}">
                                        <i class="fas fa-user-circle"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger " data-original-title="Xóa" id="delete" MaNguoiDung="{{$item->id}}">
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
    @include('Admin.user.foot') 
@endsection
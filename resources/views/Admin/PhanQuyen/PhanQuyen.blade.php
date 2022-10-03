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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Phân quyền</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title">Phân quyền</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <select class="selectpicker" id="select-NhomQuyen" data-live-search="true">
                                    <option value=''>Chọn nhóm quyền</option>
                                    @foreach($NhomQuyen_list as $item)
                                    <option value='$item->MaNhomQuyen'>{{$item->TenNhomQuyen}}</option>
                                </select>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <button class="btn btn-primary"><i class="fas fa-plus" title="Thêm nhóm quyền"></i></button>
                                    <button class="btn btn-warning"><i class="fas fa-edit" title="Sửa nhóm quyền"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-trash" title="Xóa nhóm quyền"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="tree">
                            <ul id="treeData" style="display: none;">
                                <li id="1">Node 1
                                <li id="2" class="folder">Folder 2
                                <ul>
                                    <li id="3">Node 2.1
                                    <li id="4">Node 2.2
                                </ul>
                            </ul>
                        </div>
                    </div>                        
                </div>
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title">Người dùng</h4>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email2" placeholder="Tìm người dùng">
                    </div>
                    <div class="card-body">
                        <div id="treeData_NguoiDung">
                            <ul id="treeData" style="display: none;">
                                <li id="" class="folder">Phòng quản lý đô thị TP Mỹ Tho
                                <ul role="group">
                                    <li id="" class="folder">Khác
                                    <ul>
                                    @foreach($NguoiDung_list as $item)
                                    <li id="{{$item->id}}">{{"$item->Ho $item->Ten ($item->TenDangNhap)"}}
                                    @endforeach
                                    </ul>
                                </ul>
                            </ul>
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
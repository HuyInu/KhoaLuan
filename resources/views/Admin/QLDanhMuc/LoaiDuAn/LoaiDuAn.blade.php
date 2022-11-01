@extends('Admin.main')

@section('head')
    @include('Admin.QLDanhMuc.LoaiDuAn.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="{{route('QLDanhMuc')}}">Quản lý danh mục</a>
</li>
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Loại dự án</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Quản lý loại dự án</h4>
                <button class="btn btn-primary btn-round ml-auto" id="add">
                    <i class="fa fa-plus"></i>
                    Thêm
                </button>
            </div>
        </div>
        <div class="card-body">
            @include('Admin.QLDanhMuc.LoaiDuAn.modal')
            <div class="table-responsive">
                <table id="table" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Mã loại dự án</th>
                            <th>Tên loại dự án</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @foreach($LoaiDuAn_list as $item)
                        <tr>
                            <td>{{$item->MaLoaiDuAn}}</td>
                            <td>{{$item->TenLoaiDuAn}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary " data-original-title="Sửa" id="edit" MaLoaiDuAn="{{$item->MaLoaiDuAn}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger " data-original-title="Xóa" id="delete" MaLoaiDuAn="{{$item->MaLoaiDuAn}}">
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
    @include('Admin.QLDanhMuc.LoaiDuAn.foot') 
@endsection
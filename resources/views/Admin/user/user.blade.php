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
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Thêm
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Thêm mới</span> 
                                <span class="fw-light">
                                    dự án quy hoạch
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Điền đủ thông tin để thêm dự án quy hoạch mới</p>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                            <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Office</label>
                                            <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Loại người dùng</th>
                            <th>Cơ quan</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Loại người dùng</th>
                            <th>Cơ quan</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <th>STT</th>
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        
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
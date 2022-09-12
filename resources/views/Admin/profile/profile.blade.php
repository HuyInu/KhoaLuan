@extends('Admin.main')

@section('head')
    @include('Admin.profile.head')
@endsection

@section('pageHeader')
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Thông tin cá nhân</a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="{{$avatar}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name">{{$userInfor['Ho'].' '.$userInfor['Ten']}}</div>
                    <div class="job">Frontend Developer</div>
                    <div class="desc">A man who hates loneliness</div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="taiKhoan">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="taiKhoan" value="{{$userInfor['TenDangNhap']}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="ho">Họ*</label>
                                <input type="text" class="form-control" id="ho" value="{{$userInfor['Ho']}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="ten">Tên*</label>
                                <input type="text" class="form-control" id="ten" value="{{$userInfor['Ten']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="gioiTinh">Giới tính:</label>
                                <select class="form-control form-control" id="gioiTinh">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="coQuan">Cơ quan:</label>
                                <select class="form-control form-control" id="coQuan">
                                    <option value="0">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="soDienThoai">Số điện thoại:</label>
                                <input type="text" class="form-control" id="soDienThoai" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$userInfor['DienThoai']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="huyen">Quận/ huyện:</label>
                                <select class="form-control form-control" id="huyen">
                                    <option value="0">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="xa">Phường/ xã:</label>
                                <select class="form-control form-control" id="xa">
                                    <option value="0">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="diaChi">Địa chỉ:</label>
                                <input type="text" class="form-control" id="diaChi" value="{{$userInfor['DiaChi']}}">
                            </div>
                        </div>
                    </div>
                        <button class="btn btn-success">Sửa</button>
                        <button class="btn btn-danger">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('Admin.profile.foot') 
@endsection
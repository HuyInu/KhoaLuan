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
<div class="modal fade" id="doiMatKhau" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <h2 class="fw-mediumbold">
                    Đổi mật khẩu</h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="doiMatKhauForm">
                    <div class="form-group" >
                        <label for="passwordOld">Mật khẩu cũ:</label>
                        <div class="input-group ">	
                            <input type="password" class="form-control" id="passwordOld" name="passwordOld" >
                            <div class="input-group-append" >
                                <span class="input-group-text" id="passwordOld_btnShowPassword"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label for="passwordNew">Mật khẩu mới:</label>
                        <div class="input-group ">	
                            <input type="password" class="form-control" id="passwordNew" name="passwordNew" >
                            <div class="input-group-append" >
                                <span class="input-group-text" id="passwordNew_btnShowPassword"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label for="passwordNew_confirm">Nhập lại mật khẩu mới:</label>
                        <div class="input-group ">	
                            <input type="password" class="form-control" id="passwordNew_confirm" name="passwordNew_confirm" >
                            <div class="input-group-append" >
                                <span class="input-group-text" id="passwordNew_confirm_btnShowPassword"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="login" class="btn btn-primary">Đổi mật khẩu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    @csrf
                </form>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('/template/Atlantis/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="{{$avatar}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name" id="Ten_CardProfile">{{$userInfor['Ho'].' '.$userInfor['Ten']}}</div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form id="profile-form">
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="taiKhoan">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="{{$userInfor['TenDangNhap']}} "disabled>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="ho">Họ*</label>
                                <input type="text" class="form-control" id="Ho" name="Ho" value="{{$userInfor['Ho']}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="ten">Tên*</label>
                                <input type="text" class="form-control" id="Ten" name="Ten" value="{{$userInfor['Ten']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="gioiTinh">Giới tính:</label>
                                <select class="form-control form-control" id="GioiTinh" name="GioiTinh">
                                    <option value="">Chọn giới tính</option>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="coQuan">Cơ quan:</label>
                                <select class="form-control form-control" id="MaCoQuan" name="MaCoQuan">
                                    <option value="0">Chọn cơ quan:</option>
                                    @foreach($duLieuCoQuan as $data)
                                    <option value="{{$data['MaCoQuan']}}">{{$data['TenCoQuan']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group" id="DienThoai-form-group">
                                <label for="soDienThoai">Số điện thoại:</label>
                                <input type="text" class="form-control" id="DienThoai" name="DienThoai" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$userInfor['DienThoai']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group" id="email-form-group">
                                <label for="huyen">Email:</label>
                                <input type="email" class="form-control" id="Email" name="Email" value="{{$userInfor['Email']}}">
                                
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="huyen">Quận/ huyện:</label>
                                <select class="form-control form-control" id="MaHuyen" name="MaHuyen">
                                    <option value="0">Chọn quận/ huyện</option>
                                    @foreach($duLieuHuyen as $data)
                                    <option value="{{$data['MaHuyen']}}">{{$data['TenHuyen']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="xa">Phường/ xã*:</label>
                                <select class="form-control form-control" id="MaXa" name="MaXa">
                                    <option value="" >Chọn phường/ xã</option>
                                    @if($duLieuXa != 0)
                                        @foreach($duLieuXa as $data)
                                        <option value="{{$data['MaXa']}}">{{$data['TenXa']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row p-b-10">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="diaChi">Địa chỉ:</label>
                                <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="{{$userInfor['DiaChi']}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#doiMatKhau">
                            <span class="btn-label">
                                <i class="fas fa-key"></i>
                            </span>
                            Đổi mật khẩu
                        </button>
                        <button type="submit" class="btn btn-success">
                            <span class="btn-label">
                                <i class="fas fa-save"></i>
                            </span>
                            Lưu
                        </button>
                        <a href='{{route("home")}}'>
                            <button type="button" class="btn btn-danger">
                                <span class="btn-label">
                                    <i class="fas fa-times"></i>
                                </span>
                                Hủy
                            </button>
                        </a>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('Admin.profile.foot') 
@endsection
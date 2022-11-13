<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang chủ | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

		<!-- Fonts and icons -->
		<script src="/template/Atlantis/js/plugin/webfont/webfont.min.js"></script>
		<script>
			WebFont.load({
				google: {"families":["Lato:300,400,700,900"]},
				custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/template/Atlantis/css/fonts.min.css']},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!-- CSS Files -->
		<link rel="stylesheet" href="/template/Atlantis/css/bootstrap.min.css">
		<link rel="stylesheet" href="/template/Atlantis/css/atlantis.min.css">

		<link rel="stylesheet" href="/template/Atlantis/css/atlantis.min.css">

		<link rel="stylesheet" href="/css/welcome.css" />
		<link rel="stylesheet" href="/css/main.css" />

    </head>
    <body>
		<!-- Wrapper -->
		<div id="wrapper" class="bg" >
			<!-- Logo Header -->
			@if(Auth()->check())
			<div class="main-header" style="background: #ff000000; box-shadow: none;">
				<!-- End Logo Header -->
				<!-- Navbar Header -->
				<nav class="navbar navbar-expand-lg" data-background-color="blue2" style="background: #ff000000;">
					@php
					$userType = Auth::user()->MaLoaiNguoiDung;
					$avatarSrc = null;
					switch ($userType) {
						case 1:
							$avatarSrc = "/image/admin.jpg";
							break;
						case 2:
							$avatarSrc = '/image/user-default.jpg';
							break;
						case 3:
							$avatarSrc = '/image/user-default.jpg';
							break;
					};
					@endphp
					<div class="container-fluid">
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<li class="nav-item dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{$avatarSrc}}" alt="..." class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="scroll-wrapper dropdown-user-scroll scrollbar-outer" style="position: relative;"><div class="dropdown-user-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="{{$avatarSrc}}" alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4>{{Auth()->user()->Ho.' '.Auth()->user()->Ten}}</h4>
													<p class="text-muted">{{Auth()->user()->Email}}</p><a href="{{route('profile')}}" class="btn btn-xs btn-secondary btn-sm">Thông tin cá nhân</a>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
										</li>
									</div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>
			@endif
			<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 600px;">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Đăng nhập</span>  <span id="loginFail" class="error invalid-feedback" >Tài khoản hoặc mật khẩu không đúng.</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="loginForm">
								<div class="form-group">
									<label for="largeInput">Tài khoản:</label>
									<input type="text" class="form-control form-control" name="taiKhoan" id="taiKhoan">
								</div>
								<div class="form-group">
									<label for="largeInput">Mật khẩu:</label>
									<input type="password" class="form-control form-control" name="matKhau" id="matKhau">
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" value="" id="remember">
										<span class="form-check-sign">Lưu đăng nhập</span>
									</label>
								</div>
								<div class="modal-footer no-bd">
									<button type="submit" id="login" class="btn btn-primary">Đăng nhập</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
								</div>
								@csrf
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
			<div class="">
				<div class="">
					<div class="page-inner">

						<div style="text-align: center;margin-top: 50px;" class="card-body">
							<a href="#" class="logo">
								<img style="height: 100px;width: 100;" src="/image/main-logo.png" alt="navbar brand" class="navbar-brand">
							</a>
							<h1 style="color: white;">HỆ THỐNG THÔNG TIN ĐỊA LÝ THÀNH PHỐ MỸ THO</h1>
							<h2 style="color: white;">QUẢN LÝ QUY HOẠCH VÀ HẠ TẦNG KỸ THUẬT</h2>
							<p style="margin-top: 6rem;" class="demo"></p>
							
							<div class="row col-md-8 ml-auto mr-auto">
								
								<div class="col-sm-6 col-md-4">
									<a href="{{route('ban-do-quy-hoach')}}" class="card-href">
									<div class="card card-stats card-round card-custom card-hover" style="background-color: #1572e89c;color: white;">
										<div class="card-body">
											<p  class="space"></p>
											<span class="btn-label">
												<i class="fas fa-search"></i>
											</span>
											<h3>TRA CỨU THÔNG TIN <br>QUY HOẠCH</h3>
										</div>
									</div>
									</a>
								</div>
								
								<div class="col-sm-6 col-md-4">
									<a href="{{route('ban-do-ha-tang-ky-thuat')}}" class="card-href">
									<div class="card card-stats  card-round card-custom card-hover" style="background-color: #48abf794;color: white;">
										<div class="card-body">
											<p  class="space"> </p>
											<span class="btn-label">
												<i class="fas fa-search"></i>
											</span>
											<h3>TRA CỨU DỮ LIỆU<br> HẠ TẦNG KỸ THUẬT</h3>
										</div>
									</div>
									</a>
								</div>
								@if(auth()->check())
									@if($userType ==1 || $QuyenQLDAQH)
										<div class="col-sm-6 col-md-4">
											<a href="{{route('duAnQuyHoach')}}" class="card-href">
											<div class="card card-stats card-round card-custom card-hover" style="background-color: #2dd93fa8;color: white;">
												<div class="card-body">
													<p  class="space"></p>
													<span class="btn-label">
														<i class="fas fa-pen-alt"></i>
													</span>
													<h3>DỰ ÁN QUY HOẠCH</h3>
												</div>
											</div>
											</a>
										</div>
									@endif
									@if($userType ==1 || $QuyenQLDanhMuc)
										<div class="col-sm-6 col-md-4">
											<a href="{{route('QLDanhMuc')}}" class="card-href">
											<div class="card card-stats card-round card-custom card-hover" style="background-color: #2b3ec7c2;color: white;">
												<div class="card-body">
													<p  class="space"></p>
													<span class="btn-label">
														<i class="fas fa-th-list"></i>
													</span>
													<h3>DANH MỤC</h3>
												</div>
											</div>
											</a>
										</div>
									@endif
									@if($userType ==1 || $QuyenQLSuDungDat)
										<div class="col-sm-6 col-md-4">
											<a href="{{route('SuDungDat')}}" class="card-href">
											<div class="card card-stats card-round card-custom card-hover" style="background-color: #c72b4bc2;color: white;">
												<div class="card-body">
													<p  class="space"></p>
													<span class="btn-label">
														<i class="fas fa-th-list"></i>
													</span>
													<h3>SỬ DỤNG ĐẤT</h3>
												</div>
											</div>
											</a>
										</div>
									@endif
									@if($userType ==1 || $QuyenQLHaTangKyThuat)
										<div class="col-sm-6 col-md-4">
											<a href="{{route('QLHaTangKyThuat')}}" class="card-href">
											<div class="card card-stats card-round card-custom card-hover" style="background-color: #b6c72bd1;color: white;">
												<div class="card-body">
													<p  class="space"></p>
													<span class="btn-label">
														<i class="fas fa-th-list"></i>
													</span>
													<h3>HẠ TẦNG KỸ THUẬT</h3>
												</div>
											</div>
											</a>
										</div>
									@endif
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-group" id="setting">
				@if(auth()->check())
					@if($userType ==1 || $QuyenQLNguoiDung)
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-cogs fa-2xl"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{route('PhanQuyen')}}">Phân quyền</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{route('user')}}">Quản lý người dùng</a>
					</div>
					@endif
				@else
					<button class="btn btn-info" data-toggle="modal" data-target="#loginModel">Đăng nhập</button>			
				@endif
			</div>
		</div>
			
		<!-- Scripts -->
			

			<!--   Core JS Files   -->
			<script src="/template/Atlantis/js/core/jquery.3.2.1.min.js"></script>
			<script src="/template/Atlantis/js/core/popper.min.js"></script>
			<script src="/template/Atlantis/js/core/bootstrap.min.js"></script>

			<!-- jQuery UI -->
			<script src="/template/Atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
			<script src="/template/Atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

			<!-- jQuery Scrollbar -->
			<script src="/template/Atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

			<!-- Chart JS -->
			<script src="/template/Atlantis/js/plugin/chart.js/chart.min.js"></script>

			<!-- jQuery Sparkline -->
			<script src="/template/Atlantis/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

			<!-- Chart Circle -->
			<script src="/template/Atlantis/js/plugin/chart-circle/circles.min.js"></script>

			<!-- Datatables -->
			<script src="/template/Atlantis/js/plugin/datatables/datatables.min.js"></script>

			<!-- Bootstrap Notify -->
			<script src="/template/Atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

			<!-- jQuery Vector Maps -->
			<script src="/template/Atlantis/js/plugin/jqvmap/jquery.vmap.min.js"></script>
			<script src="/template/Atlantis/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

			<!-- Sweet Alert -->
			<script src="/template/Atlantis/js/plugin/sweetalert/sweetalert.min.js"></script>
			<script src="/template/Atlantis/js/atlantis.min.js"></script>		

			<!-- Validate -->
			<script src="/js/jquery.validate.min.js"></script>

			
			<script src="/js/welcome/login.js"></script>	
			<script src="/js/welcome/addEvenListener.js"></script>
			<script src="/js/welcome/loginValidate.js"></script>
	</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang chủ | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    
        <link rel="stylesheet" href="/image/css/welcome.css" />

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

    </head>
    <body>
		<!-- Wrapper -->
		<div id="wrapper" class="bg" >
			<div class="main-header">

				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
					
					<div class="container-fluid">
						
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<li class="nav-item toggle-nav-search hidden-caret">
								<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
									<i class="fa fa-search"></i>
								</a>
							</li>
							<li class="nav-item">
								<a data-toggle="modal" class="nav-link" href="#addRowModal">Đăng nhập</a>
							</li>
						</ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>
			<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 600px;">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Đăng nhập</span> 
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
								<div class="form-group">
									<label for="largeInput">Tài khoản:</label>
									<input type="text" class="form-control form-control" id="taiKhoan">
								</div>
								<div class="form-group">
									<label for="largeInput">Mật khẩu:</label>
									<input type="password" class="form-control form-control" id="matKhau">
								</div>
                            </form>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" id="addRowButton" class="btn btn-primary">Đăng nhập</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
			<div class="">
				<div class="">
					<div class="page-inner">

						<div style="text-align: center;margin-top: 50px;" class="card-body">
							<a href="index.html" class="logo">
								<img style="height: 100px;width: 100;" src="/image/main-logo.png" alt="navbar brand" class="navbar-brand">
							</a>
							<h1 style="color: white;">HỆ THỐNG THÔNG TIN ĐỊA LÝ THÀNH PHỐ MỸ THO</h1>
							<h2 style="color: white;">QUẢN LÝ QUY HOẠCH VÀ HẠ TẦNG KỸ THUẬT</h2>
							<p style="margin-top: 6rem;" class="demo">
								<button class="btn btn-info btn_custom">
									<span class="btn-label">
										<i class="fas fa-search"></i>
									</span>
									<h5>TRA CỨU THÔNG TIN <br>QUY HOẠCH</h5>
								</button>

								<button class="btn btn-success btn_custom">
									<span class="btn-label">
										<i class="fas fa-map"></i>
									</span>
									<h5>THÔNG TIN DỰ ÁN <br>QUY HOẠCH</h5>
								</button>

								<button class="btn btn-warning btn_custom">
									<span class="btn-label">
										<i class="fas fa-search"></i>
									</span>
									<h5>TRA CỨU DỮ LIỆU<br> HẠ TẦNG KỸ THUẬT</h5>
								</button>

								<button class="btn btn-danger btn_custom">
									<span class="btn-label">
										<i class="fas fa-pen-alt"></i>
									</span>
									<h5>DỰ ÁN QUY HOẠCH</h5>
								</button>
							</p>
						</div>
					</div>
				</div>
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

			<script src="/js/login.js"></script>	
	</body>
</html>

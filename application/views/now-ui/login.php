

<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=site_url('assets/now-ui-kit-master')?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?=site_url('assets/now-ui-kit-master')?>/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- ----------------------------------------------------------------------- 
    Section (6) : $ui_brand             
        -> untuk menambahkan judul pada navbar brand
            * format penulisan  
                String 
            * contoh penulisan  
                'Laporan' 
    ------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------- 
        Lihat section (6) diatas dan section (2)
    ------------------------------------------------------------------------------- -->
    <title>
        <?=((isset($ui_title) ? $ui_title : '(ui_title) : Tidak ada Judul'))?> <?=((isset($ui_brand) ? $ui_brand : '(ui_title) : Tidak ada Judul'))?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="<?=site_url('assets/now-ui-kit-master')?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=site_url('assets/now-ui-kit-master')?>/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
    <link rel="stylesheet" href="<?=site_url('assets/fontawesome-free-5.14.0-web/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=site_url('assets/custom/css/default.css')?>">
</head>

<body class="login-page sidebar-collapse">
	<div class="page-header clear-filter" filter-color="orange">
		<div class="page-header-image" style="background-image:url(<?=site_url('assets/now-ui-kit-master')?>/img/login.jpg)"></div>
		<div class="content">
			<div class="container">
				<div class="col-xl-6 col-md-8 ml-auto mr-auto">
					<div class="card card-login card-plain" style="max-width: initial;">
						<form class="form" method="post" action="<?=site_url('auth/do_login')?>">
							<div class="card-header text-center">
								<div class="logo-container">
									<img src="<?=site_url('assets/now-ui-kit-master')?>/img/now-logo.png" alt="">
								</div>
							</div>
							<div class="card-body pb-0">
								<div class="input-group mb-2 no-border input-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="now-ui-icons users_circle-08"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Username">
								</div>
								<div class="input-group mb-2 no-border input-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="now-ui-icons ui-1_lock-circle-open"></i>
										</span>
									</div>
									<input type="text" placeholder="Password" class="form-control" />
								</div>
								<div class="form-group">
									<div class="form-check form-check-radio form-check-inline">
										<label class="form-check-label">
											<input type="radio" name="login_sebagai" class="form-check-input" value="mahasiswa" checked="true">
											<span class="form-check-sign form-check-sign-dark"></span>
											Mahasiswa
										</label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
										<label class="form-check-label">
											<input type="radio" name="login_sebagai" class="form-check-input" value="dosen">
											<span class="form-check-sign form-check-sign-dark"></span>
											Dosen
										</label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" type="radio" name="login_sebagai" value="administrator">
											<span class="form-check-sign form-check-sign-dark"></span>
											Administrator
										</label>
									</div>
								</div>

							</div>
							<div class="card-footer text-center">
								<input type="submit" class="btn btn-primary btn-round btn-lg btn-block" value="Login"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/core/popper.min.js" type="text/javascript"></script>
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/core/bootstrap.min.js" type="text/javascript"></script>
	<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/plugins/bootstrap-switch.js"></script>
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/plugins/nouislider.min.js" type="text/javascript"></script>
	<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
	<script src="<?=site_url('assets/now-ui-kit-master')?>/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>


</body>

</html>

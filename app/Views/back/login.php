<!DOCTYPE html>
<html lang="en">

<head>

	<title>Flat Able - Premium Admin Template by Phoenixcoded</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?= base_url('assets_back') ?>/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?= base_url('assets_back') ?>/css/style.css">
	<script>
		let base_url = `<?= base_url() ?>`
	</script>

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<!-- <img src="<?= base_url('assets_back') ?>/images/logo.png" alt="" class="img-fluid mb-4"> -->
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Login</h4>
						<?php if (isset($_SESSION['error'])) : ?>
							<div class="alert alert-danger">
								<?= $_SESSION['error'] ?>
							</div>
						<?php endif ?>
						<hr>
						<form action="<?= base_url('login') ?>" method="POST" id="">
							<?= csrf_field() ?>
							<div class="form-group mb-3">
								<input type="text" class="form-control" name="email" id="email" placeholder="Alamat Email" autofocus value="<?= old('email') ?>" required>
							</div>
							<div class="form-group mb-4">
								<input type="password" name="password" id="password" class="form-control" id="Password" placeholder="Password" required>
							</div>
							<div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="remember">
								<label class="custom-control-label" for="remember">Tampilkan Password</label>
							</div>
							<button class="btn btn-block btn-primary mb-4" type="submit">Login</button>
							<hr>
							<p class="mb-2 text-muted">Lupa password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
							<p class="mb-0 text-muted">Belum punya akun? <a href="auth-signup.html" class="f-w-400">Daftar</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= base_url('assets_back') ?>/js/vendor-all.min.js"></script>
<script src="<?= base_url('assets_back') ?>/js/plugins/bootstrap.min.js"></script>

<script src="<?= base_url('assets_back') ?>/js/pcoded.min.js"></script>
<script src="<?= base_url('assets') ?>/js/sweetalert2.js"></script>
<script src="<?= base_url('assets_back') ?>/script/login.js"></script>



</body>

</html>
<?php 
	session_start(); 
	include_once('condb.php');
	$m_level = $_GET['m_level'];

?>

<html lang="en">
	<head>
		<title>Gaming Gear Powerfull Shop</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="login/css/style.css">
	</head>
	<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>


			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

		<form class="login100-form validate-form p-b-33 p-t-5" action="cheack_login.php" method="POST">
			<section class="ftco-section">
				<div class="container">
					<?php
					if($_GET['m_level']=='member'){
					?>
					<div class="row justify-content-center">
						<div class="col-md-6 text-center mb-5">
							<h2 class="heading-section">Welcome to GGP Shop</h2>
						</div>
					</div>
					<?php }else{ ?>
					<div class="row justify-content-center">
						<div class="col-md-6 text-center mb-5">
							<h2 class="heading-section">Login GGP Shop | Admin</h2>
						</div>
					</div>
					<?php } ?>
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-5">
							<div class="login-wrap p-4 p-md-5">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-user-o"></span>
								</div>
								<h3 class="text-center mb-4">Welcome</h3>
								<?php
								if($_GET['m_level']=='member'){
								?>
								<div class="w-full text-center p-t-55">
									<span class="txt2">
										Not a member?
									</span>

									<a href="register.php" class="txt2 bo1">
										Sign up now
									</a>
								</div>
								<?php } ?>
								<form action="#" class="login-form">
									<div class="form-group">
										<input type="text" name="m_user" class="form-control rounded-left" placeholder="Username" required>
									</div>
									<div class="form-group d-flex">
										<input type="password" name="m_pass" class="form-control rounded-left" placeholder="Password" required>
									</div>
									<div class="form-group d-md-flex">
										<div class="w-50">
											<label class="checkbox-wrap checkbox-primary">Remember Me
												<input type="checkbox" checked>
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="w-50 text-md-right">
											<a href="#">Forgot Password</a>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary rounded submit p-3 px-5">?????????????????????????????????</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
		<script src="login/js/jquery.min.js"></script>
		<script src="login/js/popper.js"></script>
		<script src="login/js/bootstrap.min.js"></script>
		<script src="login/js/main.js"></script>
	</body>
</html>
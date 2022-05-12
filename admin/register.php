<?php 
	session_start(); 
	include_once('condb.php');

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

    <form action="register_db.php" class="login-form" method="post">
			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center mb-5">
							<h2 class="heading-section">Create a account!</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-5">
							<div class="login-wrap p-4 p-md-5">
								
                                <?php include('errors.php'); ?>
                                <?php if(isset($_SESSION['error'])) : ?>
                                    <div class="error">
                                        <h3>
                                            <?php
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            ?>
                                        </h3>
                                    </div>
                                <?php endif ?>

                                <label for="username">Fullname</label>
									<div class="form-group">
										<input type="text" name="m_name" class="form-control rounded-left" placeholder="Your name" required>
									</div>
                                    <label for="username">Username</label>
									<div class="form-group">
										<input type="text" name="m_user" class="form-control rounded-left" placeholder="Username" required>
									</div>
                                    <label for="username">E-mail</label>
									<div class="form-group">
										<input type="text" name="m_email" class="form-control rounded-left" placeholder="Email" required>
									</div>
                                    <label for="username">Password</label>
									<div class="form-group d-flex">
										<input type="password" name="m_pass" class="form-control rounded-left" placeholder="Password" required>
									</div>
                                    <label for="username">Confirm Password</label>
									<div class="form-group d-flex">
										<input type="password" name="m_pass2" class="form-control rounded-left" placeholder="Confirm Password" required>
									</div>
									<!-- <div class="form-group d-md-flex">
										<div class="w-50">
											<label class="checkbox-wrap checkbox-primary">Remember Me
												<input type="checkbox" checked>
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="w-50 text-md-right">
											<a href="#">Forgot Password</a>
										</div>
									</div> -->
									<div class="form-group">
										<button type="submit" name="reg_user" class="btn btn-primary rounded submit p-3 px-5">สมัครสมาชิก</button>
									</div>
								
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
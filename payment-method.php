<?php 
session_start();
error_reporting(0);
include('config.php');
date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );

	if (isset($_POST['submit'])) {
		mysqli_query($conn,"UPDATE orders set 	payment_method='".$_POST['paymethod']."' where cus_id = '".$_SESSION['id']."' and payment_method is null ");
		$_SESSION['qnty'] = 0;
		unset($_SESSION['cart']);
		echo "<script>alert('Your Shop Success');</script>";
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";

	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<?php include_once('header.php');?>
		<!-- Meta -->
	</head>
    <body class="cnt-home">
	

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">-</a></li>
				<!-- <li class='active'>Payment Method</li> -->
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<h2>Choose Payment Method</h2>
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	         Select your Payment Method
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->



		<!-- panel-body  -->
	    <div class="cart-total mb-3">
					<h3>การชำระเงิน</h3>
					<form name="payment" method="post">
						<p>
						<input type="radio" name="paymethod" value="Wallet" checked="checked"> Wallet
						</p>
						<p>
						<input type="radio" name="paymethod" value="Internet Banking"> Internet Banking
						</p>
						<p>
						<input type="radio" name="paymethod" value="Debit / Credit card"> Debit / Credit card <br /><br />
						</p>
						<input type="submit" value="submit" name="submit" class="btn btn-primary">
					</form>		
					</div>
		<!-- panel-body  -->

</div>
<!-- checkout-step-01  -->
					  
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>

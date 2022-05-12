<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
  session_start();
  error_reporting(0);
  include('config.php');
  include_once('header.php');
  date_default_timezone_set('Asia/Bangkok');// change according timezone
  $currentTime = date( 'Y-m-d h:i:s A', time () );
    
  if(isset($_POST['order'])) 
{
	$faname = mysqli_real_escape_string($conn,$_POST['cus_faname']);
	$fname = $faname . mysqli_real_escape_string($conn,$_POST['cus_laname']);
	$country = mysqli_real_escape_string($conn,$_POST['country']);
	$add = $country . mysqli_real_escape_string($conn,$_POST['cus_add']);
	$sadd = $add . mysqli_real_escape_string($conn,$_POST['cus_sadd']);
	$address = $sadd . mysqli_real_escape_string($conn,$_POST['cus_dist']);
	$pincode = mysqli_real_escape_string($conn,$_POST['cus_pin']);
	$cont = mysqli_real_escape_string($conn,$_POST['cus_tel']);
	$email = mysqli_real_escape_string($conn,$_POST['cus_email']);
	$pay = mysqli_real_escape_string($conn,$_POST['paymethod']);
	

	$sql = "UPDATE orders SET
	fullname='$fname',
	shipping_address='$address',
	shipping_pincode='$pincode',
	contactno='$cont',
	email='$email',
	payment_method='$pay'
	
	WHERE cus_id = '".$_SESSION['id']."'
	";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

	if($_SESSION["id"] != null){
	$sql2 = "UPDATE tbl_member SET 
	m_email='$email',
	m_address='$address',
	m_pincode='$pincode',
	m_name='$fname',
	m_tel='$cont',
	date_update='$currentTime'
	WHERE member_id='".$_SESSION['id']."'
	 ";

	$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql " . mysqli_error());
	}

	$_SESSION['qnty'] = 0;
	unset($_SESSION['cart']);
	echo "<script>alert('Your Shop Success');</script>";
	echo "<script type='text/javascript'> document.location ='index.php'; </script>";
	}
 
 
 
 ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">ใบเสร็จ</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="#" class="billing-form">
							<h3 class="mb-4 billing-heading">ข้อมูลผู้ซื้อ</h3>

	
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">ชื่อ<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_faname" placeholder="" value="<?php echo $_SESSION["m_name"]; ?> ">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">นามสกุล<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_laname" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">ประเทศ<span style="color:red">*</span></label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="country" id="" class="form-control">
		                  	<option value="">France</option>
		                    <option value="">Italy</option>
		                    <option value="">Philippines</option>
		                    <option value="">South Korea</option>
		                    <option value="">Hongkong</option>
		                    <option value="">Japan</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">ที่อยู่<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_add" placeholder="House number and street name" value="<?php echo $_SESSION["m_address"]; ?>">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" name="cus_sadd" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">จังหวัด<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_dist" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">รหัสไปรษณีย์<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_pin" placeholder="" value="<?php echo $_SESSION["m_pincode"]; ?> ">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">เบอร์ติดต่อ<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_tel" placeholder="" value="<?php echo $_SESSION["m_tel"]; ?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">ที่อยู่อีเมล<span style="color:red">*</span></label>
	                  <input type="text" class="form-control" name="cus_email" placeholder="" value="<?php echo $_SESSION["m_email"]; ?>">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
                </div>
	            </div>
	         <!-- END -->



	          <div class="col col-lg-4 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>ราคาสุทธิ</h3>
    					<p class="d-flex">
    						<span>ยอดรวม</span>
    						<span><?php echo $_SESSION['stp'] ?> บาท</span>
    					</p>
    					<p class="d-flex">
    						<span>ธรรมเนียม</span>
    						<span><?php echo $_SESSION['sh'] ?> บาท</span>
    					</p>
    					<p class="d-flex">
    						<span>ส่วนลด</span>
    						<span><?php echo $_SESSION['dis']; ?> บาท</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>ราคาสุทธิ</span>
    						<span><?php echo $_SESSION['tp']; ?> บาท</span>
    					</p>
    				</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">การชำระเงิน</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="paymethod" class="mr-2" value="Wallet" checked="checked">Wallet</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="paymethod" class="mr-2" value="Bank">Bank</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="paymethod" class="mr-2" value="Paypal">Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label><Required>
											</div>
										</div>
									</div>
									<!-- <input type="submit" value="submit" name="submit" class="btn btn-primary"> -->
									<button type="submit" value="order" name="order" class="btn btn-primary py-3 px-4">สั่งออเดอร์</button>
								</div>
						</form>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
		

    <?php include_once('footer.php');?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>
<?php 
session_start();
error_reporting(0);
include('config.php');
date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s ', time () );
$_SESSION['dis'] = 0;


if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				$_SESSION['qnty'] = $_SESSION['qnty'] - $val;
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table



if(isset($_POST['ordersubmit'])) 
{
	$query=mysqli_query($conn,"SELECT Max(order_id) as moid FROM orders ");
        while($row=mysqli_fetch_array($query))
        {
			$order_id = $row['moid']+1;
        }
	$email = mysqli_real_escape_string($conn,$_POST['cus_email']);
	$address = mysqli_real_escape_string($conn,$_POST['cus_add']);
	$pincode = mysqli_real_escape_string($conn,$_POST['cus_pin']);
	$fname = mysqli_real_escape_string($conn,$_POST['cus_fname']);
	$status = 'Pending';
	$cont = $_POST['cus_cont'];
	$quantity = $_POST['quantity'];
	$pdd = $_SESSION['pid'];
	$value=array_combine($pdd,$quantity);
	foreach($value as $qty=>$val34){

	$sql = "INSERT INTO orders
	(
	cus_id,
	order_id,
	product_id,
	quantity,
	fullname,
	shipping_address,
	shipping_pincode,
	contactno,
	order_status,
	email
	)
	VALUES
	(
	'".$_SESSION['id']."',
	'$order_id',
	'$qty',
	'$val34',
	'$fname',
	'$address',
	'$pincode',
	'$cont',
	'$status',
	'$email'
	)";

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






	header('location:payment-method.php');
	}
}

if(isset($_POST['usecoupou'])) {

	$coupou = mysqli_real_escape_string($conn,$_POST['coupou']);
	$query=mysqli_query($conn,"SELECT * FROM code WHERE active = 'Yes' ");
        while($row=mysqli_fetch_array($query))
        {
			$_SESSION['dis'] = $row['cost'];
        }

}


// code for Shipping address updation
// 	if(isset($_POST['ship_update']))
// 	{
// 		$saddress=$_POST['shipping_address'];
// 		$sstate=$_POST['shipping_status'];
// 		$scity=$_POST['shipping_city'];
// 		$spincode=$_POST['shipping_pincode'];
// 		$query=mysqli_query($conn,"update users set shipping_address='$saddress',shipping_state='$sstate',shipping_city='$scity',shipping_pincode='$spincode' where id='".$_SESSION['id']."'");
// 		if($query)
// 		{
// echo "<script>alert('Shipping Address has been updated');</script>";
// 		}
// 	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include_once('header.php');?>
    <!-- END nav -->

	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">ตะกร้าของฉัน</h1>
          </div>
        </div>
      </div>
    </div>

	<form name="cart" method="post">
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Remove</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
							<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>

						    <tbody>

							<?php
								$pdtid=array();
									$sql = "SELECT * FROM products WHERE id IN(";
											foreach($_SESSION['cart'] as $id => $value){
											$sql .=$id. ",";
											}
											$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
											$query = mysqli_query($conn,$sql);
											$subtotal=0;
											$ship = 0;
											$totalprice=0;
											$totalqunty=0;
											if(!empty($query)){
											while($row = mysqli_fetch_array($query)){
												$quantity=$_SESSION['cart'][$row['id']]['quantity'];
												$subtotal += $_SESSION['cart'][$row['id']]['quantity']*($row['product_price']-$_SESSION['dis']);
												$totalprice = $subtotal + $row['shipping_charge'];
												$ship += $row['shipping_charge'];
												$_SESSION['qnty']=$totalqunty+=$quantity;

												array_push($pdtid,$row['id']);
								//print_r($_SESSION['pid'])=$pdtid;exit;
									?>


						      <tr class="text-center">
						        <!-- <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td> -->
								<td class="remove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
						        
						        <td class="image-prod"><div class="img" style="product_image/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['product_image']);?>" class="image-popup prod-img-bg"><img src="product_image/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['product_image']);?>" alt="" width="150" height="150"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo htmlentities($row['product_name']);?></h3>
						        	<!-- <p>Far far away, behind the word mountains, far from the countries</p> -->
						        </td>
						        
						        <td class="price"><?php echo htmlentities($row['product_price']-$_SESSION['dis']);?> บาท</td>
						        
						        <td class="cart-product-quantity">
								
									<div class="w-100"></div>
									<div class="input-group col-lg-10 d-flex mb-3 justify-content-center">
									<!-- <span class="input-group-btn mr-2">
										<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
										</button>
										</span> -->
									<input type="number" id="quantity" name="quantity[<?php echo $row['id']; ?>]" class="quantity form-control input-number" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" min="1" max="<?php echo $row['product_availability']; ?>">
									<!-- <span class="input-group-btn ml-2">
										<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="ion-ios-add"></i>
									</button>
									</span> -->
									
									
									
								</div>
		            			</td>
					<td class="total"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*($row['product_price']-$_SESSION['dis'])+$row['shipping_charge']); ?> บาท</td>
						      </tr><!-- END TR-->

							  <?php } }
								$_SESSION['pid']=$pdtid;
							?>

				
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			
    		<div class="row justify-content-start">
    			<div class="col col-lg-4 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
					<!-- <form method="post" name="detail" onsubmit="return validateForm()" action=""> -->
    					<h3>ข้อมูลผู้ซื้อ</h3>
						<div class="form-group">
							<label for="custom_address">Email<span style="color:red">*</span></label>
    						<input type="text" class="form-control rounded-left" name="cus_email"  placeholder="Enter your email" value="<?php echo $_SESSION["m_email"]; ?>">
					 	</div>
    					<div class="form-group">
							<label for="custom_address">Address<span style="color:red">*</span></label>
    						<input type="text" class="form-control rounded-left" name="cus_add"  placeholder="Enter your address" value="<?php echo $_SESSION["m_address"]; ?>">
					 	</div>
						 <div class="form-group">
							<label for="custom_pincode">Pincode<span style="color:red">*</span></label>
    						<input type="text" class="form-control rounded-left" name="cus_pin"  placeholder="Enter your pincode" value="<?php echo $_SESSION["m_pincode"]; ?> ">
					 	</div>
						 <div class="form-group">
							<label for="custom_fname">FullName<span style="color:red">*</span></label>
    						<input type="text" class="form-control rounded-left" name="cus_fname"  placeholder="Enter your name" value="<?php echo $_SESSION["m_name"]; ?> ">
					 	</div>
						 <div class="form-group">
							<label for="custom_cont">Contact<span style="color:red">*</span></label>
    						<input type="text" class="form-control rounded-left" name="cus_cont"  placeholder="Enter your contact number" value="<?php echo $_SESSION["m_tel"]; ?>">
					 	</div>
					<!-- </form> -->
    				</div>
    			</div>

				<div class="col col-lg-4 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
    				<h3>โค้ดส่วนลด</h3>
    					<div class="form-group">
							<label for="coupou">Coupou</label>
							<?php
							if($_SESSION['dis'] == null){ ?>
								<input type="text" class="form-control rounded-left" name="coupou"  placeholder="Enter your coupou">
								</br>
								<input type="submit" name="usecoupou" value="use" class="btn btn-upper btn-primary pull-right outer-right-xs">
							<?php }else
							{ ?>
								<input type="text" class="form-control rounded-left" name="coupou"  placeholder="Enter your coupou" disabled>
								</br>
								<input type="submit" name="usecoupou" value="use" class="btn btn-upper btn-primary pull-right outer-right-xs" disabled>
							<?php } ?>
    						
					 	</div>
				</div>
    				<div class="cart-total mb-3">
    					<h3>การจัดส่ง</h3>
						<form name="sendto" method="post">
							<p>
							<input type="radio" name="send" value="normal" checked="checked"> ปกติ
							</p>
							<p>
							<input type="radio" name="send" value="special"> EMS
							<br /><br />
							</p>
						</form>	
								
					</div>

				</div>

				



				<div class="col col-lg-4 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>ราคาสุทธิ</h3>
    					<p class="d-flex">
    						<span>ยอดรวม</span>
    						<span><?php echo $_SESSION['stp']="$subtotal"; ?> บาท</span>
    					</p>
    					<p class="d-flex">
    						<span>ธรรมเนียม</span>
    						<span><?php echo $_SESSION['sh']="$ship"; ?> บาท</span>
    					</p>
    					<p class="d-flex">
    						<span>ส่วนลด</span>
    						<span><?php echo $_SESSION['dis']; ?> บาท</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>ราคาสุทธิ</span>
    						<span><?php echo $_SESSION['tp']="$totalprice"; ?> บาท</span>
    					</p>
    				</div>
    				<!-- <p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p> -->
					
					<button type="submit" name="ordersubmit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
    			</div>

    		</div>
			</div>
		</section>
</form>		

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



  <!-- <script type="text/javascript">
  function validateForm() {
    var a = document.forms["detail"]["cus_email"].value;
    var b = document.forms["detail"]["cus_add"].value;
	var c = document.forms["detail"]["cus_pin"].value;
	var d = document.forms["detail"]["cus_fname"].value;
	var e = document.forms["detail"]["cus_cont"].value;
    if (!a || !b || !c || !d || !e) {
      alert("Please Fill All Required Fields");
      return false;
    }
  } -->
</script>
  <!-- <script>
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
	</script> -->

<!-- //////////////////////////////////////////////////////////////////// -->
<!-- <script>
$('input[name=\'quantity\']').on('change keyup click', function() {
  var price = $('.price').text().substr(1);
  var totalprice = $('.price').text().substr(0, 1);
  var quantity = $('.quantity').val();

  $('.total').text(totalprice + (price * quantity).toFixed(2));

});
</script> -->
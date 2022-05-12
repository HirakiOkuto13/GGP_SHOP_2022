<?php
// session_start();
error_reporting(0);
include("config.php");

if(isset($_POST['submit'])) 
{
	$track=$_POST['mytrack'];
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('header.php');?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Status</span></p>
            <h1 class="mb-0 bread">ติดตามสินค้าของคุณ</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">กรอกเบอร์โทรศัพท์</h2>
          </div>
          <form name="cart" method="post" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" name="mytrack" placeholder="Your number">
              </div>
              <button type="submit" name="submit" class="btn btn-primary py-3 px-4">ค้นหา</button>
            </form>
            <!-- <button type="submit" name="submit" class="btn btn-primary py-3 px-4">ค้นหา</button> -->
        </div>  
    </div> 		


    <?php
                    $query = "SELECT *,orders.id as oid,products.product_name as ppn,products.product_price as ppp,products.shipping_charge as ps ,orders.contactno as oc ,orders.email as oe FROM orders JOIN products ON products.id=orders.product_id WHERE orders.contactno = $track ORDER BY orders.order_date " or die("Error:" . mysqli_error());
					$result = mysqli_query($conn, $query); 
					echo ' <table id="example1" class="table table-bordered table-striped">';
					  echo "<thead>";
						echo "<tr class=''>
						  <th width='5%'  class='hidden-xs'>ID</th>
						  <th width='15%' class='hidden-xs'>ชื่อ</th>
						  <th width='20%' class='hidden-xs'>อีเมล/เบอร์ติดต่อ</th>
						  <th width='15%' class='hidden-xs'>ที่อยู่</th>
						  <th width='20%' class='hidden-xs'>สินค้า</th>
						  <th width='5%' class='hidden-xs'>จำนวน</th>
						  <th width='5%' class='hidden-xs'>ราคา</th>
                          <th width='5%' class='hidden-xs'>วันที่</th>
						  <th width='5%'>สถานะ</th>
						</tr>";
					  echo "</thead>";
					  while($row = mysqli_fetch_array($result)) {
					  echo "<tr>";
					  	$total = $row["quantity"]*$row["ppp"]+$row["ps"]; 
						echo "<td  class='hidden-xs'>" .$row["oid"] .  "</td> ";
						echo "<td  class='hidden-xs'>" .$row["fullname"] .  "</td> ";
						echo "<td> อีเมล: " .$row["email"] .
						"<br>ติดต่อ: <font color='blue'>".$row["contactno"] ."</font>".
						  "</td class='hidden-xs'> ";
						echo "<td  class='hidden-xs'>" .$row["shipping_address"]. "<br> ".$row["shipping_pincode"].  "</td> "; "</td> ";
						echo "<td  class='hidden-xs'>" .$row["ppn"] .  "</td> ";  
						echo "<td  class='hidden-xs'>" .$row["quantity"] .  "</td> ";  
						echo "<td  class='hidden-xs'>" .$total.  "</td> "; 
						echo "<td> วันที่ ".date('Y/m/d',strtotime($row["order_date"])). "</td> ";
                        echo "<td  class='hidden-xs'>" .$row["order_status"] .  "</td> "; 
						
					  }
					echo "</table>";
					mysqli_close($conn);
                  ?> 

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
    
  </body>
</html>
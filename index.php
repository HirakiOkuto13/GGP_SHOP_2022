<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($conn,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['product_price']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		header("Location:".$_SERVER[HTTP_REFERER]."?message=".$message);
}
else if(isset($_GET['action']) && $_GET['action']=="goto"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($conn,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['product_price']);
		}else{
			$message="Product ID is invalid";
		}
	}
	echo "<script>alert('Product has been added to the cart')</script>";
	echo "<script type='text/javascript'> document.location ='cart.php'; </script>";
}


if($_SESSION["id"] == null)
{
    $_SESSION["id"] = random_int(111111,999999);
}

date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include_once('header.php');?>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="dlc_image/prod_2.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#สินค้าใหม่แนะนำ</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">หูฟังไร้สาย SoundPeats TrueAir 2 True Wireless</h1>
				            <p class="mb-4">หูฟังที่เรียกได้ว่าได้รับความนิยมสูงมากๆ จากแบรนด์ SoundPeats อย่างหูฟังไร้สาย SoundPeats TrueAir 2 True Wireless มาคราวนี้พร้อมรูปร่างหน้าตาการออกแบบที่ดูเรียบหรู อัดแน่นไปด้วยฟังก์ชั่นแบบจัดเต็มในทุกด้าน ทั้งการเชื่อมต่อไร้สาย Bluetooth ใหม่ล่าสุดเวอร์ชัน 5.2 พร้อมด้วย Game Mode เล่นเกมและดูหนังออนไลน์ได้อย่างลื่นไหลไม่ดีเลย์ ไมโครโฟนรับเสียงได้ชัด แบตเตอรี่ที่อึดใช้งานได้ครบทุกความต้องการที่อยู่ได้ถึง 25 ชั่วโมง และแนวเสียงที่รับรองว่าดีแน่นอนตามสไตล์ของ SoundPeats ครับ กับราคาที่เบาสุดๆ พูดได้เลยว่าฟังก์ชั่นจัดเต็มแต่ราคาเป็นมิตรสุดๆ แบบนี้ เป็นอีกรุ่นที่พลาดไม่ได้จริงๆ</p>
				            
				            <p><a href="#" class="btn-custom">ดูสินค้าเลย</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="dlc_image/prod_6.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#สินค้าใหม่แนะนำ</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">เก้าอี้เกมมิ่ง Tengu Onimaru Gaming Chair</h1>
				            <p class="mb-4">Tengu Onimaru เป็นเก้าอี้เกมมิ่งสุดคุ้ม ดีไซน์โฉบเฉี่ยว ฟังก์ชันครบจบในตัวเดียว วัสดุเก้าอี้เป็นหนัง PU คุณภาพดี ทนทาน ทำความสะอาดง่าย จุดเด่นของเก้าอี้เล่นเกมรุ่นนี้คือมีระบบนวดแบบสั่นช่วยเพิ่มความผ่อนคลายขณะนั่งเล่นเกมนานๆ ได้ดี สามารถปรับเอนพนักพิงหลังได้ตั้งแต่ 90 - 135 องศา มีที่วางแขน หมอนรองคอ และหมอนรองหลัง ช่วยเพิ่มความสบายในการนั่ง</p>
				            
				            <p><a href="#" class="btn-custom">ดูสินค้าเลย</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-bag"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">รวดเร็วทันใจ</h3>
                <p>ด้วยการส่งสินค้าที่มีความรวดเร็วลูกค้าสามารถรับสินค้าที่สั่งได้ภายใน 3-7 วัน</p>
              </div>
            </div>      
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">บริการหลังการขายดีที่สุด</h3>
                <p>สามารถติดต่อสอบถามเกี่ยวกับสินค้าได้ตลอดเวลา</p>
              </div>
            </div>    
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-payment-security"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">การสั่งซื้อที่ปลอดภัย</h3>
                <p>มีระบบรักษาความปลอดภัยที่มีเสถียรภาพสูง ป้องกันการโจรกรรมข้อมูลที่เป็นเยี่ยม</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">สินค้าใหม่</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          </div>
        </div>   		
    	</div>
    	<div class="container">
			
    		<div class="row">

				<?php 
                $select_product = mysqli_query($conn, "SELECT products.*,category.category_name FROM products JOIN category ON category.id=products.category ORDER BY posting_date DESC LIMIT 4 ") or die('Query Failed');
                if(mysqli_num_rows($select_product) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="product-details.php?pid=<?php echo $fetch_product['id'];?>" class="img-prod"><img class="img-fluid" src="product_image/<?php echo $fetch_product['id']; ?>/<?php echo $fetch_product['product_image']; ?>" alt="">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span><?php echo $fetch_product['category_name'];?></span>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right mb-0">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<h3><a href="product-details.php?pid=<?php echo $fetch_product['id'];?>"><?php echo $fetch_product['product_name'];?></a></h3>
    						<div class="pricing">
	    						<p class="price"><span><?php echo $fetch_product['product_price'];?> บาท</span></p>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
    							<a href="index.php?page=product&action=add&id=<?php echo $fetch_product['id']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="index.php?page=product&action=goto&id=<?php echo $fetch_product['id']; ?>" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<?php
                        };
                    };
                ?>

    		</div>
    	</div>
    </section>

	<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">คีย์บอร์ด</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          </div>
        </div>   		
    	</div>
    	<div class="container">
			
    		<div class="row">

				<?php 
                $select_product = mysqli_query($conn, "SELECT products.*,category.category_name FROM products JOIN category ON category.id=products.category WHERE category = 2") or die('Query Failed');
                if(mysqli_num_rows($select_product) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="product-details.php?pid=<?php echo $fetch_product['id'];?>" class="img-prod"><img class="img-fluid" src="product_image/<?php echo $fetch_product['id']; ?>/<?php echo $fetch_product['product_image']; ?>" alt="">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span><?php echo $fetch_product['category_name'];?></span>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right mb-0">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<h3><a href="product-details.php?pid=<?php echo $fetch_product['id'];?>"><?php echo $fetch_product['product_name'];?></a></h3>
    						<div class="pricing">
	    						<p class="price"><span><?php echo $fetch_product['product_price'];?> บาท</span></p>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
								<a href="index.php?page=product&action=add&id=<?php echo $fetch_product['id']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="index.php?page=product&action=goto&id=<?php echo $fetch_product['id']; ?>" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<?php
                        };
                    };
                ?>

    		</div>
    	</div>
    </section>

	<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">เมาส์</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          </div>
        </div>   		
    	</div>
    	<div class="container">
			
    		<div class="row">

				<?php 
                $select_product = mysqli_query($conn, "SELECT products.*,category.category_name FROM products JOIN category ON category.id=products.category WHERE category = 3") or die('Query Failed');
                if(mysqli_num_rows($select_product) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="product-details.php?pid=<?php echo $fetch_product['id'];?>" class="img-prod"><img class="img-fluid" src="product_image/<?php echo $fetch_product['id']; ?>/<?php echo $fetch_product['product_image']; ?>" alt="">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span><?php echo $fetch_product['category_name'];?></span>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right mb-0">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<h3><a href="product-details.php?pid=<?php echo $fetch_product['id'];?>"><?php echo $fetch_product['product_name'];?></a></h3>
    						<div class="pricing">
	    						<p class="price"><span><?php echo $fetch_product['product_price'];?> บาท</span></p>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
								<a href="index.php?page=product&action=add&id=<?php echo $fetch_product['id']; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="index.php?page=product&action=goto&id=<?php echo $fetch_product['id']; ?>" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<?php
                        };
                    };
                ?>

    		</div>
    	</div>
    </section>


    <section class="ftco-section ftco-deal bg-primary">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<img src="dlc_image/hotdeal_1.png" class="img-fluid" alt="">
    			</div>
    			<div class="col-md-6">
    				<div class="heading-section heading-section-white">
    					<span class="subheading">Deal of the day</span>
	            <h2 class="mb-3">Deal of the day</h2>
	          </div>
    				<div id="timer" class="d-flex mb-4">
						  <!-- <div class="time" id="days"></div> -->
						  <div class="time pl-4" id="hours"></div>
						  <div class="time pl-4" id="minutes"></div>
						  <div class="time pl-4" id="seconds"></div>
						</div>
						<div class="text-deal">
							<h2><a href="#">จอคอม Gigabyte AORUS FI27Q 27" IPS 2K Monitor 165Hz</a></h2>
							<p class="price"><span class="mr-2 price-dc">฿17,900</span><span class="price-sale">฿16,900</span></p>
						</div>
    			</div>
    		</div>
    	</div>
    </section>

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
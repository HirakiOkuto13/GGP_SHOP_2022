<?php 
session_start();
error_reporting(0);
include('config.php');
$_SESSION['qnty'] = 0;

if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}

	$sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id";
			$query = mysqli_query($conn,$sql);
			$totalqunty = 0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity = $_SESSION['cart'][$row['id']]['quantity'];
				$_SESSION['qnty'] = $totalqunty+= $quantity;
			}
		}
		
?>
    <title>Gaming Gear Powerfull Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">


 

  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+66 77777 7777</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">gaminggearpowerfull@wu.ac.th.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-7 Business days delivery &amp; Free Returns</span>
					    </div>
						
						<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">GGP Shop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<?php include_once('search.php'); ?>
	        <li class="nav-item active"><a href="index.php" class="nav-link">หน้าหลัก</a></li>
	        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">หมวดหมู่</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
			  <?php $sql=mysqli_query($conn,"select id,category_name  from category ");
                    while($row=mysqli_fetch_array($sql))
                    {
                    ?>
              		<a class="dropdown-item" href="category.php?cid=<?php echo $row['id'];?>"> <?php echo $row['category_name'];?></a>
					<?php } ?>
              </div>
            </li>
	        <li class="nav-item"><a href="about.php" class="nav-link">เกี่ยวกับเรา</a></li>
	        <li class="nav-item"><a href="process.php" class="nav-link">สถานะสินค้า</a></li>
	        <li class="nav-item"><a href="contact.php" class="nav-link">ติดต่อเรา</a></li>

	        <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $_SESSION['qnty']; ?>]</a></li>
			<?php if(strlen($_SESSION['m_user'])==0)
					{   ?>
				<li class="nav-item cta cta-colored"><a href="admin/index.php?m_level=member" class="nav-link"><span class="icon-user"></span> เข้าสู่ระบบ</a></li>
				<?php }
				else{ ?>
				<li class="nav-item cta cta-colored"><a href="#" class="nav-link"><?php echo $_SESSION['m_user']?></a> 	
				<li class="nav-item cta cta-colored"><a href="admin/logout.php" class="nav-link" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">ออกจากระบบ</a>   
				<?php } ?>

	        </ul>
	      </div>
	    </div>
	  </nav>
				    </div>
			    </div>
		    </div>
		  </div>

    </div>



    
</body>
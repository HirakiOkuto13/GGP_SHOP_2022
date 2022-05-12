<?php 
	include('h.php');
	$oid = mysqli_real_escape_string($conn,$_GET['OID']);
?>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php include('menutop.php');?>
    <!-- Left side column. contains the logo and sidebar -->
    
        <?php include('menu_l.php');?>
      
    <div class="content-wrapper">
      <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-shopping-cart"></i> <span class="hidden-xs">Order #<?php echo $oid ?></span>
        </h1>
        
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                    <?php
                  
					$query = "
					SELECT orders.id as id,orders.fullname as of,orders.order_date as ood,orders.order_status as oos,orders.payment_method as opm,orders.email as oe,orders.contactno as oc,orders.shipping_address as osa,orders.shipping_pincode as osp,products.product_name as ppn,products.shipping_charge as psc,orders.quantity as qty,orders.order_date as ood,products.product_price as ppp
					FROM orders JOIN products ON products.id=orders.product_id
					WHERE orders.order_id = '$oid'
					ORDER BY id " or die("Error:" . mysqli_error());
					$result = mysqli_query($conn, $query);
					// echo $query;
					// exit();
					echo '<table id="example1" class="table table-bordered table-striped">';
					echo "<thead>";
						echo "<tr class=''>
						<th width='5%'  class='d-none d-xl-table-cell'>รายการ</th>
                        <th width='10%' class='d-none d-xl-table-cell'>ลูกค้า</th>
                        <th width='15%' class='d-none d-xl-table-cell'>อีเมล/เบอร์ติดต่อ</th>
                        <th width='10%' class='d-none d-xl-table-cell'>ที่อยู่</th>
                        <th width='20%' class='d-none d-xl-table-cell'>รายการสินค้า</th>
                        <th width='5%' class='d-none d-xl-table-cell'>ราคา</th>
						<th width='15%' class='d-none d-xl-table-cell'>การชำระเงิน</th>
                        <th width='5%' class='d-none d-xl-table-cell'>สถานะ</th>
                        <th width='5%' class='d-none d-xl-table-cell'>วันที่</th>
						</tr>";
					echo "</thead>";
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td  class='d-none d-xl-table-cell'>" .$row["id"] .  "</td> ";
                        echo "<td  class='d-none d-xl-table-cell'>" .$row["of"] .  "</td> ";
                        echo "<td> อีเมล: " .$row["oe"] .
                        "<br>ติดต่อ: <font color='blue'>".$row["oc"] ."</font>".
                        "</td class='d-none d-xl-table-cell'> ";
                        echo "<td  class='d-none d-xl-table-cell'>" .$row["osa"]. "<br> ".$row["osp"].  "</td> "; "</td> ";
                        echo "<td  class='d-none d-xl-table-cell'>" .$row["ppn"] .  "</td> ";  
                        echo "<td  class='d-none d-xl-table-cell'>" .$row["ppp"] .  "</td> "; 
						echo "<td  class='d-none d-xl-table-cell'>" .$row["opm"] .  "</td> "; 
                        echo "<td  class='d-none d-xl-table-cell'>" .$row["oos"] .  "</td> ";  
                        echo "<td> ".date('Y/m/d',strtotime($row["ood"])). "</td> ";
						"</td> ";
		
					} 
					echo "</table>";
					mysqli_close($conn);
					?>                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
  </html>
  <?php include('footerjs.php');?>
<?php 
include('h.php');
date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );
?>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php include('menutop.php');?>
        <?php include('menu_l.php');?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
        <i class="glyphicon glyphicon-check hidden-xs"></i> <span class="hidden-xs">การสั่งซื้อที่เสร็จแล้ว</span> 
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
					 $status='Delivered';

					$query = "SELECT *,orders.order_id as ooid, COUNT(orders.product_id) as coq,SUM(orders.quantity*products.product_price+products.shipping_charge) as qps FROM orders JOIN products ON products.id=orders.product_id WHERE orders.order_status ='$status' GROUP BY orders.order_id ORDER BY orders.order_date " or die("Error:" . mysqli_error());
                                            $result = mysqli_query($conn, $query); 
                                            echo ' <table id="example1" class="table table-bordered table-striped">';
                                            echo "<thead>";
                                                echo "<tr class=''>
                                                <th width='5%'  class='d-none d-xl-table-cell'>รายการ</th>
                                                <th width='10%' class='d-none d-xl-table-cell'>ลูกค้า</th>
                                                <th width='15%' class='d-none d-xl-table-cell'>อีเมล/เบอร์ติดต่อ</th>
                                                <th width='15%' class='d-none d-xl-table-cell'>ที่อยู่</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>สินค้า</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>สุทธิ</th>
												<th width='15%' class='d-none d-xl-table-cell'>การชำระเงิน</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>สถานะ</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>วันที่</th>
												<th width='9%' class='d-none d-xl-table-cell'>ดำเนินการ</th>
												
                                               
                                                </tr>";
                                            echo "</thead>";
                                            while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                // $total = $row["quantity"]*$row["ppp"]+$row["ps"]; 
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["ooid"] .  "</td> ";
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["fullname"] .  "</td> ";
                                                echo "<td> อีเมล: " .$row["email"] .
                                                "<br>ติดต่อ: <font color='blue'>".$row["contactno"] ."</font>".
                                                "</td class='d-none d-xl-table-cell'> ";
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["shipping_address"]. "<br> ".$row["shipping_pincode"].  "</td> "; "</td> ";
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["coq"] .  "</td> ";  
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["qps"] .  "</td> "; 
												echo "<td  class='d-none d-xl-table-cell'>" .$row["payment_method"] .  "</td> "; 
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["order_status"] .  "</td> ";  
                                                echo "<td> ".date('Y/m/d',strtotime($row["order_date"])). "</td> ";

												"</td> ";
													echo "<td><a href='updateorder.php?OID=$row[ooid]' class='btn btn-warning btn-xs' target='_blank'><span class='glyphicon glyphicon-edit'></span></a> 
													<a href='order_view.php?OID=$row[ooid]' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-eye-open'></span></a>        
												</td> ";
                                                
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

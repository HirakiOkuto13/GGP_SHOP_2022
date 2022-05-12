<?php
					 $status='Delivered';

                    $query = "SELECT *,orders.id as oid,products.product_name as ppn,products.product_price as ppp,products.shipping_charge as ps FROM orders JOIN products ON products.id=orders.product_id WHERE orders.order_status!='$status' or orders.order_status is null ORDER BY orders.order_date " or die("Error:" . mysqli_error());
					$result = mysqli_query($conn, $query);
					echo ' <table id="example1" class="table table-bordered table-striped">';
					  echo "<thead>";
						echo "<tr class=''>
						  <th width='5%'  class='hidden-xs'>ID</th>
						  <th width='15%' class='hidden-xs'>ชื่อ</th>
						  <th width='20%' class='hidden-xs'>อีเมล/เบอร์ติดต่อ</th>
						  <th width='20%' class='hidden-xs'>ที่อยู่</th>
						  <th width='20%' class='hidden-xs'>สินค้า</th>
						  <th width='3%' class='hidden-xs'>จำนวน</th>
						  <th width='5%' class='hidden-xs'>ราคา</th>
						  <th width='7%' class='hidden-xs'>วันที่</th>
						  <th width='5%'>-</th>
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
						echo "<td> วันที่ ".date('Y/m/d h:i:s',strtotime($row["order_date"])). "</td> ";
						
					  }
					echo "</table>";
					mysqli_close($conn);
                  ?>           
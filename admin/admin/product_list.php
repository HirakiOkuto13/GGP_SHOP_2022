<?php 
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=product.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=product.php" />';
  }

$query = "SELECT *,p.id FROM products as p
INNER JOIN category as t ON p.category = t.id
ORDER BY p.id DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='5%'  class='hidden-xs'>ID</th>
      <th width='15%' class='hidden-xs'>รูป</th>
       <th width='40%'>ชื่อสินค้า</th>
      <th>ราคาสินค้า</th>
      <th>วันที่</th>
      <th width='7%'>-</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td  class='hidden-xs'>" .$row["id"] .  "</td> ";
    echo "<td class='hidden-xs'>"."<img src='../../product_image/".$row['id']."/".$row['product_image']."' width='100%'>"."</td>";
    echo "<td> ชื่อ: " .$row["product_name"] .
    "<br>ประเภท: <font color='blue'>".$row["category_name"] ."</font>".
      "</td class='hidden-xs'> ";
    // echo "<td class='hidden-xs'>" .$row["product_description"] ."</td> ";
       echo "<td> ราคา " .$row["product_price"] ." บาท".    "<br>จำนวน ".$row["product_availability"]." ชิ้น".
      "</td> ";
      "</td> ";
      echo "<td>".date('Y/m/d',strtotime($row["posting_date"])).

      "</td> ";
        echo "<td><a href='product.php?act=edit&ID=$row[id]' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-edit'></span></a> 
        <a href='product_del_db.php?ID=$row[id]' onclick=\"return confirm('ยันยันการลบ')\" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></a>        
    </td> ";
    
  }
echo "</table>";
mysqli_close($conn);
?>
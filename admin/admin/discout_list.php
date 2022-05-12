<?php 
  if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=discout.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=discout.php" />';

  }else if(@$_GET['do']=='wrong'){
    echo '<script type="text/javascript">
          swal("", "รหัสผ่านใหม่ไม่ตรงกัน !!", "warning");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=discout.php" />';

  }else if(@$_GET['do']=='error'){
    echo '<script type="text/javascript">
          swal("", "ผิดพลาด !!", "error");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=discout.php" />';
  }

$query = "
SELECT * FROM code
ORDER BY id " or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
// echo $query;
// exit();
echo '<table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='5%'>#</th>
      <th width='15%' class='hidden-xs'>โค้ด</th>
      <th width='10%' class='hidden-xs'>ใช้งาน</th>
      <th width='10%'>หมวดหมู่ </th>
      <th width='10%'>สินค้า </th>
      <th width='10%'>ปริมาณ</th>
      <th width='15%'>ตั้งแต่</th>
      <th width='15%'>จนถึง</th>
      <th width='9%'></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$row["id"] .  "</td> ";
    echo "<td>" .$row["code"] .  "</td> ";
    echo "<td>" .$row["active"] .  "</td> ";
    echo "<td>" .$row["type_id"] .  "</td> ";
    echo "<td>" .$row["product_id"] .  "</td> ";
    echo "<td>" .$row["cost"] .  "</td> ";
    echo "<td>".date('Y/m/d',strtotime($row["start"]))."</td> ";
    echo "<td>".date('Y/m/d',strtotime($row["end"]))."</td> ";
    echo "<td><a href='discout.php?act=edit&ID=$row[id]' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-edit'></span></a> 
         <a href='code_del_db.php?ID=$row[id]' onclick=\"return confirm('ยันยันการลบ')\" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></a>  
    </td> ";
   
  } 
echo "</table>";
mysqli_close($conn);
?>
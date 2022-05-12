<?php 
  if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=help.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=help.php" />';

  }else if(@$_GET['do']=='wrong'){
    echo '<script type="text/javascript">
          swal("", "รหัสผ่านใหม่ไม่ตรงกัน !!", "warning");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=help.php" />';

  }else if(@$_GET['do']=='error'){
    echo '<script type="text/javascript">
          swal("", "ผิดพลาด !!", "error");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=help.php" />';
  }

$query = "
SELECT * FROM contact
ORDER BY id " or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
// echo $query;
// exit();
echo '<table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='5%'>#</th>
      <th width='15%' class='hidden-xs'>ชื่อ</th>
      <th width='10%' class='hidden-xs'>อีเมล</th>
      <th width='10%'>หัวข้อ</th>
      <th width='10%'>วันที่</th>
      <th width='10%'>ดำเนินการ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$row["id"] .  "</td> ";
    echo "<td>" .$row["name_help"] .  "</td> ";
    echo "<td>" .$row["email_help"] .  "</td> ";
    echo "<td>" .$row["sub_help"] .  "</td> ";
    echo "<td>".date('Y/m/d',strtotime($row["send_date"]))."</td> ";
    echo "<td><a href='help.php?act=view&ID=$row[id]' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-eye-open'></span></a> 
    </td> ";
   
  } 
echo "</table>";
mysqli_close($conn);
?>
<?php
// print_r($_GET);
// exit();
include('../condb.php');
$ID = mysqli_real_escape_string($conn,$_GET["ID"]);
$sql = "SELECT * FROM code WHERE id =$ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<form action="discout_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      โค้ด :
    </div>
    <div class="col-sm-3">
      <input type="text" name="code" required class="form-control" value = "<?php echo $row['code']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      การใช้งาน :
    </div>
    <div class="col-sm-2">
      <select name="active" class="form-control" required>
        <option value="<?php echo $row['active'];?>">
          <?php echo $row['active'];?>
        </option>
        <option value="">เลือก</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>    
      </select>
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-2 control-label">
      หมวดหมู่ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="type_id" required class="form-control" value = "<?php echo $row['type_id']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ผลิตภัณฑ์ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="product_id" required class="form-control" value = "<?php echo $row['product_id']?>">
    </div>
  </div>
 <div class="form-group">
    <div class="col-sm-2 control-label">
      จำนวน :
    </div>
    <div class="col-sm-3">
      <input type="text" name="cost" required class="form-control" value = "<?php echo $row['cost']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      เริ่มตั้งแต่ :
    </div>
    <div class="col-sm-3">
      <input type="date" name="start" required class="form-control" value = "<?php echo $row['start']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      สิ้นสุด :
    </div>
    <div class="col-sm-3">
      <input type="date" name="end" required class="form-control" value = "<?php echo $row['end']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sx-3">
      <input type="hidden" name ="c_id"  value = "<?php echo $ID;?>">
      <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
      <a href="discout.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>
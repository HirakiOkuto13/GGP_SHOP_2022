<?php 
$ID = mysqli_real_escape_string($conn,$_GET['ID']);
$sql = "SELECT * FROM category WHERE id=$ID";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
?>
<form action="type_form_edit_db.php" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-3">
      <input type="text" name="category_name" required class="form-control" value="<?php echo $row['category_name'];?>">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="id" value="<?php echo $ID; ?>" />
      <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
      <a href="type.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>

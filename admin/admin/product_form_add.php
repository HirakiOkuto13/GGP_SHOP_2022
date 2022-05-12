<?php
$query2 = "SELECT * FROM category ORDER BY id asc" or die("Error:" . mysqli_error());
$result2 = mysqli_query($conn, $query2);
?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php 
 if(@$_GET['do']=='f'){
            echo '<script type="text/javascript">
            swal("", "กรุณาใส่ข้อมูลให้ถูกต้อง !!", "warning");
            </script>';
            echo '<meta http-equiv="refresh" content="2;url=durable.php?act=add" />';
 }elseif(@$_GET['do']=='d'){
            echo '<script type="text/javascript">
            swal("", "เลขสินค้าซ้ำ กรุณาเปลี่ยน  !!", "error");
            </script>';
            echo '<meta http-equiv="refresh" content="1;url=durable.php?act=add" />';
 }
 ?>

<form action="product_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อสินค้า :
    </div>
    <div class="col-sm-3">
      <input type="text" name="product_name" required class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      แบรนด์ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="product_brand" required class="form-control">
    </div>
  </div>

   <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-3">
        <select name="category" class="form-control" required>
              <option value="">เลือกประเภทสินค้า</option>
              <?php foreach($result2 as $results){?>
              <option value="<?php echo $results["id"];?>">
                <?php echo $results["category_name"]; ?>
              </option>
              <?php } ?>
        </select>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-2 control-label">
      รายละเอียด :
    </div>
    <div class="col-sm-3">
    <textarea name="product_description" cols="60"></textarea>
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-2 control-label">
      ราคา :
    </div>
    <div class="col-sm-2">
      <input type="number" name="product_price" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ค่าธรรมเนียมสินค้า :
    </div>
    <div class="col-sm-2">
      <input type="number" name="product_charge" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      จำนวน :
    </div>
    <div class="col-sm-1">
      <input type="number" name="product_availability" required class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพสินค้า :
    </div>
    <div class="col-sm-4">
      <input type="file" name="product_image" required class="form-control" accept="image/*" onchange="readURL(this);"/>
      <img id="blah" src="#" alt="" width="250" class="img-rounded"/ style="margin-top: 10px;">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
      <a href="durable.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>
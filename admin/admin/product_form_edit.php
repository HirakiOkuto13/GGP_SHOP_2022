<?php 
$ID = mysqli_real_escape_string($conn,$_GET['ID']);
$sql = "SELECT *,p.id FROM products as p 
INNER JOIN category as t ON p.category = t.id
WHERE p.id=$ID
ORDER BY p.id DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);


$sql2 = "SELECT * FROM category
ORDER BY id DESC" or die("Error:" . mysqli_error());
$result_t = mysqli_query($conn, $sql2) or die ("Error in query: $sql " . mysqli_error());


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

<form action="product_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อสินค้า :
    </div>
    <div class="col-sm-3">
      <input type="text" name="product_name" required class="form-control" value="<?php echo $row['product_name'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      แบรนด์ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="product_brand" required class="form-control" value="<?php echo $row['brand'];?>">
    </div>
  </div>

   <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-3">
        <select name="category" class="form-control" required>
              <option value="<?php echo $row['category'];?>"><?php echo $row['category_name'];?></option>
              <option value="">เลือกประเภทสินค้า</option>
              <?php foreach($result_t as $results){?>
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
    <textarea name="product_description" cols="60"><?php echo $row['product_description'];?></textarea>
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-2 control-label">
      ราคา :
    </div>
    <div class="col-sm-2">
      <input type="number" name="product_price" required class="form-control" value="<?php echo $row['product_price'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      ค่าธรรมเนียมสินค้า :
    </div>
    <div class="col-sm-2">
      <input type="number" name="product_charge" required class="form-control" value="<?php echo $row['shipping_charge'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      จำนวน :
    </div>
    <div class="col-sm-1">
      <input type="number" name="product_availability" required class="form-control" value="<?php echo $row['product_availability'];?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพสินค้า :
    </div>
    <div class="col-sm-4">
      ภาพเก่า <br>
      <img src="../../product_image/<?php echo $row['id'];?>/<?php echo $row['product_image'];?>" width="200px">
      <br>
      <input type="file" name="product_image2" required class="form-control" accept="image/*" onchange="readURL(this);"/>
      <img id="blah" src="#" alt="" width="250" class="img-rounded" style="margin-top: 10px;">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
       <input type="hidden" name="product_image2" value="<?php echo $row['product_image'];?>">
      <input type="hidden" name="p_id" value="<?php echo $ID; ?>">
      <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
      <a href="durable.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>
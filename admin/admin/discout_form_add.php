
<form action="discout_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      โค้ด :
    </div>
    <div class="col-sm-3">
      <input type="text" name="code" required class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      การใช้งาน :
    </div>
    <div class="col-sm-2">
      <select name="active" class="form-control" required>
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
      <input type="text" name="type_id" required class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ผลิตภัณฑ์ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="product_id" required class="form-control">
    </div>
  </div>
 <div class="form-group">
    <div class="col-sm-2 control-label">
      จำนวน :
    </div>
    <div class="col-sm-3">
      <input type="text" name="cost" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      เริ่มตั้งแต่ :
    </div>
    <div class="col-sm-3">
      <input type="date" name="start" required class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      สิ้นสุด :
    </div>
    <div class="col-sm-3">
      <input type="date" name="end" required class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sx-3">
      <button type="submit" class="btn btn-success">เพิ่มคูปอง</button>
      <a href="discout.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>
<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$p_name = mysqli_real_escape_string($conn,$_POST["product_name"]);
	$type_id = mysqli_real_escape_string($conn,$_POST["category"]);
	$brand = mysqli_real_escape_string($conn,$_POST["product_brand"]);
	$p_detail = mysqli_real_escape_string($conn,$_POST["product_description"]);
	$p_price = mysqli_real_escape_string($conn,$_POST["product_price"]);
	$p_charge = mysqli_real_escape_string($conn,$_POST["product_charge"]);
	$p_qty = mysqli_real_escape_string($conn,$_POST["product_availability"]);
	$productimage=$_FILES["product_image"]["name"];


	$query=mysqli_query($conn,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	$productid=$result['pid']+1;
	$dir="../../product_image/$productid";
		if(!is_dir($dir)){
				mkdir("../../product_image/".$productid);
		}

		move_uploaded_file($_FILES["product_image"]["tmp_name"],"../../product_image/$productid/".$_FILES["product_image"]["name"]);


	// $date1 = date("Ymd_His");
	// $numrand = (mt_rand());
	// $p_img = (isset($_POST['product_image']) ? $_POST['product_image'] : '');
	// $upload=$_FILES['product_image']['name'];
	// if($upload !='') { 
	// 	$path="../../product_image/".$row['p_id']."/";
	// 	$type = strrchr($_FILES['product_image']['name'],".");
	// 	$newname =$numrand.$date1.$type;
	// 	$path_copy=$path.$newname;
	// 	$path_link="../../product_image/".$row['p_id']."/".$newname;
	// 	move_uploaded_file($_FILES['product_image']['tmp_name'],$path_copy); 
	// }

	$sql = "INSERT INTO products
	(
	product_name,
	category,
	brand,
	product_description,
	product_price,
	shipping_charge,
	product_availability,
	product_image
	)
	VALUES
	(
	'$p_name',
	'$type_id',
	'$brand',
	'$p_detail',
	'$p_price',
	'$p_charge',
	'$p_qty',
	'$productimage'
	)";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($conn);

	if($result){
	echo '<script>';
    echo "window.location='product.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='product.php?act=add&do=f';";
    echo '</script>';
}
?>
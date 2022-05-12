<?php
session_start();
date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );

echo '<meta charset="utf-8">';
include('../condb.php');

if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$p_id = mysqli_real_escape_string($conn,$_POST["p_id"]);
	$p_name = mysqli_real_escape_string($conn,$_POST["product_name"]);
	$type_id = mysqli_real_escape_string($conn,$_POST["category"]);
	$brand = mysqli_real_escape_string($conn,$_POST["product_brand"]);
	$p_detail = mysqli_real_escape_string($conn,$_POST["product_description"]);
	$p_price = mysqli_real_escape_string($conn,$_POST["product_price"]);
	$p_charge = mysqli_real_escape_string($conn,$_POST["product_charge"]);
	$p_qty = mysqli_real_escape_string($conn,$_POST["product_availability"]);
	$productimage2=$_FILES["product_image2"]["name"];

	move_uploaded_file($_FILES["product_image2"]["tmp_name"],"../../product_image/$p_id/".$_FILES["product_image2"]["name"]);

	$sql = "UPDATE products SET 
	product_name='$p_name',
	category='$type_id',
	brand='$brand',
	product_description='$p_detail',
	product_price='$p_price',
	shipping_charge='$p_charge',
	product_availability='$p_qty',
	product_image='$productimage2',
	update_date='$currentTime'
	WHERE id=$p_id
	 ";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($conn);
	
	if($result){
	echo '<script>';
    echo "window.location='product.php?do=finish';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='product.php?act=add&do=f';";
    echo '</script>';
}
?>
<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$c_id = mysqli_real_escape_string($conn,$_POST["c_id"]);
	$code = mysqli_real_escape_string($conn,$_POST["code"]);
	$active = mysqli_real_escape_string($conn,$_POST["active"]);
	$type_id = mysqli_real_escape_string($conn,$_POST["type_id"]);
	$product_id = mysqli_real_escape_string($conn,$_POST["product_id"]);
	$cost = mysqli_real_escape_string($conn,$_POST["cost"]);
	$start = mysqli_real_escape_string($conn,$_POST["start"]);
	$end = mysqli_real_escape_string($conn,$_POST["end"]);

	
	$sql = "UPDATE code SET 
	code='$code',
	active='$active',
	type_id='$type_id',
	product_id='$product_id',
	cost='$cost',
	start='$start',
	end='$end'
	WHERE id=$c_id
	 ";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($conn);
	
	if($result){
	echo '<script>';
    echo "window.location='discout.php?do=finish';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='discout.php?act=add&do=f';";
    echo '</script>';
}
?>  
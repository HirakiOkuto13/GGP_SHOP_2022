<?php
session_start();
date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );

echo '<meta charset="utf-8">';
include('../condb.php');
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$id = mysqli_real_escape_string($conn,$_POST['id']);
	$category_name = mysqli_real_escape_string($conn,$_POST["category_name"]);
	

	$sql = "UPDATE  category SET 
	category_name='$category_name',update_date='$currentTime'
	WHERE id=$id
	";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($conn);
	
	if($result){
	echo '<script>';
    echo "window.location='type.php?do=finish';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='type.php?act=add&do=f';";
    echo '</script>';
}
?>
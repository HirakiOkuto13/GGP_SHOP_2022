<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$ID  = mysqli_real_escape_string($conn,$_GET["ID"]);
	$sql = "DELETE FROM tbl_member WHERE member_id=$ID";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());	
	mysqli_close($conn);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'member.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'member.php'; ";
	echo "</script>";
}
?>
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
	$m_level = mysqli_real_escape_string($conn,$_POST["m_level"]);
	$m_user = mysqli_real_escape_string($conn,$_POST["m_user"]);
	$m_pass = mysqli_real_escape_string($conn,$_POST["m_pass"]);
	$m_name = mysqli_real_escape_string($conn,$_POST["m_name"]);
	$m_tel = mysqli_real_escape_string($conn,$_POST["m_tel"]);
	$m_email = mysqli_real_escape_string($conn,$_POST["m_email"]);
	$m_address = mysqli_real_escape_string($conn,$_POST["m_address"]);
	$m_pincode = mysqli_real_escape_string($conn,$_POST["m_pincode"]);

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
	$upload=$_FILES['m_img']['name'];
	if($upload !='') { 
		$path="../m_img/";
		$type = strrchr($_FILES['m_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../m_img/".$newname;
		move_uploaded_file($_FILES['m_img']['tmp_name'],$path_copy);  
	}

	$check = "
	SELECT m_user
	FROM tbl_member
	WHERE m_user = '$m_user'
	";
    $result1 = mysqli_query($conn, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
	      	  echo '<script>';
		      echo "window.location='member.php?act=add&do=d';";
		      echo '</script>';
    }else{

	$m_pass = md5($m_pass);
	$sql = "INSERT INTO tbl_member
	(
	m_level,
	m_user,
	m_pass,
	m_name,
	m_img,
	m_tel,
	m_email,
	m_address,
	m_pincode
	)
	VALUES
	(
	'$m_level',
	'$m_user',
	'$m_pass',
	'$m_name',
	'$newname',
	'$m_tel',
	'$m_email',
	'$m_address',
	'$m_pincode'
	)";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

	}
	mysqli_close($conn);

	if($result){
	echo '<script>';
    echo "window.location='member.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='member.php?act=add&do=f';";
    echo '</script>';
}
?>

<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$category_name = mysqli_real_escape_string($conn,$_POST["category_name"]);
	$check = "
	SELECT  category_name 
	FROM category  
	WHERE category_name = '$category_name' 
	";
    $result1 = mysqli_query($conn, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
     echo '<script>';
	 echo "window.location='type.php?act=add&do=d';";
	 echo '</script>';
    }else{
	
	$sql = "INSERT INTO category
	(category_name)
	VALUES
	('$category_name')";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

}
	mysqli_close($conn);
	if($result){
	echo '<script>';
    echo "window.location='type.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='type.php?act=add&do=f';";
    echo '</script>';
}
?>
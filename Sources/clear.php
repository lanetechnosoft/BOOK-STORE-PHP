<meta charset="utf-8">
<?php
session_start();
if(@$_GET['act']=='del'){
	$id = $_GET['id'];
	unset($_SESSION['bID'][$id]);
	unset($_SESSION['bName'][$id]);
	unset($_SESSION['bPrice'][$id]);
	unset($_SESSION['bitem'][$id]);
	echo "<script>";
	echo "window.location='cart.php';";
	echo "</script>";
} else {
	unset($_SESSION['bID']);
	unset($_SESSION['bName']);
	unset($_SESSION['bPrice']);
	unset($_SESSION['bitem']);
	
	echo "<script>";
	echo "window.location='cart.php';";
	echo "</script>";
}



	

 ?>
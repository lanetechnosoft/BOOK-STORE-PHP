<meta charset="utf-8">
<?php
$host ="localhost";
$user ="root";
$pwd ="11261992";
$db = "bookstoredb";

$conn = mysqli_connect($host,$user,$pwd,$db) or die ("เชื่อมต่อข้อมูลไม่ได้". mysqli_connect_error());
//mysql_query("use $db");
mysqli_query($conn,"set names utf8");

?>

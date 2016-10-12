<?php
session_start();
	if(@$_SESSION['UserID'] == "")
	{
		echo "<script>
		alert('Please Login!');
		window.location=('login.php');
		</script>";
		exit();
	}

	if($_SESSION['Status'] != "1")
	{


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อัพโหลดรูปปกใหม่</title>
</head>

<body>
<script>
function chk_pic(){
	var file=document.form1.Pic.value;
	var patt=/(.gif|.jpg|.png)/;
	var result=patt.test(file);
        if(!result){
          alert('รองรับเฉพาะไฟล์รูปภาพเท่านั้น (jpg,png,gif only)');
        }
	return result;
}
</script>

  <?php
include('config.php');
$sql="Select * from books where bID ='$_GET[id]'";
$result = mysqli_query($conn,$sql) ;
$data = mysqli_fetch_array($result);
?>
</p>
<p><img src="../img/<?=$data['bPic'];?>" width="321" height="377">
</p>
<form method="post" enctype="multipart/form-data" onSubmit="return chk_pic()" name="form1" id="form1">
  <p>
    <label for="fileField">Upload Photo :</label>
    <input type="file" name="Pic" id="fileField" accept="image/*">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="ตกลง">
  </p>
  <p>&nbsp;</p>
</form>
<script language="JavaScript">
<!--
function closewin() {
window.opener.location.reload();
self.close();
}
</script>
</body>
<?php
if(isset($_POST['submit'])){
	copy($_FILES['Pic']["tmp_name"],"../img/".$_FILES['Pic']["name"]);
	$pic = $_FILES['Pic']["name"];
	$sql2 ="update books set
	bPic = '$pic'
	where bID='$_GET[id]'";
	mysqli_query($conn,$sql2) or die("อัพเดทข้อมูลไม่ได้");

	echo "<script>
	 alert('อัพเดทหน้าปกเรียบร้อยแล้ว');
	 closewin();
	</script>";

}
mysqli_close($conn);
?>
</html>

<?php

		exit();
	}
?>

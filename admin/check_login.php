<?php
	session_start();

	include('config.php');

	$user = $_POST['user'];
	$pwd = md5($_POST['pwd']);
	$SQL = "SELECT * FROM members WHERE username = '$user' and password = '$pwd'";
	$Query = mysqli_query($conn,$SQL);
	$data = mysqli_fetch_array($Query);
	if($user==$data['username']&&$pwd==$data['password'])
	{
		@$_SESSION["UserID"] = $data["memberid"];
		@$_SESSION["Status"] = $data["status_id"];

		session_write_close();


				if($data["status_id"] == "1")

									{
											header("location:index.php");
									}
							else
									{
										 echo "<script>
			alert('สำหรับ admin เท่านั้น');
	window.location=('login.php');
	</script>";
											header("location:logout.php");
									}


	}
	else
	{
		echo "<script>
		alert('Username และ Password ไม่ถูกต้อง!');
		window.location=('login.php');
		</script>";

	}
	mysqli_close($conn);
?>

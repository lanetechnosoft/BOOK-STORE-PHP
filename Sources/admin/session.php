<?php
session_start();
	if(@$_SESSION['UserID'] == "")
	{
		echo "<script>
       
		window.location=('logout.php');
		</script>";
		
	}

	if(@$_SESSION['Status'] != "1")
	{
        echo "<script>
        alert('สำหรับ ADMIN เท่านั้น ฟวย!');
		window.location=('logout.php');
		</script>";
       
    }
?>
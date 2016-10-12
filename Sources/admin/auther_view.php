<?php
include('session.php')
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>

<body>

<form id="form1" name="form1" method="post">
  <table width="302" border="0" class="table table-hover">
    <tr>
      <td width="97">รหัสผู้แต่ง</td>
      <td width="189">ชื่อผู้แต่ง</td>
    </tr>
    <?php
	 include('config.php');
		$sql ="Select * from auther";
		$result = mysqli_query($conn,$sql);
		while ($data = mysqli_fetch_array($result))
		{
	?>
    <tr>
      <td><?=$data['authID']?></td>
      <td><?=$data['authName']?></td>
    </tr>
    <?php
		}
		mysqli_close($conn);
	?>
  </table>
</form>
</body>
</html>

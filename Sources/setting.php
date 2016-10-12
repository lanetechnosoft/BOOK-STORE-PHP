<?php
session_start();
include('config.php');

	if(@$_SESSION['mID'] == "")
	{
		echo "<script>
		window.location=('login.php');
		</script>";
		exit();
	}

	else
	{


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>B-BOOK | บัญชีผู้ใช้</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap/css/prettyPhoto.css" rel="stylesheet">
    <link href="bootstrap/css/price-range.css" rel="stylesheet">
    <link href="bootstrap/css/animate.css" rel="stylesheet">
	<link href="bootstrap/css/main.css" rel="stylesheet">
	<link href="bootstrap/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="bootstrap/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="bootstrap/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="bootstrap/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<div class="search_box pull-right">
							<form method="get" action="search.php">
                            <input type="text" name="kw" placeholder="Search"/>
                            </form>
						</div>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                <?php

									$Acc = "select * from members where memberID ='".$_SESSION['mID']."'";
									$Accquery = mysqli_query($conn,$Acc);
									$Accdata =mysqli_fetch_array($Accquery);

								?>
                                <li><a href="account.php"><i class="fa fa-user"></i> <?=$Accdata['Name'];?></a></li>
								<li><a href="payment.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	</header><!--/header-->



	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar"><br>
						<!--เมนูส่วนตัว-->


							<?php include('_accmenu.php');?>


					  <!--/brands_products-->
					</div>
				</div>

				<div class="col-sm-9 padding-right">
    				<p>
    				  <?php
					$sql="select * from members where memberID ='".$_SESSION['mID']."'";
					$rs=mysqli_query($conn,$sql);
					$data=mysqli_fetch_array($rs);


					?>

  				  </p>
                    <form class="form-inline" method="post" enctype="multipart/form-data" name="form1" id="form1">
    				<table class=" table table-striped"  width="300" border="0" cellspacing="2" cellpadding="2">
    				  <tbody>
    				    <tr>
                        <td rowspan="7" align="center" ><p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p><img src="img/pf/<?=$data['pfPic'];?>" width="200"  class="img-rounded"><br/>
                            <input type="file" name="picProfile" id="picProfile" accept="image/*" class="form-control" >
                          </p></td>
                        <td>ชื่อผู้ใช้</td>

    				      <td><input type="text" name="usr" value="<?=$data['username'];?>" class="form-control" <?php if($data['username'] != "") echo"readonly";?> >
                                </td>

  				        </tr>
    				    <tr>
    				      <td>ชื่อ - นามสกุล</td>

    				      <td><input type="text" name="mName" value="<?=$data['Name'];?>" class="form-control"></td>
  				        </tr>
                      <tr>
                        <td>ที่อยู่ในการจัดส่ง</td>

    				      <td><input name="addr" class="form-control" value="<?=$data['address'];?>"><br>
                              <input name="addr2" class="form-control" value="<?=$data['address2'];?>">
                            </td>
  				      </tr>
                      <tr>
                      <td>E-mail</td>

    				      <td><input type="text" name="email" value="<?=$data['email'];?>" class="form-control"></td>
  				      </tr>
                      <tr>
                        <td>New password</td>
                        <td height="40"><input type="password" name="newpassword" class="form-control"></td>
                        </tr>
                        <tr>
                        <td>old password</td>
                        <td height="40"><input name="oldpassword" type="password" required class="form-control"></td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td height="40"><input type="submit" name="submit" id="submit" value="อัพเดทข้อมูล" class="btn btn-success"></td>
                        </tr>

  				    </tbody>
  				  </table>
                    </form>
                    <?php

$Sql2 ="select * from members where memberid='".$_SESSION['mID']."'";
$result2 = mysqli_query($conn,$Sql2);
$data2  = mysqli_fetch_array($result2);
if(isset($_POST['submit'])){
$oldpassword = md5($_POST['oldpassword']);

/*ตรวจสอบว่ารหัสผ่านเดิมถูกต้องหรือไม่ก่อนดำเนินการต่อ*/
if($oldpassword==$data2['password'])
{
	/*ตรวจสอบว่าช่องรหัสผ่านใหม่ว่างหรือไม่*/
	if($_POST['newpassword']=="")
	{$newpassword = $data['password'];}
	else
	{$newpassword=md5($_POST['newpassword']);}
	/*ตรวจสอบว่าได้เลือกรูปโปรไฟล์ใหม่หรือไม่*/
	if($_FILES['picProfile']["name"]=="")
	{$pic=$data['pfPic'];}
	else
	{copy($_FILES['picProfile']["tmp_name"],"img/pf/".$_FILES['picProfile']["name"]);
	$pic = $_FILES['picProfile']["name"];}

	$name = $_POST['mName'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $addr2 = $_POST['addr2'];
    $user = $_POST['usr'];


	$sql3 ="Update members SET
	pfPic='$pic',
    username ='$user',
	password='$newpassword',
    email ='$email',
	Name ='$name',
    address = '$addr',
    address2 = '$addr2'
	where memberID='".$_SESSION['mID']."'
	";
	mysqli_query($conn,$sql3) or die(mysqli_error());
	echo"<script>
	alert('รหัสผ่านถูกต้อง');
	window.location='setting.php';
	</script>";
	}
	else
	{
		echo"<script>
	alert('รหัสผ่านผิด');
	window.location='setting.php';
	</script>";
	}
}
?>
    				<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</section>


	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 B-Book Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span>Themeum</span>& Modified by <span>Hypnox</span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.scrollUp.min.js"></script>
	<script src="bootstrap/js/price-range.js"></script>
    <script src="bootstrap/js/jquery.prettyPhoto.js"></script>
    <script src="bootstrap/js/main.js"></script>
	<?php
	}
	?>
</body>
</html>

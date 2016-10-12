<?php
session_start();


	if(@$_SESSION['mID'] == "")
	{
		echo "<script>
		window.location=('login.php');
		</script>";
		exit();
	}

	else
	{
		include('config.php');

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
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
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
    				<br>
					<form action="" method="post" enctype="multipart/form-data" name="form1" >
					<table width="100%" border="0" class="table table-responsive">
					<tr>
					<td>รหัสสั่งซื้อ</td>
					<td>
					<select name="OrderID" required>
					<?php
					$OrSql = "select * from orders ,status where orders.statusID='1' AND orders.memberid ='".$_SESSION['mID']."' AND orders.statusID = status.statusID ";
					$OrResult = mysqli_query($conn,$OrSql);

					while($OrData = mysqli_fetch_array($OrResult)){
					?>


					<option value="<?=$OrData['Orderid'];?>"><?=$OrData['invoice'];?> | <?=$OrData['statusName'];?> |<?=$OrData['TotalPrice']+$OrData['Tax'];?> บาท</option>
					<?php
					}

					?>
					</select>

					</td>
					</tr>
					<tr>
					<td>ช่องทางชำระเงิน</td>
					<td>
					<input type="radio" name="banks" value="1" id="1"> <img src="img/logo/bbl.gif" width="20"> <label for="1"> ธนาคารกรุงเทพ (xxx-x-xxxxx-x)</label> <br/>
					<input type="radio" name="banks" value="2" id="2"> <img src="img/logo/ktb.png" width="20"> <label for="2">  ธนาคารกรุงไทย :(xxx-x-xxxxx-x)</label> <br/>
					<input type="radio" name="banks" value="3" id="3"> <img src="img/logo/ks.gif" width="20">   <label for="3"> ธนาคารกสิกร : (xxx-x-xxxxx-x)</label></td>
					</tr>
					<tr>
					<td>
					จำนวนเงิน
					</td>
					<td>
					<input type="text" name="Money" required>
					</td>
					</tr>
					<tr>
					<td>
					วันที่โอน
					</td>
					<td>
					<input type="date" name="PaidDate">
					</td>
					</tr>
					<tr>
					<td>รูปสลิป</td>
					<td><input type="file" name="SlipPic" accept="image/*">
					</td>
					</tr>
					<tr><td>หมายเหตุ</td>
					<td><textArea name="comment"></TextArea>
					</td>
					</tr>
					<tr>
					<td></td>
					<td><input type="submit" name="submit" value="แจ้งการโอน" class="btn btn-success"></td>
					</tr>
                    </table>
                   </form>
                    <?php
					if(isset($_POST['submit'])){
					copy($_FILES['SlipPic']["tmp_name"],"img/slip/".$_FILES['SlipPic']["name"]);
					$pic = $_FILES['SlipPic']["name"];
					$sql= "insert into payment
					values('',
					'$_POST[OrderID]',
					'$_SESSION[mID]',
					'$_POST[banks]',
					'$_POST[Money]',
					'$pic',
					'$_POST[comment]',
					'$_POST[PaidDate]')";
					$result = mysqli_query($conn,$sql)or die("insert ไม่ได้");

					$sql2="Update orders set
					statusId = '2'
					where Orderid='$_POST[OrderID]'";
					$result =mysqli_query($conn,$sql2);

					echo "<script>
					alert('แจ้งการโอนเรียบร้อยแล้ว');
					window.location='payment.php';
					</script>";
					}
					?>
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

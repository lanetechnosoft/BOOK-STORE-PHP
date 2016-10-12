<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>B-BOOK | ผลการค้นหาสำหรับ <?=$_GET['kw']?></title>
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
							if(empty($_SESSION['mID'])){
								?>
                                <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="payment.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                                <?php
								}else{
									$Acc = "select * from members where memberID ='".$_SESSION['mID']."'";
									$Accquery = mysqli_query($conn,$Acc);
									$Accdata =mysqli_fetch_array($Accquery);

								?>
                                <li><a href="account.php"><i class="fa fa-user"></i> <?=$Accdata['Name'];?></a></li>
								<li><a href="payment.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                                <?php
								}
							?>

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

						<h2>CATEGORY</h2>
						<div class="brands_products"><!--brands_products-->
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                <!--เรียกหมวดหมุ่ขึ้นมาแสดงที่แถบด้านข้างพร้อมส่งค่าไปหน้าใหม่เพื่อเรียงฐานข้อมูลใหม่-->
									<?php
									$sql1="select * from category";
									$result1 = mysqli_query($conn,$sql1) or die("ต่อฐานข้อมูลไม่ได้");
									while($data1 = mysqli_fetch_array($result1))
									{
									?>
									<li><a href="category.php?c=<?=$data1['CatName']?>"> <span class="pull-right"></span><?=$data1['CatName'];?></a></li>
								<?php
									}
									?>

								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                    <br>
<?php
						 $kw = $_GET['kw'];
	$sql2="select * from books b,auther au,category cat where b.authID=au.authID
AND cat.CatID=b.CatID AND b.bName like '%$kw%'";
	$result2 = mysqli_query($conn,$sql2) or die("ต่อฐานข้อมูลไม่ได้");
	$numrows = mysqli_num_rows($result2);
	?>
						<h2 class="title text-center">ผลการค้นหาคำว่า :<?=$_GET['kw']?> พบ<?=$numrows?> รายการ</h2>

    <?php
	while($data2 = mysqli_fetch_array($result2))
	{
		?>
        <div>

<table border="0" width="100%">
  <tr>
    <td><a href="book.php?n=<?=$data2['bName']?>"><img src="img/<?=$data2['bPic'];?>" height="240" width="170"></a></td>
    <td>
							<!--/product-information-->
								<h4><?=iconv_substr($data2['bName'], 0,29, "UTF-8")?></h4>
								<p>ผู้เขียน: <?=$data2['authName'];?></p>
								<span>
									<span>฿<?=$data2['bPrice'];?></span>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										หยิบใส่ตระกร้า
									</button>
								</span>
                                <?php
                                if($data2['bCount'] !="")
								{
									$inSText ="มีสินค้า";
									}
									else{$inSText="สินค้าหมด";}
								?>
								<p><b>สถานะสินค้า:</b> <?=$inSText?></p>
								<p><b>พิมพ์ครั้งที่:</b> <?=$data2['bEdition'];?></p>

						</td>
  </tr>
</table>

</div>

<?php

}
?>

					</div><!--features_items-->
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
</body>
 <?php

							mysqli_close($conn);
						?>
</html>

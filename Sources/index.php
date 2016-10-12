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
    <title>B-BOOK | ร้านหนังสือออนไลน์ที่ไม่เคยหลับ</title>
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
    <link rel="icon" href="favicon.ico">
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

	<section id="slider"><!--slider-->
    <div style="background-color:#333">
		<div class="container">
			<div class="row"> <br/>
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<!----<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>

                            <li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
                            --->
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">

                                    <?php
                                    $proSQl = "select * from promotion ,books where promotion.bID=books.bID AND promotion.promoID='1'";
                                    $rs= mysqli_query($conn,$proSQl);
                                    $data = mysqli_fetch_array($rs);

                                    ?>

									<h1><?=$data['promoName'];?></h1>
                                    <h2><?=$data['bName'];?></h2>
									<p> <?=$data['promoDesc'];?></p>
									<button type="button" class="btn btn-default get" onClick="window.location='cart.php?id=<?=$data['bID'];?>'">Get it now</button></a>
								</div>
								<div class="col-sm-6">
									<img src="img/<?=$data['bPic'];?>" class="girl img-responsive" alt="" />
                                    <!--<img src="bootstrap/images/home/new.png" class="new" alt="" />
									<img src="bootstrap/images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>


						</div>
						<!--
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
                        -->
                        <br/>

					</div>

				</div>
			</div>
		</div>
        </div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
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
						<h2 class="title text-center">Best Seller</h2>
                         <?php
	$sql2="SELECT * FROM `books` ORDER BY `bCount` ASC LIMIT 6";
	$result2 = mysqli_query($conn,$sql2) or die("ต่อฐานข้อมูลไม่ได้");
	while($data2 = mysqli_fetch_array($result2))
	{

	?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="book.php?n=<?=$data2['bName']?>"><img src="img/<?=$data2["bPic"];?>"  height="375"alt=""/></a>
											<h2><?php echo $data2["bPrice"];?></h2>
											<p><?php echo iconv_substr($data2['bName'], 0,37, "UTF-8")?></p>
											<a href="cart.php?id=<?=$data2['bID'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								  </div>

								</div>
							</div>
						</div>
                        <?php
                        	}

						?>

					</div><!--features_items-->
                     <div class="recommended_items"><!--หนังสือมาใหม่-->
						<h2 class="title text-center">หนังสือมาใหม่</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php
                        $sql4 ="select * from books order by bID desc LIMIT 4";
						$result4 = mysqli_query($conn,$sql4);
						while($data4 = mysqli_fetch_array($result4))
						{
						?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="book.php?n=<?=$data4['bName']?>"><img src="img/<?=$data4['bPic']?>" alt=""  height="220"/></a>
													<h2><?=$data4['bPrice']?></h2>
													<p><?php echo iconv_substr($data4['bName'], 0,20, "UTF-8")?></p>
													<a href="cart.php?id=<?=$data4['bID'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
                                                <img src="bootstrap/images/home/new.png" class="new" alt="" />
											</div>
										</div>
									</div>
                        <?php
						}
						?>
								</div>

							</div>
						</div>
					</div><!--/recommended_items-->



                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">นวนิยายขายดี</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">

                            <?php
                            $catid= $data2['CatID'];
							$sql3="select * from books ,category where books.CatID=category.CatID and category.CatID='4' LIMIT 4";
							$result3 = mysqli_query($conn,$sql3) or die("ต่อฐานข้อมูลไม่ได้");
							while($data3 = mysqli_fetch_array($result3))
							{
							?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="img/<?=$data3['bPic'];?>" alt="" height="240" width="170"/>
                                                    <h2>฿<?=$data3['bPrice'];?></h2>
													<p><?=$data3['bName'];?></p>
													<button type="button" class="btn btn-default add-to-cart" onClick="window.location='cart.php?id=<?=$data3['bID'];?>'"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
                                                <!--<img src="bootstrap/images/home/sale.png" class="new" alt="" />-->
											</div>

										</div>
									</div>

                                <?php
									}
								?>
								</div>
							</div>

						</div>
					</div><!--/recommended_items-->


				</div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 B-Book Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span>Themeum</span> Modified by <span>Hypnox</span></p>
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
mysqli_close($conn);
?>
</body>
</html>

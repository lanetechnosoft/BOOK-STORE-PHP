<?php
session_start();
include('config.php');

date_default_timezone_set("Asia/Bangkok");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>B-BOOK | <?=$_GET['n']?></title>
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
                <?php
                $sql2="select * from books b,auther au,category cat,publisher pub where b.authID=au.authID
AND cat.CatID=b.CatID AND pub.pubID=b.pubID AND (b.bName = '$_GET[n]')";
				$result2=mysqli_query($conn,$sql2);
				$data2 =mysqli_fetch_array($result2);

				?><br>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-4">
							<div class="view-product"><br>
								<img src="img/<?=$data2['bPic'];?>" alt="" height="420"/>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="product-information"><!--/product-information-->
								<h1><?=$data2['bName'];?></h1>
								<p>ผู้เขียน: <?=$data2['authName'];?></p>
								<span>
									<span>฿<?=$data2['bPrice'];?></span>
								<label>จำนวน:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart" onClick="window.location='cart.php?id=<?=$data2['bID'];?>'">
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
								<p><b>สำนักพิมพ์:</b> <?=$data2['pubName'];?></p>
								<p><b>พิมพ์ครั้งที่:</b> <?=$data2['bEdition'];?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
                    			    <?php
                                    $sql5 ="select * from reviews where rbook ='".$data2['bID']."'";
									$result5 =mysqli_query($conn,$sql5);
									$num = mysqli_num_rows($result5);
									?>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">คำอธิบายหนังสือ</a></li>
								<li><a href="#companyprofile" data-toggle="tab">รายละเอียดหนังสือ</a></li>
								<li><a href="#reviews" data-toggle="tab">แสดงความคิดเห็น (<?=$num?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="details" >

								<div>
									<?=$data2['bDesc'];?>
								</div>

							</div>

							<div class="tab-pane fade" id="companyprofile" >

                                <div>
									<p><b>ISBN : </b> <?=$data2['ISBN'];?></p>
                                    <p><b>รูปแบบปก : </b> <?=$data2['bCover'];?></p>
                                    <p><b>จำนวนหน้า : </b> <?=$data2['bPage'];?></p>
									<p><b>รูปแบบกระดาษ : </b> <?=$data2['bPaper'];?></p>
								</div>
							</div>
							<div class="tab-pane fade in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?=date("H:i a");?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?=date("Y-M-d")?></a></li>
									</ul>

                                    <?php
									while($data5 = mysqli_fetch_array($result5))
									{

									?>
									<p><?=$data5['rComment']?></p>
									<p><b><?=$data5['rName']?></b></p>
                                    <hr/>
                                    <?php
                                    }
									?>

									<form method="post" action="">
										<span>
								<?php
							if(empty($_SESSION['mID'])){
								?>
											<input type="text" name="rname" placeholder="Your Name" required//>
											<input type="email" name="rmail" placeholder="Email Address" required/>
								<?php
								}else{
									$Acc = "select * from members where memberID ='".$_SESSION['mID']."'";
									$Accquery = mysqli_query($conn,$Acc);
									$Accdata =mysqli_fetch_array($Accquery);

								?>
											<input type="text" name="rname" value="<?=$Accdata['Name']?>" />
											<input type="email" name="rmail" value="<?=$Accdata['email']?>" />
								<?php
								}
								?>

										</span>
										<textarea name="comment" ></textarea>
										<button type="submit" name="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
                                    <?php


                                    if(isset($_POST['submit'])){
									$rmail = $_POST['rmail'];
									$rname = $_POST['rname'];
									$rcomment = $_POST['comment'];
									$rbook = $data2['bID'];

									$datenow = date('Y-m-d H:i:s');
									$sql4 ="insert into reviews values('','$rname','$rmail','$rcomment','$rbook','$datenow')";
									$result4 = mysqli_query($conn,$sql4);
									echo"<script>
									alert('แสดงความเห็นเรียบร้อย');
									window.location='book.php?n=".$_GET['n']."';
									</script>";
									}

									?>
								</div>
							</div>

						</div>
					</div><!--/category-tab-->



					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">คุณอาจจะชอบหนังสือเหล่านี้ด้วย</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">

                            <?php
                            $catid= $data2['CatID'];
							$sql3="select * from books ,category where books.CatID=category.CatID and category.CatID='".$catid."' LIMIT 4";
							$result3 = mysqli_query($conn,$sql3) or die("ต่อฐานข้อมูลไม่ได้");
							while($data3 = mysqli_fetch_array($result3))
							{
							?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="book.php?n=<?=$data3['bName']?>"><img src="img/<?=$data3['bPic'];?>" alt="" height="240" width="170"/></a>
													<h2>฿<?=$data3['bPrice'];?></h2>
													<p><?=$data3['bName'];?></p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
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
</html>

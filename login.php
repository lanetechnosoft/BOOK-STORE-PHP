<?php
include('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>B-BOOK | เข้าสู่ระบบ</title>
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

                                <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	</header><!--/header-->

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form name="form1" method="post" action="">
							<input type="email" name="email"placeholder="Email Address" />
							<input type="password" name="pwd" placeholder="Name" />
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<button type="submit" name="sLogin" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<?php

		if(isset($_POST['sLogin'])){
		$email = $_POST['email'];
		$pwd = md5($_POST['pwd']);
		$sql ="select * from members where email = '$email' AND password ='$pwd'";
		$result =mysqli_query($conn,$sql);
		$data =mysqli_fetch_array($result);
		if($email==$data['email']&&$pwd==$data['password']){

		$_SESSION['mID']=$data['memberid'];
		$_SESSION['uSer']=$data['username'];
		echo"<script>
			window.location='account.php';
			</script>";
		}else
		{
			echo"<script>
			alert('email หรือ password ไม่ถูกต้อง');
			window.location='index.php';
			</script>";
			}
		}
				?>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form name="form2"action="" method="post">
							<input type="text" name="txtName" placeholder="Name" required="" />
							<input type="email" name="txtEmail" placeholder="Email Address" required="" />
							<input type="password" name="txtPwd" placeholder="Password" required="" />
							<button type="submit" name="SignUp" class="btn btn-default">Signup</button>
						</form>
					</div>
                    <!--/sign up form-->
				</div>
			</div>
		</div>

		<!--ตรวจสอบว่ากดปุ่มสมัครหรือกดปุ่มล็อกอินแล้วค่อยทำงาน-->
        <?php
		if(isset($_POST['SignUp'])){
			$spass =MD5($_POST['txtPwd']);
			$sname=$_POST['txtName'];
			$smail=$_POST['txtEmail'];
			$datenow = date('Y-m-d H:i:s');
			$sql2 ="insert into members values('','','$spass','$smail','','2','$sname','','','',CURRENT_TIMESTAMP)";
			$result2 =mysqli_query($conn,$sql2);

		$sql3 ="select * from members where email = '$smail' AND password ='$spass'";
		$result3 =mysqli_query($conn,$sql3);
		$data3 =mysqli_fetch_array($result3);
		if($smail==$data3['email']&&$spass==$data3['password']){

		$_SESSION['mID']=$data3['memberid'];
		$_SESSION['uSer']=$data3['username'];
			echo"<script>
			alert('ยินดีต้อนรับเข้าสู่เว็บไซต์');
			window.location='index.php';
			</script>";
		}
		}
		?>



	</section>
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

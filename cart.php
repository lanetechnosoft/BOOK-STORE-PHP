<?php
session_start(); //ที่ทำเป็นsession เพระาต้องการให้สินค้าหรือข้อมูลอยู่เหทมือนเดิม
if(@$_SESSION['mID'] == "")
	{
		echo "<script>
		window.location=('login.php');
		</script>";
		exit();
	}

	else
	{
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>B-BOOK | ตะกร้าสินค้า</title>
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
									$Accdata = mysqli_fetch_array($Accquery);
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
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">ตะกร้าสินค้า</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table width="100%" class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td width="23%" class="image">ปก</td>
							<td width="39%" class="description">รายการ</td>
							<td width="11%" class="price">ราคา/หน่วย</td>
							<td width="6%" class="quantity">จำนวน</td>
                            <td width="11%" class="quantity">ราคารวม</td>
							<td width="10%"></td>
						</tr>
					</thead>
					<tbody>

					<?php
					if(isset($_GET['id'])){


$cartsql = "select * from books where bID='$_GET[id]'";
$cartresult = mysqli_query($conn,$cartsql);
$cartdata = mysqli_fetch_array($cartresult);


$i=$_GET['id'];
$_SESSION['bID'][$i] = $cartdata['bID'];
$_SESSION['bName'][$i] = $cartdata['bName'];
$_SESSION['bPrice'][$i] = $cartdata['bPrice'];
$_SESSION['bPic'][$i] = $cartdata['bPic'];

if(in_array($i,$_SESSION['bID'])){
	@$_SESSION['bitem'][$i] ++;
} else {
$_SESSION['bitem'][$i] = 1;
}

}
if (isset($_SESSION['bID'])){
	$y = 0;
	$total=0;
	foreach($_SESSION['bID'] as $x) {
		$y++;
		$total += $_SESSION['bPrice'][$x]*$_SESSION['bitem'][$x];
		//$total = array_sum($total2);
?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="img/<?=$_SESSION['bPic'][$x]?>" width="110" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$_SESSION['bName'][$x];?></a></h4>
								<p>รหัสหนังสือ: <?=$_SESSION['bID'][$x]?></p>
							</td>
							<td class="cart_price">
								<p>฿<?=$_SESSION['bPrice'][$x]?></p>
							</td>
							<td class="cart_quantity">
						<input name="quantity" type="text" class="cart_quantity_input" autocomplete="off" value="<?=$_SESSION['bitem'][$x];?>" size="2" readonly>
							</td>
                            <td class="cart_total">
								<p class="cart_total_price"><?php
								$price = $_SESSION['bPrice'][$x];
                                $item = $_SESSION['bitem'][$x];
								$totalprice =0;
								$totalprice =  $price * $item;
								echo $totalprice;
								?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="clear.php?id=<?=$x?>&act=del"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php
}}

?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 pull-right">
					<div class="total_area pull-right" >
						<ul>
							<li>Cart Sub Total <span>฿<?=@number_format($total,0);?></span></li>
							<li>Eco Tax <span>฿<?php
							@$tax = $total *7/100;
                            @$nettotal = $total + $tax;
							echo $tax;
							?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>฿<?=@number_format($nettotal,0); ?></span></li>
						</ul>
							<a class="btn btn-default update" href="index.php">เลือกหนังสือเพิ่ม<a/>
							<a class="btn btn-default update" href="clear.php">ล้างตระกร้า</a>
							<a class="btn btn-default check_out" href="cart.php?act=confirm">บันทึกการสั่งซื้อ</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php
if(@$_GET['act'] == "confirm"){
	include("config.php");
    
    
	$status = 1; //ตรงนี้จะอัพเดทผ่านหลังร้าน
	$shippingMethod = 0; //ส่วนนี้เอาไว้เพิ่มเป็นตัวเลือกช่องทางการส่งสินค้า ซึ่งจะมีเรทการคิดค่าส่งไปด้วย ตอนนี้ยังฟรีอยู่
    
   
	$sql2="insert into orders values('','".$_SESSION['mID']."','',$tax,$nettotal,$status,$shippingMethod,CURRENT_TIMESTAMP )";
	mysqli_query($conn,$sql2)or die (mysqli_error($conn));
    $oid = mysqli_insert_id($conn);

	foreach($_SESSION['bID'] as $z) {
		$sql3 = "insert into order_detail values('','$oid','".$_SESSION['bID'][$z]."','".$_SESSION['bitem'][$z]."','".$_SESSION['bPrice'][$z]."')";
		mysqli_query($conn,$sql3) or die ("insert order_detail ไม่ได้");
	}
    $invsql = "update orders set invoice = '".INV."0$oid".$_SESSION['mID']."' where Orderid = $oid";
    mysqli_query($conn,$invsql)or die(mysqli_error($conn));
    
	echo "<script>
alert('บันทึกคำสั่งซื้อเรียบร้อย');
window.location='clear.php';
</script>";
}



?>



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

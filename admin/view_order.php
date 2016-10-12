<?php
include('session.php');
		include('config.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>. : B-Book Panel | ระบบบริหารจัดการหลังร้านขายหนังสือออนไลน์:.</title>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../bootstrap/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <link href="../bootstrap/css/style-responsive.css" rel="stylesheet">

    <script src="../bootstrap/js/chart-master/Chart.js"></script>
</head>

<body>
<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>B-Book Store</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
	  <!--Side BarInclude -->
      <?php include('_sidebar.php');?>
       <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
		  <h3> <a href="orders.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> กลับ</a>คำสั่งซื้อหมายเลข <?=$_GET['id']?></h3>
			<!--สิ้นสุดส่วนหัวของหน้าแรก-->

			<div class="col-lg-12">

					<table class="table table-striped">
					<tr>
					<th>ปก</th>
					<th>รหัสหนังสือ</th>
					<th>รายการ</th>
					<th>ราคาต่อเล่ม</th>
					<th>จำนวน</th>
					<th>ราคารวม</th>
					</tr>
					<?php
					$sqlOrder = "SELECT * FROM orders , order_detail , books
					WHERE orders.Orderid = '$_GET[id]'
					AND orders.Orderid=order_detail.Orderid
					AND books.bID = order_detail.bID";
					$resultOrder = mysqli_query($conn,$sqlOrder);
					while($dataOrder= mysqli_fetch_array($resultOrder)){
					@$total = $dataOrder['Qty'] * $dataOrder['bPrice'];
					@$TotalPrice = $TotalPrice + $total;
					?>

					<tr>
					<td><img src="../img/<?=$dataOrder['bPic']?>" width="100"></td>
					<td><?=$dataOrder['bID']?></td>
					<td><?=$dataOrder['bName']?></td>
					<td><?=$dataOrder['bPrice']?></td>
					<td><?=$dataOrder['Qty']?></td>
					<td><?=$total?></td>
					</tr>
					<?php
					}
					$Tax = $TotalPrice * 7 /100;
					$NetTotalPrice = $TotalPrice + $Tax;
					mysqli_close($conn);
					?>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>ราคารวม</td>
					<td><?=$TotalPrice?> บาท</td>
					</tr>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>ถาษี</td>
					<td><?=$Tax?> บาท</td>
					</tr>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>ค่าจัดส่ง</td>
					<td>Free</td>
					</tr>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>ราคาสุทธิ</td>
					<td><?=number_format($NetTotalPrice,0)?> บาท</td>
					</tr>
				</table>
			</div>
			</div>


		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="book_list.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>


          <!-- js placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../bootstrap/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../bootstrap/js/jquery.scrollTo.min.js"></script>
    <script src="../bootstrap/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../bootstrap/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../bootstrap/js/common-scripts.js"></script>

    <script type="text/javascript" src="../bootstrap/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../bootstrap/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../bootstrap/js/sparkline-chart.js"></script>
	<script src="../bootstrap/js/zabuto_calendar.js"></script>


	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: '../bootstrap/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>


	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
</body>
</html>

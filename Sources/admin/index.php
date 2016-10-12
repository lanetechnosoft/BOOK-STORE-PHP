<?php
include('session.php')

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

		  <!----ส่วนหัวของหน้าแรก -->

          	<div class="row">
          		<div class="col-lg-12 main-chart">
          		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_shop"></span>

                                <?php
                    // ดึงข้อมูลคำสั่งซื้อที่มีสถานะเป็น รอการตรวจสอบ
                    $sql1 ="select * from orders where statusID='2'";
                    $rs1 = mysqli_query($conn,$sql1);
                    $data1 = mysqli_num_rows($rs1);
                    ?>
					  			<h3><?=$data1?></h3>
                  			</div>
                    		<p>มีคำสั่งซื้อใหม่ <?=$data1?> รายการ</p>
                  		</div>
				<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_truck"></span>

					  			<?php
                    // ดึงข้อมูลคำสั่งซื้อที่มีสถานะเป็น กำลังจัดส่ง
                    $sql2 ="select * from orders where statusID='4'";
                    $rs2 = mysqli_query($conn,$sql2);
                    $data2 = mysqli_num_rows($rs2);
                    ?>
					  			<h3><?=$data2?></h3>
                    </div>
					  			<p>อยู่ระหว่างการจัดส่ง <?=$data2?> รายการ</p>
                  		</div>

				<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_stack"></span>
                                <?php
                    // ดึงข้อมูลคำสั่งซื้อ ทั้งหมด
                     $sql3 ="select * from orders";
                    $rs3 = mysqli_query($conn,$sql3);
                    $data3 = mysqli_num_rows($rs3);
                    ?>
					  			<h3><?=$data3?></h3>
                  			</div>

					  			<p>คำสั่งทั้งหมด <?=$data3?> รายการ</p>
                  		</div>
				<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
                                <?php
                    // ดึงข้อมูลรายชื่อสมาชิกทั้งหมด
                    $sql4 ="select * from orders";
                    $rs4 = mysqli_query($conn,$sql3);
                    $data4 = mysqli_num_rows($rs3);
                    ?>
					  			<h3><?=$data4?></h3>
                  			</div>

					  			<p>สมาชิกทั้งหมด <?=$data4?> คน</p>
                  		</div>
          		</div>

			<!--สิ้นสุดส่วนหัวของหน้าแรก-->

			<div class="col-lg-12">
                <h3><li class="glyphicon glyphicon-list"> รายการออเดอร์ล่าสุด</li></h3>
					<table width="100%" class="table table-striped">
					<tr>
						<th>เลขที่สั่งซื้อ</th>
						<th>วันที่สั่ง</th>
						<th>ผู้สั่ง</th>
						<th>สถานะ</th>
						<th>จัดการ</th>
					</tr>
					<?php
					$OrSql = "SELECT * FROM orders,members , status where orders.statusID='2' AND orders.statusID = status.statusID AND orders.memberid =members.memberid order by orderID DESC";
					$OrResult = mysqli_query($conn,$OrSql)or die(mysqli_error($conn));
					While($OrData = mysqli_fetch_array($OrResult)){
					?>
					<tr>
						<td><?=$OrData['invoice'];?></td>
						<td><?=$OrData['OrderDate'];?></td>
						<td><?=$OrData['Name']?></td>
						<td><?=$OrData['statusName'];?></td>
						<td><a href="paidview.php?id=<?=$OrData['Orderid'];?>" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a></td>
					</tr>
					<?php
					}
					mysqli_close($conn);
					?>
				</table>
                <h3><li class="glyphicon glyphicon-user"> สมาชิกล่าสุด</li></h3>
                <table width="100%" border="0" class="table table-striped">
          		    <tr>
          		      <th>#</th>
          		      <th>Name</th>
          		      <th>Email</th>
          		      <th>วันที่สมัคร</th>
       		        </tr>
                    <?php
                    include('config.php');
					$sql="select * from members order by memberID DESC Limit 10";
					$result = mysqli_query($conn,$sql);
					while($data = mysqli_fetch_array($result))
					{
					?>
          		    <tr>
          		      <td height="25"><?=$data['memberid'];?></td>
          		      <td><?=$data['Name'];?></td>
          		      <td><?=$data['email'];?></td>
          		      <td><?=$data['reg_date'];?></td>
   		          </tr>
                    <?php
					}
					?>
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

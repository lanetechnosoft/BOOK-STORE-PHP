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

              <form name="form1" class="form-inline" action="" method="post">
                  <h3><li class="glyphicon glyphicon-list"> รายการสั่งซื้อทั้งหมด </li></h3>
              <select name="statusType" class="form-control">

                  <?php
                    $SSql = "select * from status";
                    $SResult = mysqli_query($conn,$SSql) or die(mysqli_error());
                    while($xData = mysqli_fetch_array($SResult)){

                  ?>
                <option value="<?=$xData['statusID'];?>"><?=$xData['statusName'];?></option>
                  <?php
                    }

                  ?>
                </select>
                  <input type="submit" class="btn btn-success" name="submit" value="กรอง">
              </form>

			<!--สิ้นสุดส่วนหัวของหน้าแรก-->

			<div class="col-lg-12">

					<table width="100%" class="table table-striped">
					<tr>
						<th>เลขที่สั่งซื้อ</th>
						<th>วันที่สั่ง</th>
						<th>ผู้สั่ง</th>
						<th>สถานะ</th>
						<th>จัดการ</th>
					</tr>
					<?php
                   if(isset($_POST['submit'])){
                    @$statusF = $_POST['statusType'];
                    $OrSql = "SELECT * FROM orders,members ,status
                    where orders.statusID = status.statusID
                    AND orders.memberid =members.memberid
                    AND status.statusID='$statusF'
                    ";
					$OrResult = mysqli_query($conn,$OrSql)or die(mysqli_error());
					While($OrData = mysqli_fetch_array($OrResult)){
					?>
					<tr>
						<td><?=$OrData['Orderid'];?></td>
						<td><?=$OrData['OrderDate'];?></td>
						<td><?=$OrData['Name']?></td>
                        <td><a href="paidview.php?id=<?=$OrData['Orderid'];?>"><?=$OrData['statusName'];?></a></td>
						<td>
                        <a href="view_order.php?id=<?=$OrData['Orderid'];?>"class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="paidview.php?id=<?=$OrData['Orderid'];?>"class="btn btn-danger"><span class="glyphicon glyphicon-refresh"></span></a>
                        <a href="notice.php?mail=order&id=<?=$OrData['Orderid'];?>"class="btn btn-danger"><span class="glyphicon glyphicon-send"></span></a>
                        </td>
					</tr>
					<?php
                    }

					}
                       else
                       {
                           $OrSql = "SELECT * FROM orders,members ,status
                    where orders.statusID = status.statusID
                    AND orders.memberid =members.memberid";
					$OrResult = mysqli_query($conn,$OrSql)or die(mysqli_error());
					While($OrData = mysqli_fetch_array($OrResult)){
					?>
					<tr>
						<td><?=$OrData['Orderid'];?></td>
						<td><?=$OrData['OrderDate'];?></td>
						<td><?=$OrData['Name']?></td>
                        <td><a href="paidview.php?id=<?=$OrData['Orderid'];?>"><?=$OrData['statusName'];?></a></td>
						<td>
                        <a href="view_order.php?id=<?=$OrData['Orderid'];?>"class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="paidview.php?id=<?=$OrData['Orderid'];?>"class="btn btn-danger"><span class="glyphicon glyphicon-refresh"></span></a>
                            <a href="notice.php?mail=order&id=<?=$OrData['Orderid'];?>"class="btn btn-danger"><span class="glyphicon glyphicon-send"></span></a>
                        </td>
					</tr>

                        <?php
                    }
                       }


					mysqli_close($conn);
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
            title: 'คำแนะนำ!',
            // (string | mandatory) the text inside the notification
            text: 'เลือกประเภทของออเดอร์ที่ต้องการดู',
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

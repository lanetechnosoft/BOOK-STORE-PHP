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
		  <h3><a href="orders.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> กลับ</a> ตรวจสอบการชำระเงิน</h3>
			<!--สิ้นสุดส่วนหัวของหน้าแรก-->
			<div class="col-lg-12">
				<?php
                $sql ="select * from payment ,banks where payment.Orderid ='".$_GET['id']."' AND payment.bankID = banks.bankID";
				$result = mysqli_query($conn,$sql) or die ("ล้มเหลว") ;
				$data = mysqli_fetch_array($result);
				?>
					<table width="100%" border="0" class="table table-responsive">
					<tr>
					<td align="right">รหัสสั่งซื้อ</td>
					<td>
					<input type="text" name="Orderid" value="<?=$data['Orderid']?>" readonly>
					</td>
					</tr>
					<tr>
					<td align="right">ช่องทางชำระเงิน</td>
					<td>
					<input type="text" name="bank" value="<?=$data['bankName']?>" readonly>
                    </td>
					</tr>
					<tr>
					<td align="right">จำนวนเงิน</td>
					<td>
					<input type="text" name="Money" value="<?=$data['Amout']?>" readonly>
					</td>
					</tr>
					<tr>
					<td align="right">วันที่โอน</td>
					<td>
					<input type="text" name="PaidDate" value="<?=$data['paidDate']?>" readonly >
					</td>
					</tr>
					<tr>
					<td align="right">รูปสลิป</td>
					<td><a href="../img/slip/<?=$data['slipPic']?>" target="_blank"><img src="../img/slip/<?=$data['slipPic']?>" width="100"></a>
					</td>
					</tr>
					<tr >
                    <td align="right">หมายเหตุ</td>
					<td><textArea name="comment" readonly><?=$data['Comment']?></TextArea>
					</td>
					</tr>

					<form action="" method="post">
					<tr>
					<td align="right">อัพเดทสถานะ
					</td>
					<td>
					<select name="statusud">
        				<?php
						$sql2 = "select * from status ";
						$result2 = mysqli_query($conn,$sql2);
						while ($data2 = mysqli_fetch_array($result2))
						{
        				?>
        				<option value="<?=$data2['statusID'];?>"><?=$data2['statusName'];?> </option>
       					<?php } ?>
     					</select>
					</td>
					</tr>
					<tr>
					<td>
					</td>
					<td>
					<input type="submit" name="sid" value="อัพเดท" class="btn btn-sm btn-success">
					</td>
					</tr>
					</table>
					</form>
				 <?php

				 if(isset($_POST['sid'])){
					$sql3 = "UPDATE orders SET
					statusID = '".$_POST['statusud']."'
					WHERE Orderid = '".$_GET['id']."'";
					mysqli_query($conn,$sql3)  or die("อัพเดทข้อมูลไม่ได้");
					echo"<script>
					alert('อัพเดทเรียบร้อย');
					window.location='orders.php';
					</script>";

                     if($_POST['statusud'] == '4'){
                         $sql4 = "SELECT * FROM orders , order_detail , books WHERE orders.Orderid = '$_GET[id]' AND orders.Orderid=order_detail.Orderid AND books.bID = order_detail.bID";
                         $rs4 = mysqli_query($conn,$sql4);

                         while($data4 = mysqli_fetch_array($rs4)){

                         $setminus = $data4['bCount']-$data4['Qty'];

                         $sql5 = "update books SET
                         bCount = '$setminus'
                         where bID = $data4[bID] ";
                        mysqli_query($conn,$sql5);
                         }
                        }
					   }
                    ?>
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
            title: 'คำแนะนำนิดหน่อย!',
            // (string | mandatory) the text inside the notification
            text: 'คลิกที่รูปเพื่อดูรูปใหญ่',
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

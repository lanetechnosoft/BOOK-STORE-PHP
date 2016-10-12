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
          	<h3><i class="fa fa-angle-right"></i> อัพเดทข้อมูลผู้ใช้งานระบบ</h3>

          	<div class="row mt">
          		<div class="col-lg-12">

                    <?php
                    
                    $Sql ="select * from member where id='1'";
                    $result = mysqli_query($conn,$Sql);
                    $data  = mysqli_fetch_array($result);

                    ?>
          		 <form class="form-inline" method="post" enctype="multipart/form-data" name="form1" id="form1">
    				<table class=" table table-striped"  width="300" border="0" cellspacing="2" cellpadding="2">
    				  <tbody>
    				    <tr>
                        <td rowspan="7" align="center"><p>&nbsp;</p>
                          <p>&nbsp;</p><img src="../img/pf/<?=$data['pfPic'];?>" width="200"  class="img-rounded"></br>
                            <input type="file" name="picProfile" id="picProfile" accept="image/*" class="form-control"></td>
                        <td>ชื่อผู้ใช้</td>

    				      <td><input type="text" name="usr" value="<?=$data['username'];?>" class="form-control" <?php if($data['username'] != "") echo"readonly";?> >
                                </td>

  				        </tr>
    				    <tr>
    				      <td>ชื่อ - นามสกุล</td>

    				      <td><input type="text" name="mName" value="<?=$data['Name'];?>" class="form-control"></td>
  				        </tr>
                      <tr>
                        <td>ที่อยู่ในการจัดส่ง</td>

    				      <td><input name="addr" class="form-control" value="<?=$data['address'];?>"><br>
                              <input name="addr2" class="form-control" value="<?=$data['address2'];?>">
                            </td>
  				      </tr>
                      <tr>
                      <td>E-mail</td>

    				      <td><input type="text" name="email" value="<?=$data['email'];?>" class="form-control"></td>
  				      </tr>
                      <tr>
                        <td>New password</td>
                        <td height="40"><input type="password" name="newpassword" class="form-control"></td>
                        </tr>
                        <tr>
                        <td>old password</td>
                        <td height="40"><input name="oldpassword" type="password" required class="form-control"></td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td height="40"><input type="submit" name="submit" id="submit" value="อัพเดทข้อมูล" class="btn btn-success"></td>
                        </tr>

  				    </tbody>
  				  </table>
                    </form>
                    <?php


if(isset($_POST['submit'])){
$oldpassword = md5($_POST['oldpassword']);

/*ตรวจสอบว่ารหัสผ่านเดิมถูกต้องหรือไม่ก่อนดำเนินการต่อ*/
if($oldpassword==$data['password'])
{
	/*ตรวจสอบว่าช่องรหัสผ่านใหม่ว่างหรือไม่*/
	if($_POST['newpassword']=="")
	{$newpassword = $data['password'];}
	else
    include('sendmail.php');
	{$newpassword=md5($_POST['newpassword']);}
	/*ตรวจสอบว่าได้เลือกรูปโปรไฟล์ใหม่หรือไม่*/
	if($_FILES['picProfile']["name"]=="")
	{$pic=$data['pfPic'];}
	else
	{copy($_FILES['picProfile']["tmp_name"],"../img/pf/".$_FILES['picProfile']["name"]);
	$pic = $_FILES['picProfile']["name"];}

	$name = $_POST['mName'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $addr2 = $_POST['addr2'];
    $user = $_POST['usr'];


	$sql3 ="Update members SET
	pfPic='$pic',
    username ='$user',
	password='$newpassword',
    email ='$email',
	Name ='$name',
    address = '$addr',
    address2 = '$addr2'
	where memberID='1'
	";
	mysqli_query($conn,$sql3) or die(mysqli_error());
	echo"<script>
	alert(\"รหัสผ่านถูกต้อง\");
	window.location='setting.php';
	</script>";
	}
	else
	{
		echo"รหัสผ่านผิด";
	}
}
?></div>
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
            title: 'Welcome to B-Book Panel',
            // (string | mandatory) the text inside the notification
            text: 'username สามารถตั้งได้ครั้งเดียวในขั้นตอนการสมัครเท่านั้น.',
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

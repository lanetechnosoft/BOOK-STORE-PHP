<?php
include('session.php');
include ("../config.php");
$sql3 ="select * from books where bID ='$_GET[id]'";
$result3 =mysqli_query($conn,$sql3);
$data3 = mysqli_fetch_array($result3)


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อัพเดทข้อมูลหนังสือ</title>
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
                    <li><a class="logout" href="login.php">Logout</a></li>
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
          	<h3><i class="fa fa-angle-right"></i> แก้ไขข้อมูลหนังสือ</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
<form class="form-group" method="post" action="" enctype="multipart/form-data" name="form1" id="form1"onSubmit="return chk_null(); ">
  <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" align="right">รหัสหนังสือ</td>
      <td><input name="ID" type="text" disabled="disabled" id="ID" class="form-control" value="<?=$_GET['id']?>"></td>
      </tr>
    <tr>
      <td width="126" height="40" align="right">ชื่อหนังสือ</td>
      <td width="497"><input name="bName" type="text" required class="form-control" id="bName" value="<?=$data3['bName']?>"></td>
      </tr>
    <tr>
      <td height="40" align="right">ผู้แต่ง </td>
      <td><select name="authID" class="form-control">
        <?php
		$sql4 = "select * from auther ";
		$result4 = mysql_query($sql4);
		while ($data4 = mysql_fetch_array($result4))
		{
        ?>
        <option value="<?=$data4['authID'];?>" <?php if($data4['authID']==$data3['authID']) echo"selected" ?>>
          <?=$data4['authName'];?> </option>
        <?php } ?>
      </select></td>
      </tr>
     <tr>
      <td height="40" align="right">หมวดหมู่</td>
      <td><select name="bCatID" id="bCatID"  class="form-control">
        <?php
		$sql = "select * from category ";
		$result = mysql_query($sql);
		while ($data = mysql_fetch_array($result))
		{
        ?>
        <option value="<?=$data['CatID'];?>" <?php if($data['CatID']==$data3['CatID']) echo"selected" ?>>
        <?=$data['CatName'];?> </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="40" align="right">สำนักพิมพ์</td>
      <td><select name="pubID" id="bCatID"  class="form-control">
        <?php
		$sql5 = "select * from publisher ";
		$result5 = mysql_query($sql5);
		while ($data5 = mysql_fetch_array($result5))
		{
        ?>
        <option value="<?=$data5['pubID'];?>" <?php if($data5['pubID']==$data3['pubID']) echo"selected" ?>>
          <?=$data5['pubName'];?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="40" align="right">ราคา (บาท)</td>
      <td><input name="bPrice" type="text" required class="form-control" size="50" value="<?=$data3['bPrice']?>"></td>
      </tr>
      <tr>
      <td height="40" align="right">จำนวน</td>
      <td><input type="text" name="bcount"  value="<?=$data3['bCount']?>" class="form-control"></td>
      </tr>
    <tr>
      <td  height="40" align="right">ISBN</td>
      <td><input type="text" name="bisbn" value="<?=$data3['ISBN']?>"  class="form-control"></td>
      </tr>
    <tr>
      <td  height="40"align="right">พิมพ์ครั้งที่</td>
      <td><input type="text" name="bEdition" value="<?=$data3['bEdition']?>" class="form-control" id="bEdition"></td>
    </tr>
    <tr>
      <td  height="40"align="right">จำนวนหน้า</td>
      <td><input type="text" name="bpage" value="<?=$data3['bPage']?>" class="form-control"></td>
      </tr>
    <tr>
      <td  height="40"align="right">รูปแบบปก</td>
      <td><input type="text" name="bcover" value="<?=$data3['bCover']?>" class="form-control"></td>
      </tr>
    <tr>
      <td  height="40" align="right">รูปแบบกระดาษ</td>
      <td><input type="text" name="bpaper" value="<?=$data3['bPaper']?>" class="form-control"></td>
      </tr>
    <tr>
      <td  height="40" align="right">จุดสั่งซื้อ</td>
      <td><input type="text" name="bbuypoint" value="<?=$data3['bBuyPoint']?>" class="form-control"></td>
      </tr>
    <tr>
      <td  height="40" align="right">คำอธิบายหนังสือ</td>
      <td><textarea name="bDesc" cols="50" rows="10" id="bDesc" class="form-control"><?=$data3['bDesc']?></textarea></td>
      </tr>
    <tr>
      <td  height="40">&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="อัพเดทข้อมูล" class="btn btn-primary"></td>
      </tr>


  </table>
</form>
<?php


if(isset($_POST['submit'])){
	$sql2 ="update books set
	bName = '$_POST[bName]' ,
	authID = '$_POST[authID]',
	CatID = '$_POST[bCatID]',
	pubID = '$_POST[pubID]',
	bEdition = '$_POST[bEdition]',
	bDesc = '$_POST[bDesc]',
	bPrice = '$_POST[bPrice]',
	bCount = '$_POST[bcount]',
	ISBN = '$_POST[bisbn]',
	bPage = '$_POST[bpage]',
	bCover = '$_POST[bcover]',
	bPaper = '$_POST[bpaper]',
	bBuyPoint = '$_POST[bbuypoint]'
	where bID='$_GET[id]'";
	mysql_query($sql2) or die("อัพเดทข้อมูลไม่ได้");

	echo "<script>
	alert('อัพเดทข้อมูลเรียบร้อยแล้ว');
	window.location='book_list.php';

	</script>";



}
?>
       		  </div>
          	</div>

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
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

    <!--
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
    -->

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

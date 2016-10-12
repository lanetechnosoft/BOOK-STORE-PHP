<?php
include('session.php');
include("../config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายการหนังสือ</title>
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
          	<h3><i class="fa fa-angle-right"></i> รายการหนังสือ</h3>
          	<form class=" form-inline" id="form1" name="form1" method="post">
  <label for="kw">ค้นหา:</label>
        <input name="kw" type="text" class="form-control">
      <input type="submit" name="submit" id="submit" value="ค้นหา" class="btn btn-success">
      <br>
          	</form>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<table border="0" class="table table-hover">
          		  <tr>
          		    <th width="20">No.</th>
          		    <th width="104">รูป</th>
          		    <th width="177">ชื่อหนังสือ</th>
          		    <th width="137">ผู้แต่ง</th>
          		    <th width="242">หมวดหมู่</th>
          		    <th width="88">ราคา / หน่วย</th>
          		    <th width="44">จำนวน</th>
          		    <th width="136">จัดการ</th>
       		      </tr>
          		  <?php
                $perpage = 8;
                 if (isset($_GET['page'])) {
                 $page = $_GET['page'];
                   } else {
                 $page = 1;
                   }

                $start = ($page - 1) * $perpage;
  @$kw = $_POST['kw'];

$sql ="select * from books b,auther au,category cat where b.authID=au.authID
AND cat.CatID=b.CatID AND ((b.bID like '%$kw%') or (b.bName like '%$kw%') or (au.authName like '%$kw%')  )
limit {$start} , {$perpage}";
$result = mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($result)){

?>
  </p>

  <tr>
    <td><?=$data['bID'];?></td>
    <td><img src="../img/<?=$data['bPic'];?>" width="100" height="100" onclick="window.open('cover_change.php?id=<?=$data['bID']?>','','top=0')"></td>
    <td><a href="book.php?id=<?=$data['bID'];?>"><?=$data['bName'];?></a></td>
    <td><?=$data['authName'];?></td>
    <td><?=$data['CatName'];?></td>
    <td><?=$data['bPrice'];?></td>
    <td><?=$data['bCount'];?></td>
    <td><a href='book_update.php?id=<?=$data['bID']?>' class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span> แก้ไข</a>
		<a href='delete.php.php?n=book&id=<?=$data['bID']?>' onClick="return confirm('คุณแน่ใจไหมที่จะลบ <?=$data['bName'];?>  ?');"class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
    <a href='promotion.php?action=promo&id=<?=$data['bID']?>' onclick="return confirm('คุณต้องการกำหนดให้เป็นหนังสือแนะนำ ?');"class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-star"></span>โปรโมท</a></td>
  </tr>
  <?php

  }



  ?>

        		  </table>

              <!--Pagination-->
        			<div class="pagination">
        				<ul class="pager">
                            <li class="next">
                                <?php
         $sql2 = "select * from books ";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
         ?>

         <nav>
         <ul class="pagination">
         <li>
         <a href="book_list.php?page=1" aria-label="Previous">
         <span aria-hidden="true">&laquo;</span>
         </a>
         </li>
         <?php for($i=1;$i<=$total_page;$i++){ ?>
         <li><a href="book_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
         <?php } ?>
         <li>
         <a href="book_list.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">&raquo;</span>
                            </li>
                        </ul>
        			</div>

        		<!--/.Pagination-->

          		<p>&nbsp;</p>
          		</div>
          	</div>
<?php
mysqli_close($conn);
?>
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

	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'รู้เหมือไร่!',
            // (string | mandatory) the text inside the notification
            text: 'คุณมาสารถเปลี่ยนภาพปกหนังสือได้โดยการคลิกที่รูปนั้นเลย.',
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

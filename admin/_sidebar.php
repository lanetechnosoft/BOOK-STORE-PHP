<?php
include('session.php');
include('config.php');

$acc = "select * from members where memberid='1'";
$rsacc = mysqli_query($conn,$acc);
$accdata = mysqli_fetch_array($rsacc);

?>

<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="index.php"><img src="../img/pf/<?=$accdata['pfPic'];?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?=$accdata['Name'];?></h5>

                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>หน้าหลัก</a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>จัดการส่วนหน้า</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="promotion.php">หนังสือโปรโมท</a></li>
                          <li><a  href="#">ป้ายโฆษณา</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>หมวดหมู่</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="category.php">รายการหมวดหมู่</a></li>
                          <li><a  href="category_add.php">เพิ่มหมวดหมู่ใหม่</a></li>
                          <li><a  href="auther_list.php">รายชื่อผู้แต่ง</a></li>
                          <li><a  href="auther_add.php">เพิ่มผู้แต่งใหม่</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>หนังสือ</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="book_list.php">รายการหนังสือ</a></li>
                          <li><a href="book_add.php">เพิ่มหนังสือใหม่</a></li>
                          <li><a  href="publisher.php">รายชื่อสำนักพิมพ์</a></li>
                          <li><a  href="publisher_add.php">เพิ่มสำนักพิมพ์ใหม่</a></li>
                      </ul>
                  </li>



                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>ข้อมูล</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="orders.php">คำสั่งซื้อ</a></li>
                          <li><a  href="#">การชำระเงิน</a></li>
                          <li><a  href="#">การจัดส่ง</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>ตั้งค่า</span>
                      </a>
                      <ul class="sub">
                           <li><a href="#">ข้อมูลร้านค้า</a></li>
                          <li><a href="#">ความปลอดภัย</a></li>
                          <li><a  href="setting.php">ผู้ใช้งานระบบ</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--sidebar end-->

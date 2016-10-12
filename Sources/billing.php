
<?php

include('config.php');
    $invsql = "select * from orders,members where orders.orderid = '$_GET[id]' AND orders.memberid=members.memberid";
    $invrs = mysqli_query($conn,$invsql);
    $invdata = mysqli_fetch_array($invrs);
$currentdate = date("d-m-Y");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ใบเสร็จคำสั่งซื้อหมายเลข <?=$invdata['invoice'];?></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
<div class="container" align="center">
  <div class=" col-lg-8">
      <h3>สินค้าจะจัดส่งให้หลังจากที่ท่านโอนไปยังบัญชีธนาคารของทางร้าน และมีการแจ้งการชำระเงินเสร็จเรียบร้อยแล้วเท่านั้น</h3>
      <h4><u>หมายเหตุ: เพื่อความรวดเร็วในการดำเนินการ กรุณาแจ้งการชำระเงินที่หน้าเว็บ หรือ Email มาที่:  xxx@localhost ถ้าคุณโอนชำระมากกว่า1ใบกำกับภาษี ให้ชำระมาเป็นจำนวนเต็ม (xxx.00) ไม่ต้องมีสตางค์</u></h4>
  <div class=" col-md-6" align="left">
   
    <b>คำสั่งซื้อหมายเลข <?=$invdata['invoice'];?></b><br>
  <b><?=$invdata['OrderDate'];?></b>
  </div>
  
  <div class=" col-md-6" align="right">
  <img src="bootstrap/images/home/logo.png" width="163" height="50">
  </div>
  <div class="col-lg-6" align="left">
  	<b><?=$invdata['Name'];?></b><br>
	<?=$invdata['address'];?><br>
      <?=$invdata['address2'];?><br>
      <?=$invdata['tel'];?><br>
      <?=$invdata['email'];?><br>
  </div>
  
  <div class="col-lg-6" align="right">
	<?php
    $stsql = "select * from store where st_id = 1";
    $strs = mysqli_query($conn,$stsql);
    $stdata = mysqli_fetch_array($strs);
    ?>
      <b><?=$stdata['st_name'];?></b><br>
	<?=$stdata['st_address'];?><br>
    <?=$stdata['st_tel'];?><br>
  <?=$stdata['email'];?><br>
      </div>
  <br>
    <div class="table table-responsive">
    <table border=""class="table table-striped table-bordered">
      <tr>
        <th>รายการ</th>
        <th>จำนวน</th>
        <th>ราคารวม</th>
      </tr>
      <?php
    $sqlbilling = "SELECT * FROM orders , order_detail , books WHERE orders.Orderid = '$_GET[id]' AND orders.Orderid=order_detail.Orderid AND books.bID = order_detail.bID";
    $result = mysqli_query($conn,$sqlbilling);
    while($data= mysqli_fetch_array($result)){

?>
      <tr>
        <td><?=$data['bName'];?></td>
        <td><?=$data['Qty'];?></td>
        <td><?=$data['bPrice'];?> บาท</td>
      </tr>
      <?php
@$total = $total + $data['bPrice'];

}
@$Tax = $Tax  + ($total*7)/100;
@$TotalPrice = $TotalPrice + $total + $Tax;
mysqli_close($conn);
?>
	  <tr>
        <td></td>
        <td>ราคารวมสุทธิ</td>
        <td><?=$total?> บาท </td>
      </tr>
      <tr>
        <td></td>
        <td>ภาษีมูลค่าเพิ่ม</td>
        <td><?=$Tax?> บาท </td>
      </tr>
      <tr>
        <td></td>
        <td>ค่าจัดส่ง</td>
        <td>ฟรี</td>
      </tr>
      <tr>
        <th></th>
        <th>รวมทั้งสิ้น</th>
        <th><?=$TotalPrice?> บาท</th>
      </tr>
    </table>
    </div>

      <h2><span class="glyphicon glyphicon-warning-sign"></span> ทุกครั้งที่ชำระเงินเข้ามา กรุณาแจ้งหลักฐานมายืนยันที่</h2>
      <h4><span class="glyphicon glyphicon-link"></span> WebSite <a href="payment.php">คลิกที่นี่</a>  |  <span class="glyphicon glyphicon-envelope"></span> Email :the.last-stronger@live.com</h4>
      

</div>
</div>

</body>
</html>



<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ

include('config.php');
$sqlbilling = "SELECT * FROM orders , order_detail , books WHERE orders.Orderid = '$_GET[id]' AND orders.Orderid=order_detail.Orderid AND books.bID = order_detail.bID";
$result = mysqli_query($conn,$sqlbilling);
$currentdate = date("d-m-Y");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ใบเสร็จแสดงรายการสั่งซื้อ วันที่ <?=$currentdate?></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
<div class="container" align="center">

<div align="center">
  <p><img src="bootstrap/images/home/logo.png" width="163" height="50"><br>
  </p>
  <p>
    <label for="textfield"></label>
    414 ม.1 ต.ท่าขอนยาง อ.กันทรวิชัย จ.มหาสารคาม 44150</p>
  <form name="form1" method="post" action="">
    <label for="textfield2"></label>
    Tel: 0843929480  E-mail:
  Charoensak.tang@gmail.com
</form>
</div>

<table border="1" width="1000" class="table-striped">
<tr>
<th width="111" bgcolor="#FFCCCC">รหัสหนังสือ</th>
<th colspan="2" bgcolor="#FFCCCC">รายการ</th>
<th width="102" bgcolor="#FFCCFF">จำนวน</th>
<th width="96" bgcolor="#FFCCFF">ราคารวม</th>
</tr>
<?php
while($data= mysqli_fetch_array($result)){

?>
<tr>
<td bgcolor="#FFFFCC"><?=$data['bID'];?></td>
<td colspan="2" bgcolor="#FFFFCC"><?=$data['bName'];?></td>
<td bgcolor="#FFFFCC"><?=$data['Qty'];?></td>
<td bgcolor="#FFFFCC"><?=$data['bPrice'];?>บาท</td>
</tr>
<?php
$total = $total + $data['bPrice'];

}
$Tax = $Tax  + ($total*7)/100;
$TotalPrice = $TotalPrice + $total + $Tax;
mysqli_close($conn);
?>
</table>
<table width="98%" border="0" align="right" class="table table-hover">
<tr>
<td colspan="4" align="right" bgcolor="#CCFFFF">ราคารวม</td>
<td width="24%" align="right" bgcolor="#CCFFFF"><?=$total?> บาท </td>
</tr>
<tr>
<td colspan="4" align="right" bgcolor="#CCFFFF">ภาษีมูลค่าเพิ่ม</td>
<td align="right" bgcolor="#CCFFFF"><?=$Tax?> บาท </td>
</tr>
<tr>
<td colspan="4" align="right" bgcolor="#CCFFFF">ค่าจัดส่ง</td>
<td align="right" bgcolor="#CCFFFF">Free</td>
</tr>
<tr>
<td colspan="4" align="right" bgcolor="#CCFFFF">ราคารวมสุทธิ</td>
<td align="right" bgcolor="#CCFFFF"><?=$TotalPrice?> บาท</td>
</tr>
</table>
  <p><span class="aa">ช่องทางการชำระเงิน </span> </p>
  <p><img src="img/payment-border-530.png" width="585" height="98"><br>
</p>

</div>
</body>
</html>
<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4-L', '0', ''); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>

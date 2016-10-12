<?php
include('session.php');
include('config.php');

$Sql ="select * from members where memberid='1'";
$result = mysqli_query($conn,$Sql);
$data  = mysqli_fetch_array($result);

require("phpmailer52/class.phpmailer.php");
$mail = new PHPMailer();

$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->Port = 587; // พอร์ท
$mail->Username = "loveschoolsarawut@gmail.com"; // account SMTP
$mail->Password = "M4n68tmV2"; // รหัสผ่าน SMTP
$mail->ContentType="text/html";

$mail->SetFrom("the.last-stronger@live.com", "Book Store Final Project");
$mail->AddReplyTo("the.last-stronger@live.com", "Book Store Final Project");



if($_GET['mail']=='payment'){
    
    $mail->Subject = "แจ้งเกี่ยวกับการชำระเงิน";
    $body = "แจ้งเกี่ยวกับการชำระเงิน";
}
if($_GET['mail']=='order'){
    $sqlm ="select * from orders,members where orders.Orderid = '$_GET[id]' and orders.memberid=members.memberid";
    $resultm = mysqli_query($conn,$sqlm);
    $dt  = mysqli_fetch_array($resultm);
    
    $mail->Subject = "คำสั่งซื้อหมายเลข".$dt['invoice'];
    $body = "ถึงคุณ ".$dt['Name']."<br></br>เราได้รับคำสั่งซื้อเรียบร้อยแล้ว<br>กรุณาชำระเงินตามจำนวน";
    
}

$mail->MsgHTML($body);

$mail->AddAddress($dt['email'],$dt['Name']); // ผู้รับคนที่หนึ่ง
//$mail->AddAddress("the.last-stronger@live.com", "recipient2"); // ผู้รับคนที่สอง

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>
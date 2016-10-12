<?PHP

$Sql ="select * from members where memberid='1'";
$result = mysqli_query($conn,$Sql);
$data  = mysqli_fetch_array($result);

                    
require("phpmailer52/class.phpmailer.php");
$mail = new PHPMailer();

$body = "รหัสผ่านของคุณถูกเปลี่ยน หากคุณไม่ได้ดำเนินการนี้ กรุณาแจ้งให้เราทราบและเบื้งต้นแนะนำให้เปลี่ยนรหัสผ่าน Link : ";

$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->Port = 587; // พอร์ท
$mail->Username = "loveschoolsarawut@gmail.com"; // account SMTP
$mail->Password = "M4n68tmV2"; // รหัสผ่าน SMTP

$mail->SetFrom("the.last-stronger@live.com", "Book Store Final Project");
$mail->AddReplyTo("the.last-stronger@live.com", "Book Store Final Project");
$mail->Subject = "ทดสอบส่งเมล์จาก Localhost.";

$mail->MsgHTML($body);

$mail->AddAddress("the.last-stronger@live.com","$data[Name]"); // ผู้รับคนที่หนึ่ง
//$mail->AddAddress("the.last-stronger@live.com", "recipient2"); // ผู้รับคนที่สอง

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
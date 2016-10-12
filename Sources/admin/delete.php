<meta charset="utf-8">

<?php
include('session.php');

include ('config.php');
if($_GET['n'] =='cat')
{
$sql = "delete from category where CatID ='$_GET[id]'";
mysqli_query($conn,$sql) or die ("ลบข้อมูลไม่ได้");
echo "<script>
alert('ลบข้อมูลเรียบร้อย');
window.location='category.php';
</script>";
}
if($_GET['n'] =='auth')
{
$sql1 = "delete from auther where authID ='$_GET[id]'";
mysqli_query($conn,$sql1) or die ("ลบข้อมูลไม่ได้");
echo "<script>
alert('ลบข้อมูลเรียบร้อย');
window.location='auther_list.php';
</script>";
}
if($_GET['n'] =='pub')
{
$sql2 = "delete from publisher where pubID ='$_GET[id]'";
mysqli_query($conn,$sql2) or die ("ลบข้อมูลไม่ได้");
echo "<script>
alert('ลบข้อมูลเรียบร้อย');
window.location='auther_list.php';
</script>";
}
if($_GET['n'] =='book')
{
$sql3 = "delete from books where bID ='$_GET[id]'";
mysqli_query($conn,$sql3) or die ("ลบข้อมูลไม่ได้");
echo "<script>
alert('ลบข้อมูลเรียบร้อย');
window.location='auther_list.php';
</script>";
}

?>

<?php
$con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
session_start();
$title = $_POST['title'];
$details = $_POST['details'];
$cat    = $_POST['category'];
$id = $_SESSION['id'];
$status = "unresolved";
$date = date('Y-m-d');
echo $id;
$query = "INSERT INTO issues (title,details,category,userid,datei,status) values ('$title','$details','$cat','$id','$date','$status')";
$res = mysqli_query($con,$query)or die("failed ".mysqli_error($con));;
if($res)
{
echo "<script type='text/javascript'>alert('Grevience submitted Succesfully');window.location.href='index.php';</script>";

}
?>

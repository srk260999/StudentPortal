<?php
 $con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
 $issue = $_GET['issueid'];
 //require "swiftmailer/swiftmailer:^6.0";
 $query = "UPDATE issues set status = 'resolved' where gid = '$issue'";
 
 
 
 
 $res = mysqli_query($con,$query)or die("failed ".mysqli_error($con));;
if($res)
{

echo "<script type='text/javascript'>alert('Grevience resolved Succesfully');window.location.href='dept.php';</script>";

}




?>
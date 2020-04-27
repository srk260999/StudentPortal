<?php
$con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
if(!$_SESSION['email'])
{
header("Location: index.html");
}
session_destroy();
header("Location: index.html");
?>
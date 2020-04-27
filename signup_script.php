<?php
$con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
$name = $_POST['name'];
$email = $_POST['email'];
$urn = $_POST['urn'];
$password = $_POST['password'];
$clg = $_POST['clg'];
$dept = $_POST['dept'];
$query1 = "select * from users where email = '$email'";
$res = mysqli_query($con,$query1)  or die("failed ".mysqli_error($con));
$array = mysqli_fetch_array($res);
if($email == $array['email'])
{
	echo "<h3>User already exists! Try another username.</h3>";
}
else
{	$desig = "student";
	$insert = "insert into users (name, email, password, urn, clg, dept,design) values('$name', '$email', '$password', '$urn', '$clg', '$dept','$desig')";
	$r = mysqli_query($con,$insert)  or die("failed ".mysqli_error($con));
	session_start();
	$id =  mysqli_insert_id($con);
	$_SESSION['email'] = $email;
	$_SESSION['urn'] = $urn;
	$_SESSION['id'] = $id;
	$_session['name'] = $name;
	header("Location: index.php");
}
?>


?>
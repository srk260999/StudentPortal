<?php
$con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
$email=$_POST['email'];
$password=$_POST['password'];
$query = "select * from users where email='$email' and password='$password'";
$res = mysqli_query($con,$query)  or die("failed ".mysqli_error($con));
$array = mysqli_fetch_array($res);
if( $password == $array['password'] && $email == $array['email'])
{
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['id'] = $array['id'];
	if($array['design'] == 'student')
	{	$_SESSION['clg'] = $array['clg'];
		$_SESSION['dept'] = $array['dept'];
		$_SESSION['name'] = $array['name'];
		$_SESSION['design'] = $array['design'];
		
		header("Location: index.php");}
if($array['design'] == 'university')
	{header("Location: university.php");}
if($array['design'] == 'dept')
	{
		$_SESSION['clg'] = $array['clg'];
		$_SESSION['dept'] = $array['dept'];
		$_SESSION['name'] = $array['name'];
		
		
		header("Location: dept.php");}
if($array['design'] == 'clg')
	{$_SESSION['clg'] = $array['clg'];
		//$_SESSION['dept'] = $array['dept'];
		$_SESSION['name'] = $array['name'];
		$_SESSION['clg'] = $array['clg'];
		
		
		
		
		header("Location: clg.php");}

	
}
else
{
	echo "<h2>No user Found</h2>";
	exit();
}
?>

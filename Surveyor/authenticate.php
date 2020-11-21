<?php

require_once('./config/config.php');
$surveyor_name = $password = $pwd = '';

$surveyor_name = $_POST['surveyor_name'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$surveyor_id = $_GET['id'];
$sql = "SELECT * FROM surveyor WHERE surveyor_name='$surveyor_name' AND password='$pwd'";
$result = mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["id"];
		$surveyor_name = $row["surveyor_name"];
		session_start();
		$_SESSION['surveyor_id'] = $id;
		$_SESSION['surveyor_name'] = $surveyor_name;
	}
	setcookie("csurveyor_name",$surveyor_name,time()+(10 * 365 * 24 * 60 * 60));			
	setcookie("cpass",$pwd,time()+(10 * 365 * 24 * 60 * 60));		
	header("Location: index.php");
}
else
{
    header("location:login.php?err=1");
}
?>
<?php

require_once('./config/config.php');
$username = $password = $pwd = '';

$username = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM users WHERE username='$username' AND Password='$pwd'";
$result = mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["user_id"];
		$username = $row["username"];
		session_start();
		$_SESSION['user_id'] = $id;
		$_SESSION['username'] = $username;
	}
	header("Location: index.php");
}
else
{
    header("location:login.php?err=1");
}
?>
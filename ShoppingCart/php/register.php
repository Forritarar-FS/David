<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: singup.html");
}
include_once 'dbconnect.php';

if(isset($_POST['username']))
{
	$uname = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['password']));

	if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
	{
		header('Location: ../#/store');
		?>
        <script>alert('successfully registered ');</script>

        <?php
	}
	else
	{
		die('Invalid query: ' . mysql_error());
		?>

        <script>alert('error while registering you...');</script>
        <?php
	}
}
?>

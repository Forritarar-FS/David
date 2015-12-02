<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: /#/store");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: /#/store");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	header("Location: index.php");
}
?>

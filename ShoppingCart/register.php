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
		header('Location: ../shoppingCart/login.php');
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
<!-- login.html -->
<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Svindlbankinn</title>

    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <link href="justified-nav.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="jumbotron" style="padding-bottom:0px;">

        </div>
        <form class="form-signin" role="form" action="register.php" method="POST">
            <input type="text" name="username" class="form-control" placeholder="User Name" required="">
            <input type="text" name="email"class="form-control" placeholder="Email address" required="" autofocus="">
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
            <label class="checkbox">

        </label>
        <button a href="login.php" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      </form>

    </div>



</body></html>

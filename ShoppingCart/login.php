<!-- login.html -->
<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

if(isset($_POST['email']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['password']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);

	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: #/store/" );
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}

}
?>

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
        <form class="form-signin" role="form" action="login.php" method="POST">
            <input type="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
            <label class="checkbox">
                <a href="register.php"> Sign Up</>
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>



</body><!--</html>-->

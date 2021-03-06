<?php
session_start();
include_once 'dbconnect.php';

//print_r($_SESSION);
if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<!doctype html>
<html ng-app="AngularStore">
  <head>
    <title>Shopping Cart with AngularJS</title>

    <!-- SCROLLS -->
    <!-- load bootstrap and fontawesome via CDN -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" />

    <!-- SPELLS -->
    <!-- load angular and angular route via CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>



    <!-- jQuery, Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" ></script>
    
    <!-- Bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css"/>
    <!--<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js" type="text/javascript" ></script>-->

    <!-- AngularStore app -->
    <script src="js/product.js" type="text/javascript"></script>
    <script src="js/store.js" type="text/javascript"></script>
    <script src="js/shoppingCart.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script>
    <script src="js/controller.js" type="text/javascript"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>

    <!-- HEADER AND NAVBAR -->
    <header>
        <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">SvindlBankinn</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="./#/about"><i class="fa fa-shield"></i> About</a></li>
                <li><a href="#contact"><i class="fa fa-money"></i> Currency</a></li>
                <!--<li><a href="#login"> <u>Login/Signup</u></a></li>-->
                <li><a href="#index"> Verslun</a></li>
								<li><a href="#"><?php echo $userRow['username']; ?> </a></li>
								<li><a href="logout.php?logout"><i class="fa fa-circle"></i> Sign Out</a></li>

            </ul>
        </div>
        </nav>
    </header>




    <!--
        bootstrap fluid layout
        (12 columns: span 10, offset 1 centers the content and adds a margin on each side)
    -->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span10 offset1">
                <h1 class="well" >
                    <a href="index.php">
                        <img src="img/logo.png" height="60" width="60" alt="logo"/>
                    </a>
                    Ávaxtabarinn
                </h1>
                <div ng-view></div>
            </div>
        </div>
    </div>

  </body>
</html>

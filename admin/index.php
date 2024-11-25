<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = ($_POST['password']);
	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "change-password.php"; //
		$_SESSION['alogin'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$_SESSION['errmsg'] = "Invalid username or password";
		$extra = "index.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Portal | Admin login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body style="overflow: hidden;">

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner" style="border: none;">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

				<a class="brand" href="index.php">
					<img src="images/logo.png" alt="" style="width: 100px;">
				</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">

					<ul class="nav pull-right">

						<li><a href="http://localhost/shopping/">
								Back to Portal

							</a></li>




					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper" style="background-color: #fff; border: none;">
		<div class="container">
			<div class="row">
				<h3 style="width: fit-content; margin: auto; font-size: 40px;">Admin Sign In</h3>
				<div class="module module-login span4 offset4" style="border: none;">
					<form class="form-vertical" style="border: none;" method="post">
						<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<label>Username</label>
									<input class="span12" type="text" id="inputEmail" name="username" style="height: 40px;">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<label>Password</label>
									<input class="span12" type="password" id="inputPassword" name="password" style="height: 40px;">
								</div>
							</div>
						</div>
						<div class="module-foot" style="border: none;">
							<button type="submit" class="btn btn-primary pull-right" name="submit" style="width: 100%; border: none; outline: none; background-color: #1b1b1b; height: 40px;">Login</button>
							<div class="control-group">
								<div class="controls clearfix">

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer" style="border: none; height: 0; background-color: #fff;">
		<div class="container" style="margin: auto; width: fit-content; border: none;">
			<b class="copyright">&copy; 2024 fabsports </b> All rights reserved.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
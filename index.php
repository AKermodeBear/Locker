<?php 
include('header.php');
include_once("../../../db_connect.php");
?>
<title>Shitty Logon</title>
<script type="text/javascript" src="script/jquery.validate.js"></script>
<script type="text/javascript" src="script/login.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
<?php include('navbar-index.php');?>
<div class="container">
	<h2>This thing is broken.</h2>		
	<form class="form-login" method="post" id="login-form">
		<h2 class="form-login-heading">User Log In Form</h2><hr />
		<div id="error">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
			<span id="check-e"></span>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
		</div>
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="login_button" id="login_button">
			<i class="fas fa-sign-in-alt"></i> Sign In
			</button> 
		</div> 
	</form>		
		
</div>
<?php include('footer.php');?>

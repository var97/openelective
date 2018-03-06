<?php 
session_start();
if(isset($_SESSION['user'])){
	header("Location:oechoice.php");
	exit(0);
}
if(isset($_SESSION['admin'])) {
	session_destroy();
	header("Location:index.php");
	exit(0);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login | MUJ OE &amp; HE</title>
		<meta charset="utf-8">
		<meta name="robots" content="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
<body>
	<div class="main-banner">
		<div class="banner-outlay"></div>
	</div>
	<div class="container">
		<div class="row  text-center">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h4 class="title">OPEN ELECTIVES &amp; HUMANITIES ELECTIVES</h4>
				<h2 class="sub-title">Manipal University Jaipur</h2>
			</div>
		</div>
		<div class="row form-row">
			<div class="col-md-4 col-sm-12 col-xs-12"></div>
			<div class="col-md-4 col-sm-12 col-xs-12 form-div">
				<img src="images/muj-logo.png" alt="Manipal University Jaipur" width="40px" />
				<h3 class="login-title" style="display: inline;">STUDENT LOGIN</h3><br><br>						
				<form id="login-form" name="login-form">
					<div class="input-group"><span class="err"></span></div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="user" type="text" class="form-control" name="user" placeholder="Username" required />
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="pass" type="password" class="form-control" name="pass" placeholder="Password" required />
					</div>
					<a href="resetpwd.php" class="pull-left" style="margin-top: 6px;">Forgot Your Password?</a>
					<input type="submit" id="bta" value="Login" class="pull-right"/>
				</form>										
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12"></div>
		</div>				
	</div>

<script>
	$(document).on("submit", "#login-form", function(event){
		event.preventDefault();
		var uname = $('#user').val();
		var psw = $('#pass').val();
		var formData={ uname:uname, psw:psw, key1:'<?php echo str_shuffle("1234567890ABCDabcd"); ?>' };
		$.ajax({
			method: "POST",
			url: "login.php",
			data: formData
		}).done(function(msg){			
			if(msg!="success") {
				$('.err').hide().html('<p class="danger"><span class="glyphicon glyphicon-remove-sign"></span> '+msg+'</p>').fadeIn(1000);	
			}
			else {
				window.open("oechoice.php", "_self");
			}			
		});		
	});
</script>
</body>
</html>
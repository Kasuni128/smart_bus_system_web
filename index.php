<?php 
   session_start();
   if (!isset($_SESSION['uname']) && !isset($_SESSION['uid'])) {   
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Smart Bus System Admin Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="assest/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Login Page</title>
</head>
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-bus"></span></h2></span>
				<h4 class="company_title">Smart Bus Sytem Admin Panel</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Log In</h2>
						<?php if (isset($_GET['error'])) { ?>
      	      			<div class="alert alert-danger" role="alert">
				  		<?=$_GET['error']?>
					</div>
					<?php } ?>
					<div class="row">
						<form action="php/check-login.php"  method="post" class="form-group">
							<div class="row">
								<input type="text" name="uname" id="uname" class="form__input" placeholder="Username">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" data-toggle="password" placeholder="Password">
								<input type="checkbox" onclick="myFunction()"> Show Password	
							</div>
							<div class="row">
							<div class="form-group">
		  					<select class="form-control" name="utype">
			  				<option selected value="time_keeper">Time Keeper</option>
			  				<option value="admin">Admin</option>
		  					</select>
							</div>
							</div>
							<div class="row">
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer">
		Coded by <a href="#">Smart Bus System</a></p>
	</div>
</body>
<!-- partial -->
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
<?php }else{
	header("Location: ../dash/dash.php");
} ?>
<!--Mao ni ang php file responsible sa pag register ug isa ka user-->
<?php 
	
	require_once 'config.php';



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<div class="container">
		

		<div class="body">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				
					<div class="input-group">
					<label>Name<sup>*</sup></label>
					<input type="text" name="name">
					</div>

					<div class="input-group">
					<label>Email<sup>*</sup></label>
					<input type="text" name="email">
					</div>

					<div class="input-group">
					<label>Mobile Number</label>
					<input type="text" name="mobile_number">
					</div>


					<div class="input-group">
					<label>Address</label>
					<input type="text" name="address">
					</div>

					<div class="input-group">
					<label>Username<sup>*</sup></label>
					<input type="text" name="ussername">
					</div>

					<div class="input-group">
					<label>Password<sup>*</sup></label>
					<input type="text" name="password1">
					</div>

					<div class="input-group">
					<label>Confirm Password</label>
					<input type="text" name="password">
					</div>

					<div class="input-group">
					<button type="submit" class="btn" name="reg_user">Register</button>
					</div>

				<p>
				Already a member? <a href="login.php">Sign in</a>
			   </p>
			</form>
		
	</div>
</body>
</html>
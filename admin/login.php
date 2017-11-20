<?php  
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "booking_system");

	//create database connection
	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	//test if connection succeeded
	if(mysqli_connect_errno()){
		die("Database Connection Failed: " . 
			mysql_connect_errno() .
				"(" . mysql_connect_errno() .")"
		); 
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post">

		

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="user">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="pass">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
	</form>

</body>
</html>
<?php  
	
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername = mysqli_real_escape_string($con,$_POST['user']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT admin_id FROM admin WHERE username = '$myusername' and password = '$mypassword' status = 'Active'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row	
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: home.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
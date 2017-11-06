<!--Mao ni ang php file responsible sa pag register ug isa ka user-->
<?php 
	
	require_once 'config.php';


	$name = $email = $mobile_number = $address = $username = $password = $confirm_password = "";
	$name_err = $email_err = $mobile_number_err = $address_err = $username_err = $password_err = $confirm_password_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){


		// Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user_management WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later. 1";
            }

             // Close statement
        mysqli_stmt_close($stmt);
        }  
    }
    	//validate the fields
    if(empty(trim($_POST['name']))){
        $name_err = "Please enter your name.";     
    } 
    if(empty(trim($_POST['email']))){
        $email_err = "Please enter your Email.";     
    } 
    if(empty(trim($_POST['address']))){
        $address_err = "Please enter your Address.";     
    } 


      // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

   
    if(empty($name_err) && empty($email_err) && empty($mobile_number_err) 
    	&& empty($address_err) && empty($username_err) && empty($password_err)){

    	 // Prepare an insert statement
        $sql = "INSERT INTO user_management (user_name, user_email, user_mobile_number, user_address, username, password)
        		 VALUES (?, ?, ?, ?, ?, ?)";

   	    if($stmt = mysqli_prepare($link, $sql)){
   	    	// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_email, $param_mobile_number,
            	 $param_address, $param_username, $param_password );

              $param_name = $name;
              $param_email = $email;
              $param_mobile_number = $mobile_number;
              $param_address = $address;
              $param_username = $username;
              $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash   

              // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later. 2";
            }

     	}
     	
    }
    // Close connection
    mysqli_close($link);
}
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
				

					<div class="input-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
					<label>Name<sup>*</sup></label>
					<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
					<span class="help-block"><?php echo $name_err; ?></span>
					</div>

					<div class="input-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
					<label>Email<sup>*</sup></label>
					<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err ?></span>
					</div>

					<div class="input-group <?php echo (!empty($mobile_number_err)) ? 'has-error' : ''; ?>">
					<label>Mobile Number<sup>*</sup></label>
					<input type="text" name="mobile_number" class="form-control" value="<?php echo $mobile_number; ?>">
					<span class="help-block"><?php echo $mobile_number_err; ?></span>
					</div>


					<div class="input-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
					<label>Address<sup>*</sup></label>
					<input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
					<span class="help-block"><?php echo $address_err; ?></span>
					</div>

					<div class="input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<label>Username<sup>*</sup></label>
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
					</div>

					<div class="input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label>Password<sup>*</sup></label>
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
					<span class="help-block" ><?php echo $password_err; ?></span>
					</div>

					<div class="input-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<label>Confirm Password<sup>*</sup></label>
					<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
					<span class="help-block"><?php echo $confirm_password_err; ?></span>
					</div>

					<div class="input-group"><br>
					<input type="submit" class="btn" value="Submit">
					</div>

					<p>Already a member? <a href="login.php">Sign in</a></p>
			</form>
		
	</div>
</body>
</html>
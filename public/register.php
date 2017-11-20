
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/png" href="css/logo.png">
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<div class="container">
		

		<div class="body">
			<form name="form" method="post">
				

					<div class="input-group >">
					<label>Name<sup>*</sup></label>
					<input type="text" name="name" class="form-control">
					<span class="help-block"></span>
					</div>

					<div class="input-group >">
                    <label>Email<sup>*</sup></label>
                    <input type="text" name="email" class="form-control">
                    <span class="help-block"></span>
                    </div>

					<div class="input-group >">
                    <label>Mobile Number<sup>*</sup></label>
                    <input type="text" name="mobile_number" class="form-control">
                    <span class="help-block"></span>
                    </div>


					<div class="input-group >">
                    <label>Address<sup>*</sup></label>
                    <input type="text" name="address" class="form-control">
                    <span class="help-block"></span>
                    </div>

					<div class="input-group >">
                    <label>Username<sup>*</sup></label>
                    <input type="text" name="username" class="form-control">
                    <span class="help-block"></span>
                    </div>

					<div class="input-group >">
                    <label>Password<sup>*</sup></label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"></span>
                    </div>

                    <div class="input-group >">
                    <label>Confirm Password<sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"></span>
                    </div>


					<div class="input-group"><br>
					<input type="submit" name="submit" class="btn" value="Submit">
					</div>

					<p>Already a member? <a href="../index.php#login">Sign in</a></p>
			</form>
		
	</div>
</body>
</html>

<?php
    $db = mysqli_connect("localhost", "root", "", "booking_system");
    $error_tracking = 0;
    if(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile_number = $_POST['mobile_number'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];


            if($name == null || $email == null || $mobile_number == null || $address == null || $username == null || $password == null){

                    echo '<script> alert (" Fill out all forms properly!") </script>';

            } else if ($password != $confirm_password){

                    echo '<script> alert (" Password input did not match!") </script>';
            } else if (strlen($password) < 6) {

                echo '<script> alert (" Password must be greater than (6) six characters!") </script>';

            } else {

                $sqlRead = "SELECT * FROM user_management";
                $resultForRead = mysqli_query($db, $sqlRead);

                foreach ($resultForRead as $row) {
                    
                    if($row['username'] == $username){
                                echo '<script> alert (" Registration failed. username already exist!") </script>';
                                $error_tracking++;
                                break;
                    } else if($row['email'] == $email){
                                echo '<script> alert (" Registration failed. email already exist!") </script>';
                                $error_tracking++;
                                break;
                    } else if($row['mobile_number'] == $mobile_number){
                                echo '<script> alert (" Registration failed. mobile number is already use by another user!") </script>';
                                $error_tracking++;
                                break;
                    }
                }

            if($error_tracking == 0){
            $password = md5($password);
            $sql = "INSERT INTO user_management(name, email, mobile_number, address, username, password) VALUES ('$name' , '$email' , '$mobile_number', '$address', '$username', '$password')" ;
            mysqli_query($db,$sql);
            $error_tracking = 0;
            echo '<script> alert (" Registration Successful. You may now log in!") </script>';
            header("location: ../index.php#login");
        }
            }
     }  
 ?>








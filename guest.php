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

	session_start();
	$username = $_SESSION['username'];
	if(isset($_POST['log_out_now'])){
		session_destroy();
		header("location: index.php");
	}

	if(isset($_POST['book_btn'])) {

		$room = $_POST['room'];
		$guest = $_POST['guest'];
		$cin = $_POST['check-in'];	
		$cout = $_POST['check-out'];
		echo $cin;
		$room_no;

		if($room == 'Single') {

			$room_no = 1;
		}else if($room == 'Double') {

			$room_no = 2;
		}else if($room == 'Duplex') {

			$room_no = 3;
		}
		echo $room_no;
		$sql_insert = "INSERT INTO room_booking (room_id, check_in_date, check_out_date, room_guest) values ('$room_no', '$cin', '$cout', '$guest')";
		print_r($sql_insert);
		$result_insert = mysqli_query($con, $sql_insert);
	}	
?>

<!DOCTYPE html>
 <html lang="en" class="no-js">

    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title>Paglaom Hotel</title>		
		<!-- Meta Description -->
        <meta name="description" content="">
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google Font -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/png" href="img/logo.png">
		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="css/media-queries.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	
<style>
	#profile {
		padding-left: 170px;
	}
</style>




    <body id="body">
	
		<!-- preloader -->
		<div id="preloader">
			<img src="img/preloader.gif" alt="Preloader">
		</div>
		<!-- end preloader -->

        <!-- 
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
					<!-- /responsive nav button -->
					
					
					
                </div>

				<!-- main nav -->
				
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
					
                        <li><a href="#myprofile">My Profiile</a></li>
						<li><a href="#mybookings">My Bookings</a></li>
                        <li><a href=#logout>Logout</a></li>
                       
                       
					
                    </ul>
                </nav>
				</div>
				<!-- /main nav -->
				
            </div>
        </header>
        
        <!-- End Fixed Navigation
        ==================================== -->  


        <!-- About
        ==================================== -->

		<section id="myprofile" class="myprofile">
			<div class="container">
				<div class="row">
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
					<h2>My Profile</h2>
					<div class="devider"></div>
					</div>

					<?php
					 $db = mysqli_connect("localhost", "root", "", "booking_system");	
					  $sql = "SELECT * FROM user_management WHERE username = '$username'";
    			    $result = mysqli_query($db, $sql);
        			$data = mysqli_fetch_assoc($result);
					?>


				</div>
				<div id= "profile">
				<h3>Name : &nbsp <?php echo $data['name']; ?></h3 ><br>
				<h3>Email: &nbsp <?php echo $data['email']; ?></h3><br>
				<h3>Mobile Number: &nbsp <?php echo $data['mobile_number']; ?></h3><br>
				<h3>Address: &nbsp <?php echo $data['address']; ?></h3><br>
				<h3>Username: &nbsp <?php echo $data['username']; ?></h3><br>
				<h3>Date Created: &nbsp <?php echo $data['date_registered']; ?></h3><br>
				</div>
			</div>
		</section>
		
        
        <!-- End About me
        ==================================== -->
<br>
<br>
<br>
<br>
<br>
<br>	
<br>
<br>


		
		
        <!-- Rooms
        ==================================== -->
		
		<section id="mybookings" class="mybookings">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2>My Bookings & Reservation</h2>
						<div class="divider"></div>
					</div>
					<table style="width:100%">
  <tr>
    <th>Booking Id</th>
    <th>Room ID</th>
    <th>Check In Date</th>
    <th>Check Out Date</th>
    <th>Guest</th>
    <th></th>
  </tr>
  <tr>
    <?php
    	$sql = "SELECT * FROM room_booking";
    	$sql_result = mysqli_query($con, $sql);
    	while($rowData = mysqli_fetch_assoc($sql_result)) {

    		echo '<th>'. $rowData['booking_id'] .'</th>';
    		echo '<th>'. $rowData['room_id'] .'</th>';
    		echo '<th>'. $rowData['check_in_date'] .'</th>';
    		echo '<th>'. $rowData['check_out_date'] .'</th>';
    		echo '<th>'. $rowData['room_guest'] .'</th>';
    		echo '</tr>';
    	}
    ?>
  
</table>
<br>
<br>
<br>
<br>
<br>
<br>	
<br>

	<form method="post">

				<div class="input-group">
					<label>Check In</label>
					<input type="date" name="check-in" >
				</div>
				<div class="input-group">
					<label>Check Out</label>
					<input type="date" name="check-out">
				</div>
				<div class="input-group">
					<label>Room</label>
					<select name="room">
						<option>Single</option>
						<option>Double</option>
						<option>Duplex</option>
					</select>
				</div>
				<div class="input-group">
					<label>Number of Guest</label>
					<select name="guest">
						<option>1</option>
						<option>2</option>
						<option>5</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</br>

				<div class="input-group">
					<button type="submit" class="btn" name="book_btn">Book</button>
				</div>

			</form>
		
				</div>
			</div>
		</section>
		
        
        <!-- End rooms
        ==================================== -->

<br>
<br>
<br>
<br>


	 <!-- Logout
        ==================================== -->
		<section id="logout" class="logout">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2> Log out</h2>
						<div class="devider"></div>
					</div>

			<form method="post">

				<div class="input-group">
					<button type="submit" class="btn" name="log_out_now">Log Out Now</button>
				</div>

			</form>

						
				</div>
			</div>
		</section>
        
        <!-- End Login
        ==================================== -->
		
		
<br>
<br>
<br>
<br>
<br>
<br>	
<br>
	
		<!-- Angle Up 
		================================================= -->
		<div class="angle">
		<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>
		</div>
		
		
		
		
		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- jquery.isotope -->
        <script src="js/jquery.isotope.js"></script>
		<!-- jquery.parallax -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countTo -->
        <script src="js/jquery-countTo.js"></script>
		<!-- jquery.appear -->
        <script src="js/jquery.appear.js"></script>
		<!-- Contact form validation -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
		<!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
		<!-- jquery easing -->
        <script src="js/wow.min.js"></script>
		<script>
			var wow = new WOW ({
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       120,          // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true        // act on asynchronously loaded content (default is true)
			  }
			);
			wow.init();
		</script> 
		<!-- Custom Functions -->
        <script src="js/custom.js"></script>
		
		
		
    </body>
</html>

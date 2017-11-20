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



<?php 
session_start(); 
 $db = mysqli_connect("localhost", "root", "", "booking_system");	
$errors = array();

    if (isset($_POST['login'])) {
          
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        $password = md5($_POST['password']);
        

        
        $sql = "SELECT * FROM user_management WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($result);
    
        if(empty($errors)) {
            
            if($username == $data['username'] && $password == $data['password']) {

               header("location: guest.php");
            }else if ($data['status'] != 'Active') {

              echo '<script> alert (" request in process! ") </script>';
               header("location: index.php");
            } else {
            
               echo '<script> alert (" Invalid Input! ") </script>';
            }
        }
    }
?>




<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

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

        <!-- Rooms Slideshow ================================= -->
        <style>
	.bedcontainer{
  margin:50px auto;
  width:600px;
  height:450px;
  overflow:hidden;
  border:10px solid;
  border-top-color:rgb(44, 74, 84);
  border-left-color:rgb(66, 112, 125);
  border-bottom-color:rgb(44, 74, 84);
  border-right-color:rgb(66, 112, 125);
  position:relative;
}


#details 
{
	padding-left: 40px;
	font-size: 18px;
	float: left;
}


        </style>




    </head>
	
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
					
                        <li class="current"><a href="#body">Home</a></li>
                        <li><a href="#avial_rooms">Check Available Rooms</a></li>
						<li><a href="#about">About</a></li>
                        <li><a href="#rooms">Rooms</a></li>
                        <li><a href="#login">Login</a></li>
                       
					
                    </ul>
                </nav>
				</div>
				<!-- /main nav -->
				
            </div>
        </header>
        
        <!-- End Fixed Navigation
        ==================================== -->
		
		
		
       
         <!-- Home Slider
        ==================================== -->
		
		<section id="slider">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
				<!-- Indicators bullet -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				</ol>
				<!-- End Indicators bullet -->				
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					
					<!-- single slide -->
					<div class="item active" style="background-image: url(img/hotel1.jpg);">
						<div class="carousel-caption">
							
							<h2 data-wow-duration="1000ms" class="wow slideInLeft animated"><span class="color">Paglaom Hotel</span></h2>
							
						
						</div>
					</div>
					<!-- end single slide -->
					
					<!-- single slide -->
					<div class="item" style="background-image: url(img/hotel2.jpg);">
						<div class="carousel-caption">
						
							<h2 data-wow-duration="500ms" class="wow slideInLeft animated"><span class="color">Paglaom Hotel</span></h2>
	
						</div>
					</div>
					<!-- end single slide -->
					
				</div>
				<!-- End Wrapper for slides -->
				
			</div>
		</section>
		
       
         <!-- End Home SliderEnd
        ==================================== -->
<br>
<br>
	
	<!-- Book Rooms==================================== -->
		<section id="avial_rooms" class="avial_rooms">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2> Check Available Rooms</h2>
						<div class="devider"></div>
					</div>

			<form method="post">

				<div class="input-group">
					<label>Check In</label>
					<input type="date" name="check-in" >
				</div>
				<div class="input-group">
					<label>Check Out</label>
					<input type="date" name="check-out">
				</div>
			</br>

				<div class="input-group">
					<button type="submit" class="btn" name="login_user">Search Now</button>
				</div>

			</form>

						
				</div>
			</div>
		</section>
	<!-- End Home SliderEnd==================================== -->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

        <!-- About
        ==================================== -->

		<section id="about" class="about">
			<div class="container">
				<div class="row">
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
					<h2>About Paglaom Hotel</h2>
					</div>

				</div>

					<div id="amenities" class="container-fluid col-lg-12">
			
				<label id="details">
				&nbsp &nbsp  &nbsp Urban Lifestyle Hotels. The Paglaom hotel collection offers a new experience in hospitality urban lifestyle hotels. Each property under the Paglaom brand fuses contemporary design with the local vibe to create an inviting place where relaxation, play, and work can mix. Thus, while every hotel displays paglaom's trademark style and service, each has a distinct personality all its own. 
<br>
&nbsp &nbsp  &nbsp Paglaom is the Visayan word for "silk", a lustrous yet strong fabric that perfectly represents our commitment to providing a seamless hotel experience. It is operated by AyalaLand Hotels and Resorts Corporation (AHRC)and offers comfort, value, and refreshing simplicity that are in line with JazzyLand's best-in-class product and service standards.</label>



				<div class="container">
					<div class="col-md-4 col-sm-4">
						<br>
						<br>
					<img class="img-responsive" src="img/hotel1.jpg" height="500" width="500">
					<h4>The Lobby</h4>
					
					</div>
					<div class="col-md-4 col-sm-4">
						<br>
						<br>
						<img class="img-responsive" src="img/hotel2.jpg" height="500" width="500">
						<h4>Stairways</h4>
						
					</div>
					<div class="col-md-4 col-sm-4">
						<br>
						<br>
						<img class="img-responsive" src="img/hotel3.jpg" height="500" width="500">
						<h4>Rooftop Pool</h4>
						
					</div>
				</div>
			
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
<br>
<br>
<br>
<br>	
<br>

		
		
        <!-- Rooms
        ==================================== -->
		<section id="rooms" class="rooms">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2> Our Rooms</h2>
					</div>
					
			
			
			<div class="bedcontainer">
			
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
				<!-- Indicators bullet -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				</ol>
				<!-- End Indicators bullet -->	
				
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					
					<!-- single slide -->
					<div class="item active" style="background-image: url(img/bed1.jpg);">
						<div class="carousel-caption"></div>
					</div>
					<!-- end single slide -->
					
					<!-- single slide -->
					<div class="item" style="background-image: url(img/bed2.jpg);">
						<div class="carousel-caption"></div>
					</div>
					<!-- end single slide -->
					
					<!-- single slide -->
					<div class="item" style="background-image: url(img/bed3.jpg);">
						<div class="carousel-caption"></div>
					</div>
					<!-- end single slide -->
					
						<!-- single slide -->
					<div class="item" style="background-image: url(img/bed4.jpg);">
						<div class="carousel-caption"></div>
					</div>
					<!-- end single slide -->
					
						<!-- single slide -->
					<div class="item" style="background-image: url(img/bed5.jpg);">
						<div class="carousel-caption"></div>
					</div>
					<!-- end single slide -->
					
						<!-- single slide -->
					<div class="item" style="background-image: url(img/bed6.jpg);">
						<div class="carousel-caption"></div>
					</div>
					<!-- end single slide -->
					
					
					
					
					
					
					
				</div>
				<!-- End Wrapper for slides -->
					
					
					
					
				</div>
				
		
				
				</div>
			</div>
				
		</div>
</section>
		
		
        
        <!-- End rooms
        ==================================== -->
<br>
<br>
<br>
<br>
<br>
<br>	
<br>
<br>
<br>
<br>
<br>
<br>	
<br>
<br>

			
	 <!-- Login
        ==================================== -->

		<section id="login" class="login">
			<div class="container">
			<div class="row">
<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">		
	<h2>Login</h2>
	</div>
			<form method="post">

			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login">Login</button>
			</div>
			<p>
			Not yet a member? <a href="public/register.php">Sign up</a>
		</p>
		</form>	


		<!--connect sa db-->



	</div>
	<div class="devider"></div>
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


 <!-- Footer
        ==================================== -->
		<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
						<div class="footer-single">
							<h6>Thank You</h6>
							<p>Thank you for visiting our website. If you have suggestion please ontact our development team @VTOT.com.</p>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
						<div class="footer-single">
							<h6>Get Notified</h6>
							<p>If you want to get notified in any event, Please Enter your email.</p>
							<input type="text" name="user" >
						</div>
					</div>
				
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
						<div class="footer-single">
							<h6>Explore</h6>
							<ul>
								<li><a href="#">Inside Us</a></li>
								<li><a href="#">Flickr</a></li>
								<li><a href="#">Google</a></li>
								<li><a href="#">Forum</a></li>
							</ul>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
						<div class="footer-single">
							<h6>Support</h6>
							<ul>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Market Blog</a></li>
								<li><a href="#">Help Center</a></li>
								<li><a href="#">Pressroom</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</footer>

	<!-- End Footer
        ==================================== -->


	
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

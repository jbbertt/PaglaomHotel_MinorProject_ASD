<?php
$server="localhost";
$username="root";
$password="";
$connect_mysql=mysqli_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysqli_select_db($connect_mysql, "booking_system") or die ("Could not Connect to Database");

$query = "SELECT * FROM room_booking";
$result=mysqli_query($connect_mysql, $query) or die("Query Failed : ".mysqli_error());

$room_management = "SELECT * FROM room_management";
$room1=mysqli_query($connect_mysql, $room_management) or die("Query Failed : ".mysqli_error());

$room_type = "SELECT * FROM room_type";
$room2=mysqli_query($connect_mysql, $room_type) or die("Query Failed : ".mysqli_error());

$user_management = "SELECT * FROM user_management";
$users=mysqli_query($connect_mysql, $user_management) or die("Query Failed : ".mysqli_error());


 if (isset($_POST['save'])) {
            $space = " ";
            $room_type = $_POST['room_type'];
            $num_of_rooms = $_POST['num_of_rooms'];
          
            if($room_type == null ){

               echo '<script> alert (" fill out forms properly!") </script>';
            } else {
              $sqlInsertToRooms = "INSERT INTO room_type(type_desc, num_of_rooms) VALUES ('$room_type', '$num_of_rooms')" ;
            mysqli_query($connect_mysql,$sqlInsertToRooms);
            } 
    }

    if (isset($_POST['add'])) {
            $room_number = $_POST['room_number'];
            $room_rate = $_POST['room_rate'];
            $guest_capacity = $_POST['guest_capacity'];
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $to_room_type = $_POST['to_room_type'];
            $id_type = $to_room_type[0];


            if($room_number == null){

               echo '<script> alert (" fill out forms properly!") </script>';
            } else {
              $sqlInsertToRoomManagement = "INSERT INTO room_management(room_type_id, room_number, room_image, room_rate, room_max_guest) VALUES ($id_type, $room_number,  '$image', $room_rate, $guest_capacity)" ;
              $res = mysqli_query($connect_mysql,$sqlInsertToRoomManagement);
              
            }
    }

?>

<html>
     <head>
  <title>Paglaom Hotel</title>
  
        <link rel="stylesheet" type="text/css" href="pampagwapo.css" />
        <link rel="icon" type="image/png" href="img/logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>



    <style>

#num_of_rooms {
  width: 100px;
  height: 30px;
}

#to_room_type {
  width: 100px;
  height: 30px;
}

</style>


   
    <body id="adminbg">

        <div id="MainContainer">
            <div id="Header">
                    <div id="NavBar">
                        <ul>
                        <li>Admin</li>
                        </ul> 
                    </div>    
                    <div id="logo"><img src="img/logo.png" width="70px" hieght="auto"></div>                
            </div>
        </div> 
        
         <div id="admin-wrapper" >
            <div id="page-inner">
                </div>
    <div class="fluid-container" style="padding: 50px; margin-top: 50px">
      <center>
      <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h4 id="textcolor">Users</h4></a></li>
      <li role="presentation"><a href="#book" aria-controls="book" role="tab" data-toggle="tab"><h4 id="textcolor">Bookings</h4></a></li>
      <li role="presentation"><a href="#room" aria-controls="settings" role="tab" data-toggle="tab"><h4 id="textcolor">Room</h4></a></li>
      <li role="presentation"><a href="#settings" aria-controls="mess" role="tab" data-toggle="tab"><h4 id="textcolor">Setting</h4></a></li>
      </ul>
      </center>
    </div>
    <!--users -->
    <div class="tab-content" style="background-color: white; color: #170a02;">
      <div role="tabpanel" class="tab-pane fade in active" id="profile" style="overflow: auto; padding: 0 55px;">
        <table id="table" class="table table-hover">
                <thead>
                  <tr id="panel-heading">
                   <th>ID No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Status</th>
                    <th colspan=2>Action</th>
                  </tr>
                </thead>
                <tbody>

                   <?php while($rows=mysqli_fetch_array($users)) { ?>
                        <tr> 
                            <td><?php echo $rows['user_id'] ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['mobile_number'] ?></td>
                            <td><?php echo $rows['status'] ?></td>
                            <td><?php echo '<a href="update.php?id='.$rows['user_id'].'">Update</a>' ?></td>
                         
                            <?php } ?>
                        </tr>
                </tbody>
          </table>  
      </div>
      <div role="tabpanel" class="tab-pane fade" id="book">
        <div class="fluid-container" style="overflow: auto; padding: 0 55px;">
            <table id="table" class="table table-hover">
                <thead> 
                  <tr id="panel-heading">
                            <th>Booking Id.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type of Room</th>
                            <th>No. of Room</th>
                            <th>No. of Guest</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th colspan=2>Action</th>
                        </tr>
                </thead>
                <tbody>
                  <?php while($rows=mysqli_fetch_array($result)) { ?>
                        <tr> 
                            <td><?php echo $rows['booking_id'] ?></td>
                            <td><?php echo $rows['room_id'] ?></td>
                            <td><?php echo $rows['check_in_date'] ?></td>
                            <td><?php echo $rows['check_out_date'] ?></td>
                            <td><?php echo $rows['room_guest'] ?></td>
                                <?php } ?>

                        </tr>
                </tbody>
          </table>        
               </div>
      </div>

<!--Rooms-->
      <div role="tabpanel" class="tab-pane fade" id="room">
            <div class="fluid-container" style="overflow: auto; padding: 0 55px;">
                                <div>
                   <table id="table" class="table table-hover">  
                            <tr id="panel-heading">
                                <th><center>Room Id </center></th>
                                <th><center>Room Type</center></th>
                                <th><center>Room Number</center></th>
                                <th><center>Room Rate</center></th>
                                <th><center>Maximum Guest Capacity</center></th>
                                <th colspan=2>Action</th>
                            </tr>
                           
                            <?php while($rows=mysqli_fetch_array($room1)) { ?>
                            <tr> 
                                <td><center><?php echo $rows['room_id']; ?></center></td>
                                <td><center><?php echo $rows['room_type_id']; ?></center></td>
                                <td><center><?php echo $rows['room_number']; ?></center></td>
                                
                                <td><center><?php echo $rows['room_rate']; ?></center></td>
                                <td><center><?php echo $rows['room_max_guest']; ?></center></td>
                                <td><?php echo '<a href="updateForRooms.php?id='.$rows['room_id'].'">Update</a>' ?></td>
                            
                                <?php } ?>
                            </tr>
                        </table>
                    </div> 
          </div>
      </div>
              

<!--Settings ni dre-->
                
    <div role="tabpanel" class="tab-pane fade" id="settings" >
     <div class="fluid-container" style="overflow: auto; padding: 0 55px;">

        <div id="roomtype">
          <h2>&nbsp Add Room Type</h2>
           <div id='room_type_Form'>
      <link rel="stylesheet" type="text/css" href="css/styles.css">
    <form method="post" style="  width: 1200px; border: 0px; float: left; columns: 2;" enctype="multipart/form-data">

      <div class="input-group">
        <label>Room Type &nbsp</label>
        <input type="text" name="room_type">
      </div>
      <br/> 
        <p><b>Number of rooms per type</b></p>
          <select id="num_of_rooms" name="num_of_rooms">
            <option name = "1">1</option>
            <option name = "2">2</option>
            <option name = "3">3</option>
            <option name = "4">4</option>
            <option name = "5">5</option>
            <option name = "6">6</option>
            <option name = "7">7</option>
            <option name = "8">8</option>
            <option name = "9">9</option>
          </select>
          <br><br>
          <div class="input-group">
            <input type="submit" name="save" value="Save" />   
          </div>

          <h2>Add Room Type Property</h2>
          <div class="input-group">
            <label>Room Number &nbsp</label>
            <input type="text" name="room_number">
          </div>

             <p><b> To Room Type : </b></p>
          <select id="to_room_type" name="to_room_type">
             <?php 
             $sqlRead = "SELECT * FROM room_type;" ;
              $readForType = mysqli_query($connect_mysql,$sqlRead);
            ?>

            <?php while ( $row = mysqli_fetch_array($readForType)) { ?>
               <option name = "select"><?php echo $row['type_id'] . " - "; echo $row['type_desc']; ?></option>
            <?php } ?>
          </select>

          <div class="input-group">
            <label>Room Rate: php &nbsp</label>
            <input type="text" name="room_rate">
          </div>
          <div class="input-group">
            <label>Guest Capacity &nbsp</label>
            <input type="text" name="guest_capacity">
          </div>
          
                <div uk-form-custom="target: true">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                    <input type="file" name="image" id="image">
                </div>
            <div class="input-group">
            <input type="submit" name="add" value="Add" />   
            </div>
        </form>
      </div>
    </div>
   
    </body>
</html>


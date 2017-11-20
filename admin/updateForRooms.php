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

  $user_id = 0;
   if(!empty($_GET['id'])){
        $user_id = $_REQUEST['id'];
    }

    if (!empty($_POST['id'] )){
        $user_id = $_POST['id'];
        echo $user_id;
      
    }



    if (isset($_POST['submitChanges'])) {
            $type = $_POST['modified_type'];
            $number = $_POST['modified_number'];
            $image = $_POST['modified_image'];
            $rate = $_POST['modified_rate'];
            $capacity = $_POST['modified_capacity'];
            $status = $_POST['status'];
            $role = $_POST['role'];

            $sqlUpdate = "UPDATE user_management SET room_type_id = $type, room_number = $number, room_image = '$image', room_rate = $rate, room_max_guest = $capacity" ;
            mysqli_query($con,$sqlUpdate);
            echo '<script> alert (" changes saved!") </script>';
          
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
          <li role="presentation" class="active"><a href=home.php><h4 id="textcolor">Back</h4></a></li>
      </ul>
      </center>
    </div>
    <div class="tab-content" style="background-color: white; color: #170a02;">
      <div role="tabpanel" class="tab-pane fade in active" id="profile" style="overflow: auto; padding: 0 55px;">
        <table id="table" class="table table-hover">
                <thead>
                  <tr id="panel-heading">
                    <th><center>Room ID </center></th>
                    <th><center>Room Type</center></th>
                    <th><center>Room Number</center></th>
                    <th><center>Room Rate</center></th>
                    <th><center>Maximum Guest Capacity</center></th>
                    </tr>
                </thead>
                <tbody>


<style>
#room_type {
  width: 250px;
  height: 30px;
}
#room_number {
  width: 250px;
  height: 30px;
}
#room_rate {
  width: 250px;
  height: 30px;
}

#max_guest {
  width: 250px;
  height: 30px;
}

#role {
  width: 100px;
  height: 30px;
}

#status {
  width: 100px;
  height: 30px;
}

</style>


     <!--           
          <?php
           $db = mysqli_connect("localhost", "root", "", "booking_system"); 
            $sql = "SELECT * FROM room_management WHERE room_id = $room_id";
              $result = mysqli_query($db, $sql);
              $data = mysqli_fetch_assoc($result);
              $name = $data['name'];
          ?>
      -->            
                <tr> 
                           
                    <td><center><?php echo $data['room_type_id']; ?></center></td>
                    <td><center><?php echo $data['room_number']; ?></center></td>
                    <td><center><?php echo $data['room_rate']; ?></center></td>
                    <td><center><?php echo $data['room_max_guest']; ?></center></td>
                            
                      
                </tr>  
                </tbody>
          </table>  
      </div>
    <div id='Modified_Form'>
      <link rel="stylesheet" type="text/css" href="css/styles.css">
      <center>
    <form method="post" style="  width: 1200px; border: 0px; columns: 2;">

      
      <div class="input-group">
        <label>Room Type &nbsp</label>
        <select id="room_type" name="room_type" ></select>
      </div>

      <div class="input-group">
        <label>Room Number &nbsp</label>
        <select id="room_number" name="room_number" ></select>
      </div> 

      <div class="input-group">
        <label>Room Rate &nbsp</label>
        <select id="room_rate" name="room_rate" ></select>
      </div>

      <div class="input-group">
        <label>Maximum Guest Capacity &nbsp</label>
         <select id="max_guest" name="max_guest" ></select>
      </div> 


      
      <div class="input-group">
        <label>Username &nbsp</label>
        <input type="text" name="modified_username" value="<?php echo $data['username']?>"><br /> 
      </div>
      <div>
        <label>Status &nbsp</label>
          <select id="status" name="status" >
            <option name = "active">Active</option>
            <option name = "not_active">Not Active</option>
            <option name = "archive">Archive</option>
          </select>
           <br><br>
        <label>Role &nbsp &nbsp</label>
          <select id="role" name="role">
            <option name = "administrator">Administrator</option>
            <option name = "user">User</option>
            <option name = "undefined">Undefined</option>
          </select>
          <br><br><br><br>
      <div class="input-group">
        <input type="submit" name="submitChanges" value="Submit" />   
      </div>

       
        </form>
        </center>
      </div> 
    </form>
  </div>
    </body>

</html>


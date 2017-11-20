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
            $name = $_POST['modified_name'];
            $email = $_POST['modified_email'];
            $mobile_number = $_POST['modified_number'];
            $address = $_POST['modified_address'];
            $username = $_POST['modified_username'];
            $status = $_POST['status'];
            $role = $_POST['role'];

            $sqlUpdate = "UPDATE user_management SET name = '$name', email = '$email', mobile_number = '$mobile_number', address = '$address', username = '$username', status = '$status', role = '$role'   WHERE user_id = '$user_id'" ;
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
                    <th>ID No.</th>
                    <th>Date Registered</th>  
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>address</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                
          <?php
           $db = mysqli_connect("localhost", "root", "", "booking_system"); 
            $sql = "SELECT * FROM user_management WHERE user_id = $user_id";
              $result = mysqli_query($db, $sql);
              $data = mysqli_fetch_assoc($result);
              $name = $data['name'];
          ?>
                        <tr> 
                            <td><?php echo $data['user_id'] ?></td>
                            <td><?php echo $data['date_registered'] ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td><?php echo $data['mobile_number'] ?></td>
                            <td><?php echo $data['address'] ?></td>
                            <td><?php echo $data['username'] ?></td>
                            <td><?php echo $data['role'] ?></td>
                            <td><?php echo $data['status'] ?></td>
                            
                      
               </tr>
                </tbody>
          </table>  
      </div>
    <div id='Modified_Form'>
      <link rel="stylesheet" type="text/css" href="css/styles.css">
      <center>
    <form method="post" style="  width: 1200px; border: 0px; columns: 2;">

      
      <div class="input-group">
        <label>Name &nbsp</label>
        <input type="text" name="modified_name" value="<?php echo $name;?>">
      </div>
      <div class="input-group">
        <label>Email &nbsp</label>
        <input type="text" name="modified_email" value="<?php echo $data['email'];?>">
      </div> 
      <div class="input-group">
        <label>Mobile Number &nbsp</label>
        <input type="text" name="modified_number" value="<?php echo $data['mobile_number'];?>">
      </div>
      <div class="input-group">
        <label>Address &nbsp</label>
        <input type="text" name="modified_address" value="<?php echo $data['address']?>">
      </div> 
      <div class="input-group">
        <label>Username &nbsp</label>
        <input type="text" name="modified_username" value="<?php echo $data['username']?>"><br /> 
      </div>
      <div>
        <p>Role</p>
          <select name="status">
            <option name = "active">Active</option>
            <option name = "not_active">Not Active</option>
            <option name = "archive">Archive</option>
          </select>
           <br><br>
        <p>Status</p>
          <select name="role">
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


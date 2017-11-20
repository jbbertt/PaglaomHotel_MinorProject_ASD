 
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="css/public.css" media="all">
  <style>
    table, th, td {
    
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
  </style>
</head>
<body>
  <div id="header">
    <h1>Paglaom Hotel</h1> &nbsp;
  </div>

<div id="main">
    <div id="navigation">
      <ul>
        <li><a href="manage_admins.php">Room Bookings</a></li>
        <li><a href="manage_admins.php">Room Management</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="manage_admins.php">Payment</a></li>
        <li><a href="manage_admins.php">Setting</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </div>

    <div id="page">
      <h2>Users</h2>
      <p>Welcome to the admin area.</p>

      <div id="unod">

<table style="width:100%">
  <tr>
    <th>Names</th>
    <th>Email</th> 
    <th>Mobile Number</th>
    <th>Address</th>
    <th>Username</th>
    <th>Password</th>
    <th>Status
  </tr>
  <tr>
    <td>Jill Aira JJJJ</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>
      
      <div class="input-group">
          <button type="submit" class="btn" name="login_user">Save</button>
        </div>
      </div>
      
    </div>

</body>
</html>

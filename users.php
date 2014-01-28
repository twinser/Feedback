<html>
<head>
<style type="text/css">
<!--
//@import url("style.css");
-->
</style>

</head>

<?php
//http://www.sudobash.net/web-dev-populate-phphtml-table-from-mysql-database/
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Users"; // Table name 
$loggedin=$_COOKIE['user_cook'];
// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$sql="SELECT UserID, Admin, Module1, Module2, Module3, Module4, Module5 FROM $tbl_name WHERE NOT UserID='$loggedin'";
$result=mysqli_query($con,$sql);
 
  echo "<table id='user-table'>";
  echo "<tr><th>Username</th><th>Admin</th><th>Module1</th><th>Module2</th><th>Module3</th><th>Module4</th><th>Module5</th><th>Edit</th><th>Delete</th></tr>";
 
  while($row = mysqli_fetch_array($result)){
 
  $userid = $row['UserID'];
  $admin = $row['Admin'];
  $mod1 = $row['Module1'];
  $mod2 = $row['Module2'];
  $mod3 = $row['Module3'];
  $mod4 = $row['Module4'];
  $mod5 = $row['Module5'];
 

echo '<tr><td>'.$userid.'</td><td>'.$admin.'</td><td>'.$mod1.'</td><td>'.$mod2.'</td><td>'.$mod3.'</td><td>'.$mod4.'</td><td>'.$mod5.'</td><td><a href="edituser.php?user='. $userid . '"> Edit </a></td><td><a href="deleteuser.php?user='. $userid . '"> Delete </a></td> </tr>';
 
} // End our while loop
echo "</table>";
?>
<body>
<p><a href ="admin_login_success.php">Back</a></p>
<p><a href ="Logout.php">Log out</a></p>
  
</body>
</html>
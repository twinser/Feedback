<?php
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Users"; // Table name 

// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$password = stripslashes($password);
$password = mysqli_real_escape_string($con,$password);
$username = stripslashes($username);
$username = mysqli_real_escape_string($con,$username);
$sql="SELECT * FROM $tbl_name WHERE UserID='$username' AND Password='$password'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Set cookie to save $username and redirect

setcookie('user_cook', $username, time()+1200);
$row = mysqli_fetch_array($result);
$admin = $row['Admin'];
setcookie('admin_cook', $admin, time()+1200);
$x = 1;
$modules = array();

while($row["Module" .$x ] != NULL)
{
$a = "Module" . $x;
$modules[] = $row[$a];
$x++;
}

$modules_size = count($modules);
setcookie('modules_cook', $modules_size, time()+1200);

for($y=0;$y<$modules_size;$y++)
  {
  $data = $modules[$y];
  $name = "module" . ($y+1) . "_cook";
  setcookie($name, $data, time()+1200);
  
  }
header("location:admin_login_success.php");
}
else {
$uname = $_POST['username'];
setcookie('entereduname_cook', $uname, time()+30);
$x=1;
setcookie('wrong_cook', $x, time()+30);
header("location:admin_login.php");
}
ob_end_flush();
?>
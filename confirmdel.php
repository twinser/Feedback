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

// passphrase sent from form 
$puserid=$_POST['UserID']; 
$guserid=$_GET['user'];

if ($puserid != $guserid)
{
echo 'Error!';
}
else
{



// To protect MySQL injection 
$puserid = stripslashes($puserid);
$puserid = mysqli_real_escape_string($con,$puserid);



mysqli_query($con,"DELETE FROM Users WHERE UserID='$puserid'");

header("location:userdeleted.php");

}?>
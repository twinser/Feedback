<?php
$q = $_GET['q'];

ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 


// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
$q = stripslashes($q);
$q = mysqli_real_escape_string($con,$q);

$sql="SELECT * FROM Quizzes WHERE Passphrase = '$q'";

$result = mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $q, table row must be 1 row
if($count==1){
echo "Passphrase already in use, please try another";
}
else{
echo "Passphrase ok";

}
 

mysqli_close($con);
?>
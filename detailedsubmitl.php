<?php

ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 


// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if (empty($_POST['Feedback'])){
setcookie('empty_cook', "empty", time()+60);
header("location:detailedfblec.php");
}
else{
$fb = $_POST['Feedback'];
$fb = stripslashes($fb);
$fb = mysqli_real_escape_string($con,$fb);
$quizid = $_COOKIE['quizid_cook'];
$today = date("Y-m-d");

mysqli_query($con,"INSERT INTO DetailedResponses (ResponseID, QuizID, DateWritten, DegreeID, Response) VALUES ('', '$quizid', '$today', NULL, '$fb')");

header("location:selectfbtypelec.php");
}
ob_end_flush();
?>
<?php
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Quizzes"; // Table name 

// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// passphrase sent from form 
$passphrase=$_POST['passphrase']; 


// To protect MySQL injection (more detail about MySQL injection)
$passphrase = stripslashes($passphrase);
$passphrase = mysqli_real_escape_string($con,$passphrase);
$sql="SELECT * FROM $tbl_name WHERE Passphrase='$passphrase'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $passphrase, table row must be 1 row
if($count==1){

// Set cookie to save $passphrase and redirect to file "login_success.
$row = mysqli_fetch_array($result);
$expiry = $row['ExpiryDate'];
$today = date("Y-m-d");
$x = 1;
if ($expiry < $today){
setcookie('expired_cook', $x, time()+30);
header("location:passphrase_login.php");
}
else
{
setcookie('passphrase_cook', $passphrase, time()+1200);

$module = $row['ModuleID'];
$lecture = $row['AfterLectureQuiz'];
$coursework = $row['Coursework'];
$topic = $row['LectureTopic'];
$quizid = $row['QuizID'];
setcookie('module_cook', $module, time()+1200);
setcookie('lecture_cook', $lecture, time()+1200);
setcookie('coursework_cook', $coursework, time()+1200);
setcookie('topic_cook', $topic, time()+1200);
setcookie('quizid_cook', $quizid, time()+1200);
header("location:login_success.php");
}


}
else {
$x=1;
setcookie('wrong_cook', $x, time()+30);
header("location:passphrase_login.php");
}
ob_end_flush();
?>
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
$quizid = $_COOKIE['quizid_cook']; 
$lecturequiz=$_POST['wholemod'];
$passphrase=$_POST['Passphrase'];
$expdate=$_POST['expdate'];
$description =$_POST['description'];


if ($lecturequiz == 1){
$cw = 'NULL';
}
else{
$cw = "'" . $_POST['cw'] . "'";
}

if ($lecturequiz == 0){
$lecturetopic = 'NULL';
}
else{
$lecturetopic = $_POST['lecturetopic'];
$lecturetopic = stripslashes($lecturetopic);
$lecturetopic = mysqli_real_escape_string($con,$lecturetopic);
$lecturetopic = "'" . $lecturetopic . "'";
}

if ($lecturequiz == 0){
$lecturedate = 'NULL';
}
else{
$lecturedate = "'" . $_POST['lecturedate'] . "'";
}




// To protect MySQL injection 
$description = stripslashes($description);
$passphrase = stripslashes($passphrase);
$description = mysqli_real_escape_string($con,$description);
$passphrase = mysqli_real_escape_string($con,$passphrase);



mysqli_query($con,"UPDATE Quizzes SET Passphrase='$passphrase', Description='$description', AfterLectureQuiz='$lecturequiz', ExpiryDate='$expdate', LectureTopic=$lecturetopic, LectureDate=$lecturedate, Coursework=$cw WHERE QuizID='$quizid'");

header("location:quizedited.php");

?>
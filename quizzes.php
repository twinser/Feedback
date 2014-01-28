<?php
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}
?>
<html>
<head>
<style type="text/css">
<!--
@import url("style.css");
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
$tbl_name="Quizzes"; // Table name 
$loggedin=$_COOKIE['user_cook'];
// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if ($_COOKIE['admin_cook'] == 1){
$sql="SELECT * FROM $tbl_name";
}
else
{
$mod1 = $_COOKIE['module1_cook'];
$mod2 = $_COOKIE['module2_cook'];
$mod3 = $_COOKIE['module3_cook'];
$mod4 = $_COOKIE['module4_cook'];
$mod5 = $_COOKIE['module5_cook'];
$mods = $_COOKIE['modules_cook'];
switch ($mods)
{
case "1":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1'";
break;
case "2";
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2'";
break;
case "3":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' OR ModuleID='$mod3'";
break;
case "4":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' OR ModuleID='$mod3' OR ModuleID='$mod4'";
break;
case "5":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' OR ModuleID='$mod3' OR ModuleID='$mod4' OR ModuleID='$mod5'";
break;
default:
$sql="SELECT * FROM $tbl_name";
}
}
$result=mysqli_query($con,$sql);
 
  echo "<table id='quiz-table'>";
  echo "<tr><th>Quiz ID</th><th>Module Code</th><th>Passphrase</th><th>Description</th><th>Lecture Quiz</th><th>Date Added</th><th>Expiry Date</th><th>Lecture Topic</th><th>Lecture Date</th><th>Coursework</th><th>View Results</th><th>Edit</th></tr>";
 
  while($row = mysqli_fetch_array($result)){
 
  $quizid = $row['QuizID'];
  $modid = $row['ModuleID'];
  $passphrase = $row['Passphrase'];
  $desc = $row['Description'];
  $lectquiz = $row['AfterLectureQuiz'];
  $dateadded = $row['DateAdded'];
  $exp = $row['ExpiryDate'];
  $lecturetopic = $row['LectureTopic'];
  $lecturedate = $row['LectureDate'];
  $cwork = $row['Coursework'];
  
  if ($lectquiz == 0)
  {
  $lecturequiz = "No";
  $lecturetopic = "-";
  $lecturedate = "-";
  }
  else
  {
  $lecturequiz = "Yes";
  }
  if ($cwork == 1)
  {
  $coursework = "Yes";
  }
  else
  {
  $coursework = "No";
  }
  if ($exp == "0000-00-00" || $exp == NULL)
  {
  $expiry = "None";
  }
  else
  {
  $expiry = $exp;
  }
 
 

echo '<tr><td>'.$quizid.'</td><td>'.$modid.'</td><td>'.$passphrase.'</td><td>'.$desc.'</td><td>'.$lecturequiz.'</td><td>'.$dateadded.'</td><td>'.$expiry.'</td><td>'.$lecturetopic.'</td><td>'.$lecturedate.'</td><td>'.$coursework.'</td><td><a href="results.php?quiz='. $quizid . '"> View Results </a></td><td><a href="editquiz.php?quiz='. $quizid . '"> Edit </a></td></tr>';
 
} // End our while loop
echo "</table>";

?>
<body>
<p><a href ="admin_login_success.php">Back</a></p>
<p><a href ="Logout.php">Log out</a></p>
  
</body>
</html>
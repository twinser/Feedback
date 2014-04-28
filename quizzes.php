<?php
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<title>Surveys</title>
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet"> 
<link href="css/main.css" rel="stylesheet"> 

</head>
<body class="users-table">
<h1 class="text-primary"><strong>Surveys</strong> <small>Surveys are shown in order of Module Code. Click a column header to order by that criteria.</small></h1>

<div class="table-responsive"> 
<table class ="table table-hover table-condensed table-bordered sortable" id="quiz-table">
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
$sql="SELECT * FROM $tbl_name ORDER BY ModuleID,DateAdded";
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
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' ORDER BY ModuleID,DateAdded";
break;
case "2";
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' ORDER BY ModuleID,DateAdded";
break;
case "3":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' OR ModuleID='$mod3' ORDER BY ModuleID,DateAdded";
break;
case "4":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' OR ModuleID='$mod3' OR ModuleID='$mod4' ORDER BY ModuleID,DateAdded";
break;
case "5":
$sql="SELECT * FROM $tbl_name WHERE ModuleID='$mod1' OR ModuleID='$mod2' OR ModuleID='$mod3' OR ModuleID='$mod4' OR ModuleID='$mod5' ORDER BY ModuleID,DateAdded";
break;
default:
$sql="SELECT * FROM $tbl_name ORDER BY ModuleID,DateAdded";
}
}
$result=mysqli_query($con,$sql);
 

  echo "<thead><tr><th>Quiz ID</th><th>Module Code</th><th>Passphrase</th><th>Description</th><th>Lecture Quiz</th><th>Date Added</th><th>Expiry Date</th><th>Lecture Topic</th><th>Lecture Date</th><th>Coursework</th><th> </th></tr></thead><tbody>";
 
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
 
 

echo '<tr><td>'.$quizid.'</td><td>'.$modid.'</td><td>'.$passphrase.'</td><td>'.$desc.'</td><td>'.$lecturequiz.'</td><td>'.$dateadded.'</td><td>'.$expiry.'</td><td>'.$lecturetopic.'</td><td>'.$lecturedate.'</td><td>'.$coursework.'</td><td><a class="btn btn-info btn-xs" href="results.php?quiz='. $quizid . '" role="button">View Results</a> <a class="btn btn-warning btn-xs" href="editquiz.php?quiz='. $quizid . '" role="button">Edit</a></td></tr>';
 
} // End our while loop


?>
</tbody>
</table>
</div>
<p> <a class="btn btn-warning" href="admin_login_success.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>

<script src="sorttable.js"></script>
</body>
</html>
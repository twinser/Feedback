<?php
$empties = False;
 
if (empty($_POST['q1']) || empty($_POST['q2']) || empty($_POST['q3']) || empty($_POST['q4']) || empty($_POST['q5']) 
|| empty($_POST['q6']) || empty($_POST['q7']) || empty($_POST['q8']) || empty($_POST['q9']))
	  { 
	  	$empties = True;
	  	
	  }
if (($_POST['q7'] == 1 && empty($_POST['q7b'])) || ($_POST['q8'] == 1 && empty($_POST['q8b'])) || ($_POST['q9'] == 1 && (empty($_POST['q9b']) || empty($_POST['q9c'])))){
$empties = True;
}


if ($empties == True)
{
$a = 1;
setcookie('missing_cook', $a, time()+10);
setcookie('9c_cook', $_POST['q9c'], time()+10);
for($x=1; $x<10; $x++){
$cook = $x . "_cook";
$posted = "q". $x ;
$answer = $_POST[$posted];
setcookie($cook, $answer, time()+10);
}
for($x=7; $x<10; $x++){
$cook = $x . "b_cook";
$posted = "q". $x ."b" ;
$answer = $_POST[$posted];
setcookie($cook, $answer, time()+10);
}

header("location:lecture_quiz.php");
}
else
{

ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="QuizResponses"; // Table name 

// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


 
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$quizid = $_COOKIE['quizid_cook'];
$today = date("Y-m-d");

if ($q7 != 1){
$q7b = 'NULL'; }
else {
$q7b = "'" . $_POST['q7b'] . "'";
 }
 
if ($q8 != 1){
$q8b = 'NULL'; }
else {
$q8b = "'" . $_POST['q8b'] . "'";
 }
 
if ($q9 != 1){
$q9b = 'NULL'; }
else {
$q9b = "'" . $_POST['q9b'] . "'";
 }
 

if ($q9 != 1){
$q9c = 'NULL'; }
else {
$q9c = "'" . $_POST['q9c'] . "'";
 } 
$q10 = 'NULL';
mysqli_query($con,"INSERT INTO QuizResponses (ResponseID, QuizID, DateTaken, DegreeID, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q7b, Q8, Q8b, Q9, Q9b, Q9c, Q10) VALUES ('', '$quizid', '$today', NULL, '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', $q7b, '$q8', $q8b, '$q9', $q9b, $q9c, $q10)");

ob_end_flush();
setcookie('missing_cook', "", time()-9999);
setcookie('9c_cook', "", time()-9999);
for($x=1; $x<10; $x++){
$cook = $x . "_cook";
setcookie($cook, "", time()-9999);
}
for($x=7; $x<10; $x++){
$cook = $x . "b_cook";
setcookie($cook, "", time()-9999);
}
}
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Survey Submitted</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

</head>
<body>
<div class="container">
<h1 class="text-primary pull-left">
<?php
echo $_COOKIE['module_cook'] ;
?>
</h1><h1 class="text-success"> Lecture Feedback </h1>
<h1 class="text-info">
<?php
echo $_COOKIE['topic_cook'] ;
?>
</h1>
<br>
<h4>Choose to give detailed feedback or, if you are done, click the finished button </h4>
<p><a class="btn btn-default btn-lg" href="detailedfblec.php" role="button">Give detailed feedback </a></p>
<p><a class="btn btn-success" href="Logout.php" role="button">Finished</a> </p></div>
</body>
</html>
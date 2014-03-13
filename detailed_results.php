<?php
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}

ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$quizid = $_GET['quiz'];

$loggedin=$_COOKIE['user_cook'];
// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT * FROM Quizzes WHERE QuizID=$quizid";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$lecture = $row['AfterLectureQuiz'];
$module = $row['ModuleID'];
$date = $row['LectureDate'];
$passphrase = $row['Passphrase'];
ob_end_flush();
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> <meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<link href="css/bootstrap.min.css" rel="stylesheet"> 
<link href="css/main.css" rel="stylesheet"> 
</head> 

<body class="users-table"> 
<?php
if ($lecture = 1){
echo '<h1 class="text-primary">Detailed Comments - '.$module.' - Passphrase: '.$passphrase.' - Lecture on '.$date.'</h1>';
}
else {
echo '<h1 class="text-primary">Detailed Comments - '.$module.' - Passphrase: '.$passphrase.'</h1>';
}
?>
<div class="table-responsive"> 
<table class="comment-table table-hover table-condensed table-bordered sortable" id='comments-table'>

<?php
//http://www.sudobash.net/web-dev-populate-phphtml-table-from-mysql-database/
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



$sql="SELECT * FROM DetailedResponses WHERE QuizID=$quizid";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
echo "<thead><tr><th>Date Written</th><th>Comments</th><tbody>";
if ($count > 0){

  while($row = mysqli_fetch_array($result)){
 
  $comment = $row['Response'];
  $datewritten = $row['DateWritten'];
  
 

echo '<tr><td>'.$datewritten.'</td><td>'.$comment.'</td></tr>';
 }
}

else {
echo '<tr><td>-</td><td>None</td></tr>';
}
 // End our while loop
ob_end_flush();
?>
</tbody>
</table>
</div>
<p> <a class="btn btn-warning" href="admin_login_success.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
<script src="sorttable.js"></script>
  
</body>
</html>
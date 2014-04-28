<?php
//check user is logged in
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}

else{
$quizid = $_GET['quiz'];
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
}
  
$sql = "SELECT * FROM Quizzes WHERE QuizID = '$quizid'";
$result=mysqli_query($con,$sql);  
$row = mysqli_fetch_array($result);
setcookie('quizid_cook', $quizid, time()+120);
$module = $row['ModuleID'];
//check user has access to module, if not send them to the surveys page
if ($_COOKIE['admin_cook'] == 0)
{
if ($_COOKIE['module1_cook'] != $module)
{
if ($_COOKIE['module2_cook'] != $module)
{
if ($_COOKIE['module3_cook'] != $module)
{
if ($_COOKIE['module4_cook'] != $module)
{
if ($_COOKIE['module5_cook'] != $module)
{
header("location:quizzes.php");
}
}
}
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Edit Survey</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<script src="datetimepicker_css.js">
//Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
//Script featured on JavaScript Kit (http://www.javascriptkit.com)
//For this script, visit http://www.javascriptkit.com 
</script>
</head>
<body>
<!--Lots of php to follow, essentially fills the fields with the database record-->
<div class='container'>
<h1>
Edit quiz <?php echo $row['QuizID'] . ' - ' .  $row['ModuleID'] ?>
</h1>
<h3>
<b>Quiz passphrase:</b> <i><?php echo $row['Passphrase'];?></i> <br><small>Quiz created on <?php echo $row['DateAdded'] ?></small>
</h3>

<form role="form" name="form6" method="post" action="checkeditquiz.php">

<h3><b>Type of feedback survey:</b> <i><?php if ($row['AfterLectureQuiz'] == 1) { echo "Single Lecture Feedback"; } else {echo "Whole Module Feedback";} ?></i></h3>
<p style="display: none;"><b>Single Lecture Feedback </b> <input type="radio" name="wholemod"  value="1" onclick="lecture()" <?php if ($row['AfterLectureQuiz'] == 1) { echo checked; } ?> disabled> <br>
<b>Whole Module Feedback </b> <input type="radio" name="wholemod" value="0" onclick="module()"  <?php if ($row['AfterLectureQuiz'] == 0) { echo checked; } ?> disabled> </p>
<h3>Edit the description or expiry date<br><small>Date Format: YYYY-MM-DD</small></h3>
<p style="display: none;"><b>Passphrase:</b> <input name="Passphrase" type="text" id="Passphrase" <?php echo 'value="'.$row['Passphrase'].'"';?> READONLY></p>
<p><b>Brief Description:</b> <input name="description" type="text" id="description" <?php echo 'value="'.$row['Description'].'"';?>></p>
<p><b>Expiry Date:</b><input id="expdate" type="text" name="expdate" <?php echo 'value="'.$row['ExpiryDate'].'"';?> ><img src="images/cal.gif" onclick="javascript:NewCssCal('expdate', 'yyyyMMdd','','','','','future')" style="cursor:pointer"/></p>
<h3 id="cworkhead" <?php if ($row['AfterLectureQuiz'] == 1) { echo 'style="display: none;"'; } ?>>Does this module have coursework?</h3>
<p id="coursework" <?php if ($row['AfterLectureQuiz'] == 1) { echo 'style="display: none;"'; } ?>>
<b>Yes<input type="radio" name="cw"  value="1" <?php if ($row['Coursework'] == 1) { echo checked; } ?>> No</b><input type="radio" name="cw" value="0" <?php if ($row['Coursework'] == 0) { echo checked; } ?>> </p>
<h3 id="lechead" <?php if ($row['AfterLectureQuiz'] == 0) { echo 'style="display: none;"'; } ?>>Change lecture topic or date <br><small>Date Format: YYYY-MM-DD</small></h3>
<p id="lectopic" <?php if ($row['AfterLectureQuiz'] == 0) { echo 'style="display: none;"'; } ?>><b>Lecture Topic:</b><input name="lecturetopic" type="text" id="lecturetopic"<?php echo 'value="'.$row['LectureTopic'].'"';?>></p>
<p id="lecdate" <?php if ($row['AfterLectureQuiz'] == 0) { echo 'style="display: none;"'; } ?>><b>Lecture Date:</b><input name="lecturedate" type="text" id="lecturedate"<?php echo 'value="'.$row['LectureDate'].'"';?>><img src="images/cal.gif" onclick="javascript:NewCssCal('lecturedate', 'yyyyMMdd')" style="cursor:pointer"/></p>

<p><button type="submit" class="btn btn-default" name="SubmitEditQuiz" id="SubmitEditQuiz" value="Submit">Submit</button></p>
<br>
</form>
<p> <a class="btn btn-warning" href="quizzes.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
</div>

</body>
</html>
<?php ob_end_flush(); ?>
<?php
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
<body onload="show('cw')">
<div class='container'>
<h1>
Edit quiz <?php echo $row['QuizID'] . ' - ' .  $row['ModuleID'] ?>
</h1>
<h3>
Quiz created on <?php echo $row['DateAdded'] ?>
</h3>

<form role="form" name="form6" method="post" action="checkeditquiz.php">

<p><b>Feedback Type:</b></p>
<p>Single Lecture Feedback<input type="radio" name="wholemod"  value="1" onclick="lecture()" <?php if ($row['AfterLectureQuiz'] == 1) { echo checked; } ?> disabled> <br>
Whole Module Feedback<input type="radio" name="wholemod" value="0" onclick="module()"  <?php if ($row['AfterLectureQuiz'] == 0) { echo checked; } ?> disabled> </p>

<p><b>Passphrase:</b> <input name="Passphrase" type="text" id="Passphrase" <?php echo 'value="'.$row['Passphrase'].'"';?> READONLY></p>
<p><b>Brief Description:</b> <input name="description" type="text" id="description" <?php echo 'value="'.$row['Description'].'"';?>></p>
<p><b>Expiry Date:</b><input id="expdate" type="text" name="expdate" <?php echo 'value="'.$row['ExpiryDate'].'"';?> ><img src="images/cal.gif" onclick="javascript:NewCssCal('expdate', 'yyyyMMdd','','','','','future')" style="cursor:pointer"/></p>

<p id="coursework" <?php if ($row['AfterLectureQuiz'] == 1) { echo 'style="display: none;"'; } ?>><b>Does this module have coursework?</b><br>
Yes<input type="radio" name="cw"  value="1" <?php if ($row['Coursework'] == 1) { echo checked; } ?>> No<input type="radio" name="cw" value="0" <?php if ($row['Coursework'] == 0) { echo checked; } ?>> </p>

<p id="lectopic" <?php if ($row['AfterLectureQuiz'] == 0) { echo 'style="display: none;"'; } ?>><b>Lecture Topic:</b><input name="lecturetopic" type="text" id="lecturetopic"<?php echo 'value="'.$row['LectureTopic'].'"';?>></p>
<p id="lecdate" <?php if ($row['AfterLectureQuiz'] == 0) { echo 'style="display: none;"'; } ?>><b>Lecture Date:</b><input name="lecturedate" type="text" id="lecturedate"<?php echo 'value="'.$row['LectureDate'].'"';?>><img src="images/cal.gif" onclick="javascript:NewCssCal('lecturedate', 'yyyyMMdd')" style="cursor:pointer"/></p>

<p><button type="submit" class="btn btn-default" name="SubmitEditQuiz" id="SubmitEditQuiz" value="Submit">Submit</button></p>
<br>
</form>
<p> <a class="btn btn-warning" href="admin_login_success.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
</div>

<script type="text/javascript">

  function show(id){ 
   document.getElementById(id).style.display='block';
  } 
</script>
<script type="text/javascript">

  function hide(id){ 
   document.getElementById(id).style.display='none';
  }
  </script>
  <script type="text/javascript">
  function lecture(){
  hide('cw');
  show('lectopic');
  show('lecdate');
  }
  </script>
  <script type="text/javascript">
  function module(){
  show('cw');
  hide('lectopic');
  hide('lecdate');
  }
  </script>
</body>
</html>
<?php ob_end_flush(); ?>
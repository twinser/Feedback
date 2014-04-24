<?php
$empties = False;
 
if (empty($_POST['modules']) || empty($_POST['Passphrase']) || empty($_POST['description']))
	  { 
	  	$empties = True;
	  	
	  	
	  }
if ($_POST['lecfbk'] == 1 && empty($_POST['lecturetopic'])) {
$empties = True;
	  	
	  		  
}
if ($_POST['lecfbk'] == 1 && empty($_POST['lecturedate'])){
$empties = True;


}


if ($empties == True)
{

$a = 1;
setcookie('missing_cook', $a, time()+10);
setcookie('modules_mcook', $_POST['modules'], time()+10);
setcookie('passphrase_mcook', $_POST['Passphrase'], time()+10);
setcookie('description_mcook', $_POST['description'], time()+10);
setcookie('expdate_mcook', $_POST['expdate'], time()+10);
setcookie('lecfbk_mcook', $_POST['lecfbk'], time()+10);
setcookie('lecturetopic_mcook', $_POST['lecturetopic'], time()+10);
setcookie('lecturedate_mcook', $_POST['lecturedate'], time()+10);
setcookie('cw_mcook', $_POST['cw'], time()+10);

header("location:newquiz.php");
}


else
{

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
$moduleid=$_POST['modules']; 
$lecturequiz=$_POST['lecfbk'];
$passphrase=$_POST['Passphrase'];
$expdate=$_POST['expdate'];
$description =$_POST['description'];
$today = date("Y-m-d");

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




mysqli_query($con,"INSERT INTO Quizzes (QuizID, ModuleID, Passphrase, Description, AfterLectureQuiz, DateAdded, ExpiryDate, LectureTopic, LectureDate, Coursework) VALUES ( '', '$moduleid', '$passphrase', '$description', '$lecturequiz', '$today' , '$expdate', $lecturetopic, $lecturedate, $cw)");
echo "<html><head><META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=quizzes.php\"></head><body onload=\"javascript:window.alert('Survey added!')\"> </body></html>";
}

?>
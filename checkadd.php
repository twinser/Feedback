<?php
$empties = False;
 
if (empty($_POST['UserID']) || empty($_POST['Password']) || empty($_POST['module1']))
	  { 
	  	$empties = True;
	  }



if ($empties == True)
{

$a = 1;
setcookie('missing_cook', $a, time()+10);
setcookie('userid_mcook', $_POST['UserID'], time()+10);
setcookie('password_mcook', $_POST['Password'], time()+10);
setcookie('mod1_mcook', $_POST['module1'], time()+10);
setcookie('mod2_mcook', $_POST['module2'], time()+10);
setcookie('mod3_mcook', $_POST['module3'], time()+10);
setcookie('mod4_mcook', $_POST['module4'], time()+10);
setcookie('mod5_mcook', $_POST['module5'], time()+10);

header("location:adduser.php");
}


else
{
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Users"; // Table name 

// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// passphrase sent from form 
$userid=$_POST['UserID']; 
$password=$_POST['Password'];
$admin=$_POST['admin'];

if (empty($_POST['module1'])){
$mod1 = 'NULL'; }
else {
$mod1 = "'" . $_POST['module1'] . "'";
 } 
if (empty($_POST['module2'])){
$mod2 = 'NULL'; }
else {
$mod2 = "'" . $_POST['module2'] . "'";
 } 
if (empty($_POST['module3'])){
$mod3 = 'NULL'; }
else {
$mod3 = "'" . $_POST['module3'] . "'";
 } 
if (empty($_POST['module4'])){
$mod4 = 'NULL'; }
else {
$mod4 = "'" . $_POST['module4'] . "'";
 } 
if (empty($_POST['module5'])){
$mod5 = 'NULL'; }
else {
$mod5 = "'" . $_POST['module5'] . "'";
 } 



// To protect MySQL injection 
$userid = stripslashes($userid);
$password = stripslashes($password);
$userid = mysqli_real_escape_string($con,$userid);
$password = mysqli_real_escape_string($con,$password);


mysqli_query($con,"INSERT INTO Users (UserID, Password, Admin, Module1, Module2, Module3, Module4, Module5) VALUES ( '$userid', '$password', '$admin', $mod1, $mod2, $mod3, $mod4, $mod5)");

header("location:useradded.php");
}
?>
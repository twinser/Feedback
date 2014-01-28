<?php
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

if ($admin == 1){
$mod1 = 'NULL';
$mod2 = 'NULL';
$mod3 = 'NULL';
$mod4 = 'NULL';
$mod5 = 'NULL';
}

// To protect MySQL injection 
$userid = stripslashes($userid);
$password = stripslashes($password);
$userid = mysqli_real_escape_string($con,$userid);
$password = mysqli_real_escape_string($con,$password);


mysqli_query($con,"UPDATE Users SET Password='$password', Admin='$admin', Module1=$mod1, Module2=$mod2, Module3=$mod3, Module4=$mod4, Module5=$mod5 WHERE UserID='$userid'");

header("location:useredited.php");

?>
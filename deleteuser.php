<?php
if($_COOKIE['admin_cook'] != 1)
{
header("location:admin_login_success.php");
}

else{
$userid = $_GET['user'];
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Users"; // Table name 
$loggedin=$_COOKIE['user_cook'];
// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$sql="SELECT UserID, Admin FROM $tbl_name WHERE UserID='$userid'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$admin = $row['Admin'];

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
<body>

<h1> Are you sure you want to delete <?php echo $userid; ?>? </h1>
<p> This user is listed as <?php if ($admin != 1){ echo 'a lecturer';} else {echo 'an administrator';}?>.</p>
<p>Enter the username again in the box below to confirm</p>
<p><form name="form6" method="post" action=<?php echo '"confirmdel.php?user='. $userid .'"' ?>>
<input name="UserID" type="text" id="UserID"><br>
<input type="submit" name="SubmitDelUser" value="Submit"></p><br>
</form>
<p><a href="users.php">Cancel and go back</a>

</body>
</html>
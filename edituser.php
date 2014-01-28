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



$sql="SELECT UserID, Password, Admin, Module1, Module2, Module3, Module4, Module5 FROM $tbl_name WHERE UserID='$userid'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$password = $row['Password'];
$admin = $row['Admin'];
$mod1 = $row['Module1'];
$mod2 = $row['Module2'];
$mod3 = $row['Module3'];
$mod4 = $row['Module4'];
$mod5 = $row['Module5'];
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
<body onload="showall()">
<h1>
Edit user
</h1>
<form name="form5" method="post" action="checkedit.php">
<p><h3> User type </h3>
Lecturer <input type="radio" name="admin"  value="0" onclick="showall()" <?php if ($admin == 0){ echo 'checked';} ?> > <br>
Admin   <input type="radio" name="admin" value="1" onclick="hideall()" <?php if ($admin == 1){ echo 'checked';} ?> > </p>
<p>Username <input name="UserID" type="text" id="UserID" <?php echo 'value="'.$userid.'"';?> READONLY><br>
Password <input name="Password" type="password" id="Password" <?php echo 'value="'.$password.'"';?>></p>

<select name="module1" id="module1" style="display: none;">
<option value="" selected disabled>Module 1</option>
<?php 

$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($code == $mod1){
echo 'selected';
}
echo '>' .$code .' - '. $name . '</option>';
}

?>
</select>
<select name="module2" id="module2" style="display: none;">
<option value="" selected disabled>Module 2</option>
<?php 
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($code == $mod2){
echo 'selected';
}
echo '>' .$code .' - '. $name . '</option>';
}
?>
</select>
<select name="module3" id="module3" style="display: none;">
<option value="" selected disabled>Module 3</option>
<?php 

$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($code == $mod3){
echo 'selected';
}
echo '>' .$code .' - '. $name . '</option>';
}
?>
</select>
<select name="module4" id="module4" style="display: none;">
<option value="" selected disabled>Module 4</option>
<?php 
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($code == $mod4){
echo 'selected';
}
echo '>' .$code .' - '. $name . '</option>';
}
?>
</select>
<select name="module5" id="module5" style="display: none;">
<option value="" selected disabled>Module 5</option>
<?php 
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($code == $mod5){
echo 'selected';
}
echo '>' .$code .' - '. $name . '</option>';
}
?>
</select>
<p><input type="submit" name="SubmitEditUser" value="Submit"></p><br>
</form>

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
  function showall(){
  show('module1');
  show('module2');
  show('module3');
  show('module4');
  show('module5');
  }
  </script>
  <script type="text/javascript">
  function hideall(){
  hide('module1');
  hide('module2');
  hide('module3');
  hide('module4');
  hide('module5');
  }
  </script>
  <p><a href ="users.php">Back</a></p>
  <p><a href ="Logout.php">Log out</a></p>
</body>
</html>
<?php ob_end_flush(); ?>
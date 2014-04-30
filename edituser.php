<?php
//check if admin
if($_COOKIE['admin_cook'] != 1)
{
header("location:admin_login_success.php");
}
elseif($_COOKIE['user_cook'] == $_GET['user'])
{
header( "refresh:3;url=users.php" );
echo "You can't edit yourself! Ask another admin. Redirecting now";
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
//select the user we are editing from the db
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
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit User</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

</head>
<body onload="Load()">
<div class="container">
<h1>
<b>Edit user:</b> <i><?php echo $userid;?></i>
</h1>
<form role="form" name="form5" method="post" action="checkedit.php">
<h3>Change the user type <br><small>Admins have access to all modules and users. Lecturers have access only to the specified modules</small></h3>
<p>Lecturer <input type="radio" name="admin"  value="0" onclick="showall()" <?php if ($admin == 0){ echo 'checked';} ?> > <br>
Admin   <input type="radio" name="admin" value="1" onclick="hideall()" <?php if ($admin == 1){ echo 'checked';} ?> > </p>
<p style="display: none;">Username <input name="UserID" type="text" id="UserID" <?php echo 'value="'.$userid.'"';?> READONLY><br>
<h3>Change the password<br><small>Delete the existing characters and type the new password, if desired</small></h3>
Password <input name="Password" type="password" id="Password" <?php echo 'value="'.$password.'"';?>></p>
<h3 name="modules" id="modules" style="display: none;">Select up to five modules <br><small>You cannot select the same module twice. To deselect a module, pick the option at the top of the list (-)</small></h3>
<select name="module1" id="module1" style="display: none;" onChange="disableOptions1(this.selectedIndex)">
<!-- Create new dropdown box, same comments apply to the other 4 as well-->
<option value="">-</option>
<?php 
//select all the modules
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);

//put all of the modules in the drop down box
while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
//if the module is one that applies to the lecturer, select it
if ($code == $mod1){
echo 'selected';
}
echo '>' .$code .' - '. $name . '</option>';
}

?>
</select>
<select name="module2" id="module2" style="display: none;" onChange="disableOptions2(this.selectedIndex)">
<option value="">-</option>
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
<select name="module3" id="module3" style="display: none;" onChange="disableOptions3(this.selectedIndex)">
<option value="">-</option>
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
<select name="module4" id="module4" style="display: none;" onChange="disableOptions4(this.selectedIndex)">
<option value="">-</option>
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
<select name="module5" id="module5" style="display: none;" onChange="disableOptions5(this.selectedIndex)">
<option value="">-</option>
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
<br>
<button type="submit" class="btn btn-default" name="SubmitEditUser" id="SubmitEditUser" value="Submit">Submit</button></p>
<br>
</form>
<br>
<p> <a class="btn btn-warning" href="users.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
</div>
<script type="text/javascript">
<!--function to show a certain element of the page-->
  function show(id){ 
   document.getElementById(id).style.display='block';
  } 
</script>
<script type="text/javascript">
<!--function to hide a certain element of the page-->
  function hide(id){ 
   document.getElementById(id).style.display='none';
  }
  </script>
  <script type="text/javascript">
  <!--function to show certain elements of the page-->
  function showall(){
  show('module1');
  show('module2');
  show('module3');
  show('module4');
  show('module5');
  show('modules');
  }
  </script>
  <script type="text/javascript">
  <!--function to hide certain elements of the page-->
  function hideall(){
  hide('module1');
  hide('module2');
  hide('module3');
  hide('module4');
  hide('module5');
  hide('modules');
  }
  </script>
  
  <script type="text/javascript">
  <!--Function to disable the selected option in the rest of the drop down boxes, same functions exist for the other boxes-->
function disableOptions1(x) {
//variable prev is equal to the global prev1
pre1 = window.prev1;
//reset prev1 so it now contains the new value
window.prev1 = x;
  //If user has selected "-"
  if (x === 0){
  for (var i=1;i<document.getElementById('module2').length;i++)
  {
  //go through all each drop down and enable all options
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }
  //make sure "-" is selected on each dropdown
  document.getElementById('module2').options[0].selected = true;
  document.getElementById('module3').options[0].selected = true;
  document.getElementById('module4').options[0].selected = true;
  document.getElementById('module5').options[0].selected = true;
  }
  //otherwise, user has selected another option
  else
  {
  //go through and re-enable the previously selected option
  document.getElementById('module1').options[pre1].disabled = false;
  document.getElementById('module2').options[pre1].disabled = false;
  document.getElementById('module3').options[pre1].disabled = false;
  document.getElementById('module4').options[pre1].disabled = false;
  document.getElementById('module5').options[pre1].disabled = false;
  
  //disable the newly selected option
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  
  
  }
}
  </script>
<script type="text/javascript">
function disableOptions2(x) {
//variable pren is equal to the global pren, where n is the number of the dropdown box
//e.g. pre2 is the previous from dd box 2
pre2 = window.prev2;
pre3 = window.prev3;
pre4 = window.prev4;
pre5 = window.prev5;
//reset prev2 so it now contains the new value
window.prev2 = x;
  //If user has selected "-"
  if (x === 0){
   
  //go through and re-enable the previously selected option for each dd box from this one down
  //dd2
  document.getElementById('module1').options[pre2].disabled = false;
  document.getElementById('module2').options[pre2].disabled = false;
  document.getElementById('module3').options[pre2].disabled = false;
  document.getElementById('module4').options[pre2].disabled = false;
  document.getElementById('module5').options[pre2].disabled = false;
  //dd3
  document.getElementById('module1').options[pre3].disabled = false;
  document.getElementById('module2').options[pre3].disabled = false;
  document.getElementById('module3').options[pre3].disabled = false;
  document.getElementById('module4').options[pre3].disabled = false;
  document.getElementById('module5').options[pre3].disabled = false;
  //dd4
  document.getElementById('module1').options[pre4].disabled = false;
  document.getElementById('module2').options[pre4].disabled = false;
  document.getElementById('module3').options[pre4].disabled = false;
  document.getElementById('module4').options[pre4].disabled = false;
  document.getElementById('module5').options[pre4].disabled = false;
  //dd5
  document.getElementById('module1').options[pre5].disabled = false;
  document.getElementById('module2').options[pre5].disabled = false;
  document.getElementById('module3').options[pre5].disabled = false;
  document.getElementById('module4').options[pre5].disabled = false;
  document.getElementById('module5').options[pre5].disabled = false;
  
  //make sure "-" is selected on the below dropdowns  
  document.getElementById('module3').options[0].selected = true;
  document.getElementById('module4').options[0].selected = true;
  document.getElementById('module5').options[0].selected = true;
  }
  //otherwise, user has selected another option
  else
  {
  //go through and re-enable the previously selected option
  document.getElementById('module1').options[pre2].disabled = false;
  document.getElementById('module2').options[pre2].disabled = false;
  document.getElementById('module3').options[pre2].disabled = false;
  document.getElementById('module4').options[pre2].disabled = false;
  document.getElementById('module5').options[pre2].disabled = false;
  
  //disable the newly selected option
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
  </script>
  
<script type="text/javascript">
function disableOptions3(x) {
//variable pren is equal to the global pren, where n is the number of the dropdown box
//e.g. pre3 is the previous from dd box 3
pre3 = window.prev3;
pre4 = window.prev4;
pre5 = window.prev5;
//reset prev3 so it now contains the new value
window.prev3 = x;
  //If user has selected "-"
  if (x === 0){
  //go through and re-enable the previously selected option for each dd box from this one down
  //dd3
  document.getElementById('module1').options[pre3].disabled = false;
  document.getElementById('module2').options[pre3].disabled = false;
  document.getElementById('module3').options[pre3].disabled = false;
  document.getElementById('module4').options[pre3].disabled = false;
  document.getElementById('module5').options[pre3].disabled = false;
  //dd4
  document.getElementById('module1').options[pre4].disabled = false;
  document.getElementById('module2').options[pre4].disabled = false;
  document.getElementById('module3').options[pre4].disabled = false;
  document.getElementById('module4').options[pre4].disabled = false;
  document.getElementById('module5').options[pre4].disabled = false;
  //dd5
  document.getElementById('module1').options[pre5].disabled = false;
  document.getElementById('module2').options[pre5].disabled = false;
  document.getElementById('module3').options[pre5].disabled = false;
  document.getElementById('module4').options[pre5].disabled = false;
  document.getElementById('module5').options[pre5].disabled = false;
  
  //make sure "-" is selected on the below dropdowns
  document.getElementById('module4').options[0].selected = true;
  document.getElementById('module5').options[0].selected = true;
  }
  //otherwise, user has selected another option
  else
  {
  //go through and re-enable the previously selected option
  document.getElementById('module1').options[pre3].disabled = false;
  document.getElementById('module2').options[pre3].disabled = false;
  document.getElementById('module3').options[pre3].disabled = false;
  document.getElementById('module4').options[pre3].disabled = false;
  document.getElementById('module5').options[pre3].disabled = false;
  
  //disable the newly selected option
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
</script>

<script type="text/javascript">
function disableOptions4(x) {
//variable pren is equal to the global pren, where n is the number of the dropdown box
//e.g. pre4 is the previous from dd box 4
pre4 = window.prev4;
pre5 = window.prev5;
//reset prev4 so it now contains the new value
window.prev4 = x;
  //If user has selected "-"
  if (x === 0){
  
  //go through and re-enable the previously selected option for each dd box from this one down
  //dd4
  document.getElementById('module1').options[pre4].disabled = false;
  document.getElementById('module2').options[pre4].disabled = false;
  document.getElementById('module3').options[pre4].disabled = false;
  document.getElementById('module4').options[pre4].disabled = false;
  document.getElementById('module5').options[pre4].disabled = false;
  //dd5
  document.getElementById('module1').options[pre5].disabled = false;
  document.getElementById('module2').options[pre5].disabled = false;
  document.getElementById('module3').options[pre5].disabled = false;
  document.getElementById('module4').options[pre5].disabled = false;
  document.getElementById('module5').options[pre5].disabled = false;
  
  //make sure "-" is selected on the below dropdowns
  document.getElementById('module5').options[0].selected = true;
  }
  //otherwise, user has selected another option
  else
  {
  //go through and re-enable the previously selected option
  document.getElementById('module1').options[pre4].disabled = false;
  document.getElementById('module2').options[pre4].disabled = false;
  document.getElementById('module3').options[pre4].disabled = false;
  document.getElementById('module4').options[pre4].disabled = false;
  document.getElementById('module5').options[pre4].disabled = false;
  
  //disable the newly selected option
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
</script>

<script type="text/javascript">
function disableOptions5(x) {
//variable pre5 is equal to the global prev5
pre5 = window.prev5;
//reset prev5 so it now contains the new value
window.prev5 = x;
  //If user has selected "-"
  if (x === 0){
  
  //go through and re-enable the previously selected option
  document.getElementById('module1').options[pre5].disabled = false;
  document.getElementById('module2').options[pre5].disabled = false;
  document.getElementById('module3').options[pre5].disabled = false;
  document.getElementById('module4').options[pre5].disabled = false;
  document.getElementById('module5').options[pre5].disabled = false;
  }
  //otherwise, user has selected another option
  else
  {
  //go through and re-enable the previously selected option
  document.getElementById('module1').options[pre5].disabled = false;
  document.getElementById('module2').options[pre5].disabled = false;
  document.getElementById('module3').options[pre5].disabled = false;
  document.getElementById('module4').options[pre5].disabled = false;
  document.getElementById('module5').options[pre5].disabled = false;
  
  //disable the newly selected option
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  }
}
</script>
<script type="text/javascript">
<!--Function to initiate the global previous values to 0 -->
function initialprev(){
window.prev1 = 0;
window.prev2 = 0;
window.prev3 = 0;
window.prev4 = 0;
window.prev5 = 0;
}
</script>
<script type="text/javascript">
<!--Function to do stuff on load-->
function Load(){
<?php if ($admin == 1){ echo 'hideall();';} else { echo 'showall();';} ?>
initialprev();
disableOptions1(document.getElementById('module1').selectedIndex);
disableOptions2(document.getElementById('module2').selectedIndex);
disableOptions3(document.getElementById('module3').selectedIndex);
disableOptions4(document.getElementById('module4').selectedIndex);
disableOptions5(document.getElementById('module5').selectedIndex);
}
</script>
 
</body>
</html>
<?php ob_end_flush(); ?>
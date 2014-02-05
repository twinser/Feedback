<?php
if($_COOKIE['admin_cook'] != 1)
{
header("location:admin_login_success.php");
}

else{
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Modules"; // Table name 

// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
}
  
  
  
?>
<html>
<head>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
<script>
function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","livesearchu.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body onload="Load()">
<h1>
Add new user
</h1>
<form name="form4" method="post" action="checkadd.php">
<h3> User type </h3>
<p>Lecturer <input type="radio" name="admin"  value="0" onclick="show('module1')" checked> <br>
Admin   <input type="radio" name="admin" value="1" onclick="hideall()" > </p>
<div style="display: inline-block;"><p>Username <input name="UserID" type="text" id="UserID" onkeyup="showResult(this.value)"></p></div> <div style="display: inline-block;" id="livesearch"></div> 
<p>Password <input name="Password" type="password" id="Password"></p>

<select name="module1" id="module1" style="display: none;" onclick="show2()" onChange="disableOptions1(this.selectedIndex)">
<option value="" selected> - </option>
<?php 

$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'">' .$code .' - '. $name . '</option>';
}

?>
</select>
<select name="module2" id="module2" style="display: none;" onclick="show3()" onChange="disableOptions2(this.selectedIndex)">
<option value="" selected> - </option>
<?php 
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'">' .$code .' - '. $name . '</option>';
}
?>
</select>
<select name="module3" id="module3" style="display: none;" onclick="show4()" onChange="disableOptions3(this.selectedIndex)">
<option value="" selected> - </option>
<?php 

$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'">' .$code .' - '. $name . '</option>';
}
?>
</select>
<select name="module4" id="module4" style="display: none;" onclick="show5()" onChange="disableOptions4(this.selectedIndex)">
<option value="" selected> - </option>
<?php 
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'">' .$code .' - '. $name . '</option>';
}
?>
</select>
<select name="module5" id="module5" style="display: none;" onChange="disableOptions5(this.selectedIndex)">
<option value="" selected> - </option>
<?php 
$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'">' .$code .' - '. $name . '</option>';
}
?>
</select>
<p><input type="submit" name="SubmitAddUser" value="Submit"></p><br>
</form>


  <p><a href ="admin_login_success.php">Back</a></p>
  <p><a href ="Logout.php">Log out</a></p>
  
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
  <script type="text/javascript">
  function hide2345(){
  hide('module2');
  hide('module3');
  hide('module4');
  hide('module5');
  }
  </script>
  <script type="text/javascript">
  function hide345(){
  hide('module3');
  hide('module4');
  hide('module5');
  }
  </script>
  <script type="text/javascript">
  function hide45(){
  hide('module4');
  hide('module5');
  }
  </script>
<script type="text/javascript">
  function show2(){
  if (document.getElementById('module1').value != ''){
  show('module2');
  }
  else {
  hide2345();
  
  }
  }
</script>
<script type="text/javascript">
  function show3(){
  if (document.getElementById('module2').value != ''){
  show('module3');
  }
  else {
  hide345();
  }
  }
</script>
<script type="text/javascript">
  function show4(){
  if (document.getElementById('module3').value != ''){
  show('module4');
  }
  else {
  hide45();
  }
  }
</script>
<script type="text/javascript">
  function show5(){
  if (document.getElementById('module4').value != ''){
  show('module5');
  }
  else {
  hide('module5');
  }
  }
</script>

<script type="text/javascript">
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
function initialprev(){
window.prev1 = 0;
window.prev2 = 0;
window.prev3 = 0;
window.prev4 = 0;
window.prev5 = 0;
}
</script>
<script type="text/javascript">
function Load(){
show('module1');
initialprev();
}
</script>
</body>
</html>
<?php ob_end_flush(); ?>
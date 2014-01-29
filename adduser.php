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
<body onload="show('module1')">
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
  if (document.getElementById('module4').value == ''){
  hide('module5');
  }
  else {
  show('module5');

  }
  }
</script>

<script type="text/javascript">
function disableOptions1(x) {
  if (x == 0){
  for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }
  }
  else
  {
  /*for (var i=1;i<document.getElementById('module2').length;i++)
  {
  
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  
  }*/
  
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
  </script>
<script type="text/javascript">
function disableOptions2(x) {
  if (x == 0){
  for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }
  }
  else
  {
  /*for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }*/
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
  </script>
  
<script type="text/javascript">
function disableOptions3(x) {
  if (x == 0){
  for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }
  }
  else
  {
  /*for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  
  }*/
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
</script>

<script type="text/javascript">
function disableOptions4(x) {
  if (x == 0){
  for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }
  }
  else
  {
  /*for (var i=1;i<document.getElementById('module2').length;i++)
  {
  
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module5').options[i].disabled = false;
  }*/
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module5').options[x].disabled = true;
  }
}
</script>

<script type="text/javascript">
function disableOptions5(x) {
  if (x == 0){
  for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  }
  }
  else
  {
  /*for (var i=1;i<document.getElementById('module2').length;i++)
  {
  document.getElementById('module1').options[i].disabled = false;
  document.getElementById('module2').options[i].disabled = false;
  document.getElementById('module3').options[i].disabled = false;
  document.getElementById('module4').options[i].disabled = false;
  }*/
  
  document.getElementById('module1').options[x].disabled = true;
  document.getElementById('module2').options[x].disabled = true;
  document.getElementById('module3').options[x].disabled = true;
  document.getElementById('module4').options[x].disabled = true;
  }
}
</script>
</body>
</html>
<?php ob_end_flush(); ?>
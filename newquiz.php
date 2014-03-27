<?php
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}

else{
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
  
  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1 maximum-scale=1, user-scalable=no" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<script src="datetimepicker_css.js">

//Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
//Script featured on JavaScript Kit (http://www.javascriptkit.com)
//For this script, visit http://www.javascriptkit.com 
</script>
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
xmlhttp.open("GET","livesearchq.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>







</head>
<body onload="Load()">
<div class="container">
<h1>
Create new quiz
</h1>
<p id="answerall" style="display: none;">
<font color="red">  You must fill in all the required fields! </font></p>

<form role="form" name="form5" method="post" action="checknew.php">

<select name="modules" id="modules">
<option value="" selected disabled>Module</option>
<?php 
$userid = $_COOKIE['user_cook'];

$mod1 = $_COOKIE['module1_cook'];
$mod2 = $_COOKIE['module2_cook'];
$mod3 = $_COOKIE['module3_cook'];
$mod4 = $_COOKIE['module4_cook'];
$mod5 = $_COOKIE['module5_cook'];
$mods = $_COOKIE['modules_cook'];

if ($_COOKIE['admin_cook'] == 0){

if ($mod1 != NULL){
$sql = "SELECT * FROM Modules WHERE ModuleCode = '$mod1'";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($_COOKIE['modules_mcook'] == $code)echo " selected";
echo '>' .$code .' - '. $name . '</option>';
}

}
if ($mod2 != NULL){
$sql = "SELECT * FROM Modules WHERE ModuleCode = '$mod2'";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($_COOKIE['modules_mcook'] == $code)echo " selected";
echo '>' .$code .' - '. $name . '</option>';
}

}
if ($mod3 != NULL){
$sql = "SELECT * FROM Modules WHERE ModuleCode = '$mod3'";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($_COOKIE['modules_mcook'] == $code)echo " selected";
echo '>' .$code .' - '. $name . '</option>';
}

}
if ($mod4 != NULL){
$sql = "SELECT * FROM Modules WHERE ModuleCode = '$mod4'";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($_COOKIE['modules_mcook'] == $code)echo " selected";
echo '>' .$code .' - '. $name . '</option>';
}

}
if ($mod5 != NULL){
$sql = "SELECT * FROM Modules WHERE ModuleCode = '$mod5'";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($_COOKIE['modules_mcook'] == $code)echo " selected";
echo '>' .$code .' - '. $name . '</option>';
}

}
}
elseif ($_COOKIE['admin_cook'] == 1)
{


$sql = "SELECT * FROM Modules";
$result=mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($result)) {
$code = $row['ModuleCode'];
$name = $row['ModuleName']; 
echo '<option value="'.$code.'"';
if ($_COOKIE['modules_mcook'] == $code)echo " selected";
echo '>' .$code .' - '. $name . '</option>';
}

}
else
{
echo '<option value="error" selected disabled>There has been an error.Please contact an administrator.</option>';
}
?>
</select>
<br>
<p><b>Feedback Type:</b></p>
<p>Single Lecture Feedback<input type="radio" name="wholemod"  value="1" onclick="lecture()"> <br>
Whole Module Feedback<input type="radio" name="wholemod" value="0" onclick="module()"  checked> </p>

<div style="display: inline-block;"> <p> <b>Passphrase:</b> <input name="Passphrase" type="text" <?php echo 'value="'.$_COOKIE['passphrase_mcook'].'" ' ?> id="Passphrase" onkeyup="showResult(this.value)"></p></div> <div style="display: inline-block;" id="livesearch"></div>
<p><b>Brief Description:</b> <input name="description" type="text" <?php echo 'value="'.$_COOKIE['description_mcook'].'" ' ?> id="description"></p>
<p><b>Expiry Date:</b><input id="expdate" type="text" <?php echo 'value="'.$_COOKIE['expdate_mcook'].'" '?> name="expdate"><img src="images/cal.gif" onclick="javascript:NewCssCal('expdate', 'yyyyMMdd','','','','','future')" style="cursor:pointer"/></p>

<p id="cwork" style="display: none;"><b>Does this module have coursework?</b><br>
Yes<input type="radio" name="cw"  value="1" <?php if (($_COOKIE['cw_mcook'] == 1)|| !(isset($_COOKIE['cw_mcook']) )) echo 'checked'?>> No<input type="radio" name="cw" value="0" <?php if ($_COOKIE['cw_mcook'] == 0) echo 'checked'?>> </p>

<p id="lectopic" style="display: none;"><b>Lecture Topic:</b><input name="lecturetopic" type="text" <?php echo 'value="'.$_COOKIE['lecturetopic_mcook'].'" '?> id="lecturetopic"></p>
<p id="lecdate" style="display: none;"><b>Lecture Date:</b><input name="lecturedate" type="text" <?php echo 'value="'.$_COOKIE['lecturedate_mcook'].'" '?> id="lecturedate"><img src="images/cal.gif" onclick="javascript:NewCssCal('lecturedate', 'yyyyMMdd')" style="cursor:pointer"/></p>
<p><button type="submit" class="btn btn-default" name="SubmitNewQuiz" id="SubmitNewQuiz" value="Submit">Submit</button></p>
<br>
</form>
<p> <a class="btn btn-warning" href="admin_login_success.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
</div>
<script type="text/javascript">
	function imageload(type){
	if (type == "c")
	{
	document.getElementById("SubmitNewQuiz").className += " disabled";
	}
	else
	{
	document.getElementById("SubmitNewQuiz").className =
   document.getElementById("SubmitNewQuiz").className.replace
      ( /(?:^|\s)disabled(?!\S)/g , '' )
	}
	}
</script>

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
  hide('cwork');
  show('lectopic');
  show('lecdate');
  }
  </script>
  <script type="text/javascript">
  function module(){
  show('cwork');
  hide('lectopic');
  hide('lecdate');
  }
  </script>
  <script type="text/javascript">
  function emptyanswers(){
	e = <?php if ($_COOKIE['missing_cook'] == 1){
	echo 1;	
	}
	else {
	echo 0;
	}  ?>;

	if (e == 1){
	show('answerall');
	}
	}
   </script>
<script type="text/javascript">
   function Load(){
   show('cwork');
   emptyanswers();
   }
</script>

</body>
</html>
<?php ob_end_flush(); ?>
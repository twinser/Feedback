<?php 
if (isset($_COOKIE['passphrase_cook'])){

	if ($_COOKIE['lecture_cook'] == "1"){
	header("location:lecture_quiz.php");
	}
	
}
else {
header("location:passphrase_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

</head>
<body onload="Load()">

<div class="form-space">
<h1 class="text-success">Module Quiz</h1>
<h1 class="text-primary">
<?php
echo $_COOKIE['module_cook'];
?>
</h1>

<p id="answerall" style="display: none;">
<font color="red">  You must answer all the questions! </font></p>
<br>
<form role="form" name="formM" method="post" action="submitm.php">


<p class="text-info"><strong>1.) How interesting did you find the module?</strong></p><p>
<input type="radio" name="q1" id="1" <?php if ($_COOKIE['1_cook']==1) echo "checked";?> value="1"> <label for="1">Boring</label><br>
<input type="radio" name="q1" id="2" <?php if ($_COOKIE['1_cook']==2) echo "checked";?> value="2"> <label for="2">Not very interesting</label><br>
<input type="radio" name="q1" id="3" <?php if ($_COOKIE['1_cook']==3) echo "checked";?> value="3"> <label for="3">Interesting</label><br>
<input type="radio" name="q1" id="4" <?php if ($_COOKIE['1_cook']==4) echo "checked";?> value="4"> <label for="4">Very interesting</label><br>
<input type="radio" name="q1" id="5" <?php if ($_COOKIE['1_cook']==5) echo "checked";?> value="5"> <label for="5">Extremely interesting</label></p>

<p class="text-info"><strong>2.) Did you find the module easy to follow?</strong></p><p>
<input type="radio" name="q2" id="6" <?php if ($_COOKIE['2_cook']==1) echo "checked";?> value="1"> <label for="6">Yes</label><br>
<input type="radio" name="q2" id="7" <?php if ($_COOKIE['2_cook']==2) echo "checked";?> value="2"> <label for="7">No</label></p>

<p class="text-info"><strong>3.) How difficult did you find the module?</strong></p><p>
<input type="radio" name="q3" id="8" <?php if ($_COOKIE['3_cook']==1) echo "checked";?> value="1"> <label for="8">Too easy</label><br>
<input type="radio" name="q3" id="9" <?php if ($_COOKIE['3_cook']==2) echo "checked";?> value="2"> <label for="9">Somewhat easy</label><br>
<input type="radio" name="q3" id="10" <?php if ($_COOKIE['3_cook']==3) echo "checked";?> value="3"> <label for="10">Neither easy or difficult</label><br>
<input type="radio" name="q3" id="11" <?php if ($_COOKIE['3_cook']==4) echo "checked";?> value="4"> <label for="11">Challenging</label><br>
<input type="radio" name="q3" id="12" <?php if ($_COOKIE['3_cook']==5) echo "checked";?> value="5"> <label for="12">Too difficult</label></p>

<p class="text-info"><strong>4.) How well did the lecturer interact with the group?</strong></p><p>
<input type="radio" name="q4" id="13" <?php if ($_COOKIE['4_cook']==1) echo "checked";?> value="1"> <label for="13">Not enough interaction</label><br>
<input type="radio" name="q4" id="14" <?php if ($_COOKIE['4_cook']==2) echo "checked";?> value="2"> <label for="14">Some interaction</label><br>
<input type="radio" name="q4" id="15" <?php if ($_COOKIE['4_cook']==3) echo "checked";?> value="3"> <label for="15">Enough interaction</label><br>
<input type="radio" name="q4" id="16" <?php if ($_COOKIE['4_cook']==4) echo "checked";?> value="4"> <label for="16">Lots of interaction</label><br>
<input type="radio" name="q4" id="17" <?php if ($_COOKIE['4_cook']==5) echo "checked";?> value="5"> <label for="17">Too much interaction</label></p>

<p class="text-info"><strong>5.) How was the pace of the module?</strong></p><p>
<input type="radio" name="q5" id="18" <?php if ($_COOKIE['5_cook']==1) echo "checked";?> value="1"> <label for="18">Too slow</label><br>
<input type="radio" name="q5" id="19" <?php if ($_COOKIE['5_cook']==2) echo "checked";?> value="2"> <label for="19">Slow</label><br>
<input type="radio" name="q5" id="20" <?php if ($_COOKIE['5_cook']==3) echo "checked";?> value="3"> <label for="20">Well paced</label><br>
<input type="radio" name="q5" id="21" <?php if ($_COOKIE['5_cook']==4) echo "checked";?> value="4"> <label for="21">Fast</label><br>
<input type="radio" name="q5" id="22" <?php if ($_COOKIE['5_cook']==5) echo "checked";?> value="5"> <label for="22">Too fast</label></p>

<p class="text-info"><strong>6.) Did you learn something?</strong></p><p>
<input type="radio" name="q6" id="23" <?php if ($_COOKIE['6_cook']==1) echo "checked";?> value="1"> <label for="23">Yes</label><br>
<input type="radio" name="q6" id="24" <?php if ($_COOKIE['6_cook']==2) echo "checked";?> value="2"> <label for="24">No</label></p>

<p class="text-info"><strong>7.) Were there lecture notes or slides available?</strong></p><p>
<input type="radio" name="q7" id="25" <?php if ($_COOKIE['7_cook']==1) echo "checked";?> value="1" onclick="show('q7b')"> <label for="25">Yes</label><br>
<input type="radio" name="q7" id="26" <?php if ($_COOKIE['7_cook']==2) echo "checked";?> value="2" onclick="hide('q7b')"> <label for="26">No</label></p>

<div id="q7b" style="display: none;">
<p class="text-info"><strong>7b.) Would you describe the notes as useful?</strong></p><p>
<input type="radio" name="q7b" id="27" <?php if ($_COOKIE['7b_cook']==1) echo "checked";?> value="1"> <label for="27">Yes</label><br>
<input type="radio" name="q7b" id="28" <?php if ($_COOKIE['7b_cook']==2) echo "checked";?> value="2"> <label for="28">No</label></p></div>

<p class="text-info"><strong>8.) Did the lecturer use visual aids?</strong></p><p>
<input type="radio" name="q8" id="29" <?php if ($_COOKIE['8_cook']==1) echo "checked";?> value="1" onclick="show('q8b')"> <label for="29">Yes</label><br>
<input type="radio" name="q8" id="30" <?php if ($_COOKIE['8_cook']==2) echo "checked";?> value="2" onclick="hide('q8b')"> <label for="30">No</label></p>

<div id="q8b" style="display: none;">
<p class="text-info"><strong>8b.) Would you describe the visual aids as useful?</strong></p><p>
<input type="radio" name="q8b" id="31" <?php if ($_COOKIE['8b_cook']==1) echo "checked";?> value="1"> <label for="31">Yes</label><br>
<input type="radio" name="q8b" id="32" <?php if ($_COOKIE['8b_cook']==2) echo "checked";?> value="2"> <label for="32">No</label></p></div>

<p class="text-info"><strong>9.) Did the module involve any practical work?</strong></p><p>
<input type="radio" name="q9" id="33" <?php if ($_COOKIE['9_cook']==1) echo "checked";?> value="1" onclick="show('q9b'), show('q9c')"> <label for="33">Yes</label><br>
<input type="radio" name="q9" id="34" <?php if ($_COOKIE['9_cook']==2) echo "checked";?> value="2" onclick="hide('q9b'), hide('q9c')"> <label for="34">No</label></p>

<div id="q9b" style="display: none;">
<p class="text-info"><strong>9b.) How easy was the practical work?</strong></p><p>
<input type="radio" name="q9b" id="35" <?php if ($_COOKIE['9b_cook']==1) echo "checked";?> value="1"> <label for="35">Too easy</label><br>
<input type="radio" name="q9b" id="36" <?php if ($_COOKIE['9b_cook']==2) echo "checked";?> value="2"> <label for="36">Somewhat easy</label><br>
<input type="radio" name="q9b" id="37" <?php if ($_COOKIE['9b_cook']==3) echo "checked";?> value="3"> <label for="37">Neither easy or difficult</label><br>
<input type="radio" name="q9b" id="38" <?php if ($_COOKIE['9b_cook']==4) echo "checked";?> value="4"> <label for="38">Challenging</label><br>
<input type="radio" name="q9b" id="39" <?php if ($_COOKIE['9b_cook']==5) echo "checked";?> value="5"> <label for="39">Too difficult</label></p></div>

<div id="q9c" style="display: none;">
<p class="text-info"><strong>9c.) How was the support in the practical sessions?</strong></p><p>
<input type="radio" name="q9c" id="40" <?php if ($_COOKIE['9c_cook']==1) echo "checked";?> value="1"> <label for="40">Non-existent</label><br>
<input type="radio" name="q9c" id="41" <?php if ($_COOKIE['9c_cook']==2) echo "checked";?> value="2"> <label for="41">Sometimes there</label><br>
<input type="radio" name="q9c" id="42" <?php if ($_COOKIE['9c_cook']==3) echo "checked";?> value="3"> <label for="42">Good</label><br>
<input type="radio" name="q9c" id="43" <?php if ($_COOKIE['9c_cook']==4) echo "checked";?> value="4"> <label for="43">Very good</label><br>
<input type="radio" name="q9c" id="44" <?php if ($_COOKIE['9c_cook']==5) echo "checked";?> value="5"> <label for="44">Excellent</label></p> </div>

<div id="q10" style="display: none;">
<p class="text-info"><strong>10.) How did you find the coursework?</strong></p><p>
<input type="radio" name="q10" id="45" <?php if ($_COOKIE['10_cook']==1) echo "checked";?> value="1"> <label for="45">Too easy</label><br>
<input type="radio" name="q10" id="46" <?php if ($_COOKIE['10_cook']==2) echo "checked";?> value="2"> <label for="46">Somewhat easy</label><br>
<input type="radio" name="q10" id="47" <?php if ($_COOKIE['10_cook']==3) echo "checked";?> value="3"> <label for="47">Neither easy or difficult</label><br>
<input type="radio" name="q10" id="48" <?php if ($_COOKIE['10_cook']==4) echo "checked";?> value="4"> <label for="48">Challenging</label><br>
<input type="radio" name="q10" id="49" <?php if ($_COOKIE['10_cook']==5) echo "checked";?> value="5"> <label for="49">Too difficult</label></p></div>

<p><button type="submit" class="btn btn-default" name="SubmitModuleQuiz" value="Submit">Submit</button></p></form><br>
<p> <a class="btn btn-warning" href="selectfbtypemod.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Cancel</a> </p>
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


function del_cookie(name) {
document.cookie = name +
'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}
</script>

<script type="text/javascript">

function number10(){
x = <?php if ($_COOKIE['coursework_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;
if( x == 1){
show('q10');
}
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

function showsevenb(){
sevenb = <?php if ($_COOKIE['7_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;

if (sevenb ==  1){
show('q7b');
}

}
</script>
<script type="text/javascript">

function showeightb(){
eightb = <?php if ($_COOKIE['8_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;

if (eightb == 1){
show('q8b');
}

}
</script>
<script type="text/javascript">

function shownineb(){
nineb = <?php if ($_COOKIE['9_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;

if (nineb == 1){
show('q9b');
show('q9c');
}
}
</script>
<script type="text/javascript">

function Load(){
number10();
emptyanswers();
showsevenb()
showeightb();
shownineb();
}
</script>
</body>
</html>
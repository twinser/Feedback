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
<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1 maximum-scale=1, user-scalable=no" />
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


<p>1.) How interesting did you find the module?<br>
<input type="radio" name="q1" <?php if ($_COOKIE['1_cook']==1) echo "checked";?> value="1"> Boring<br>
<input type="radio" name="q1" <?php if ($_COOKIE['1_cook']==2) echo "checked";?> value="2"> Not very interesting<br>
<input type="radio" name="q1" <?php if ($_COOKIE['1_cook']==3) echo "checked";?> value="3"> Interesting<br>
<input type="radio" name="q1" <?php if ($_COOKIE['1_cook']==4) echo "checked";?> value="4"> Very interesting<br>
<input type="radio" name="q1" <?php if ($_COOKIE['1_cook']==5) echo "checked";?> value="5"> Extremely interesting</p>

<p>2.) Did you find the module easy to follow?<br>
<input type="radio" name="q2" <?php if ($_COOKIE['2_cook']==1) echo "checked";?> value="1"> Yes<br>
<input type="radio" name="q2" <?php if ($_COOKIE['2_cook']==2) echo "checked";?> value="2"> No</p>

<p>3.) How difficult did you find the module?<br>
<input type="radio" name="q3" <?php if ($_COOKIE['3_cook']==1) echo "checked";?> value="1"> Too easy<br>
<input type="radio" name="q3" <?php if ($_COOKIE['3_cook']==2) echo "checked";?> value="2"> Somewhat easy<br>
<input type="radio" name="q3" <?php if ($_COOKIE['3_cook']==3) echo "checked";?> value="3"> Neither easy or difficult<br>
<input type="radio" name="q3" <?php if ($_COOKIE['3_cook']==4) echo "checked";?> value="4"> Challenging<br>
<input type="radio" name="q3" <?php if ($_COOKIE['3_cook']==5) echo "checked";?> value="5"> Too difficult</p>

<p>4.) How well did the lecturer interact with the group?<br>
<input type="radio" name="q4" <?php if ($_COOKIE['4_cook']==1) echo "checked";?> value="1"> Not enough interaction<br>
<input type="radio" name="q4" <?php if ($_COOKIE['4_cook']==2) echo "checked";?> value="2"> Some interaction<br>
<input type="radio" name="q4" <?php if ($_COOKIE['4_cook']==3) echo "checked";?> value="3"> Enough interaction<br>
<input type="radio" name="q4" <?php if ($_COOKIE['4_cook']==4) echo "checked";?> value="4"> Lots of interaction<br>
<input type="radio" name="q4" <?php if ($_COOKIE['4_cook']==5) echo "checked";?> value="5"> Too much interaction</p>

<p>5.) How was the pace of the module?<br>
<input type="radio" name="q5" <?php if ($_COOKIE['5_cook']==1) echo "checked";?> value="1"> Too slow<br>
<input type="radio" name="q5" <?php if ($_COOKIE['5_cook']==2) echo "checked";?> value="2"> Slow<br>
<input type="radio" name="q5" <?php if ($_COOKIE['5_cook']==3) echo "checked";?> value="3"> Well paced<br>
<input type="radio" name="q5" <?php if ($_COOKIE['5_cook']==4) echo "checked";?> value="4"> Fast<br>
<input type="radio" name="q5" <?php if ($_COOKIE['5_cook']==5) echo "checked";?> value="5"> Too fast</p>

<p>6.) Did you learn something?<br>
<input type="radio" name="q6" <?php if ($_COOKIE['6_cook']==1) echo "checked";?> value="1"> Yes<br>
<input type="radio" name="q6" <?php if ($_COOKIE['6_cook']==2) echo "checked";?> value="2"> No</p>

<p>7.) Were there lecture notes or slides available?<br>
<input type="radio" name="q7" <?php if ($_COOKIE['7_cook']==1) echo "checked";?> value="1" onclick="show('q7b')"> Yes<br>
<input type="radio" name="q7" <?php if ($_COOKIE['7_cook']==2) echo "checked";?> value="2" onclick="hide('q7b')"> No</p>


<p id="q7b" style="display: none;">7b.) Would you describe the notes as useful?<br>
<input type="radio" name="q7b" <?php if ($_COOKIE['7b_cook']==1) echo "checked";?> value="1"> Yes<br>
<input type="radio" name="q7b" <?php if ($_COOKIE['7b_cook']==2) echo "checked";?> value="2"> No</p>

<p>8.) Did the lecturer use visual aids?<br>
<input type="radio" name="q8" <?php if ($_COOKIE['8_cook']==1) echo "checked";?> value="1" onclick="show('q8b')"> Yes<br>
<input type="radio" name="q8" <?php if ($_COOKIE['8_cook']==2) echo "checked";?> value="2" onclick="hide('q8b')"> No</p>

<p id="q8b" style="display: none;">8b.) Would you describe the visual aids as useful?<br>
<input type="radio" name="q8b" <?php if ($_COOKIE['8b_cook']==1) echo "checked";?> value="1"> Yes<br>
<input type="radio" name="q8b" <?php if ($_COOKIE['8b_cook']==2) echo "checked";?> value="2"> No</p>

<p>9.) Did the module involve any practical work?<br>
<input type="radio" name="q9" <?php if ($_COOKIE['9_cook']==1) echo "checked";?> value="1" onclick="show('q9b'), show('q9c')"> Yes<br>
<input type="radio" name="q9" <?php if ($_COOKIE['9_cook']==2) echo "checked";?> value="2" onclick="hide('q9b'), hide('q9c')"> No</p>

<p id="q9b" style="display: none;">9b.) How easy was the practical work?<br>
<input type="radio" name="q9b" <?php if ($_COOKIE['9b_cook']==1) echo "checked";?> value="1"> Too easy<br>
<input type="radio" name="q9b" <?php if ($_COOKIE['9b_cook']==2) echo "checked";?> value="2"> Somewhat easy<br>
<input type="radio" name="q9b" <?php if ($_COOKIE['9b_cook']==3) echo "checked";?> value="3"> Neither easy or difficult<br>
<input type="radio" name="q9b" <?php if ($_COOKIE['9b_cook']==4) echo "checked";?> value="4"> Challenging<br>
<input type="radio" name="q9b" <?php if ($_COOKIE['9b_cook']==5) echo "checked";?> value="5"> Too difficult</p>


<p id="q9c" style="display: none;">9c.) How was the support in the practical sessions?<br>
<input type="radio" name="q9c" <?php if ($_COOKIE['9c_cook']==1) echo "checked";?> value="1"> Non-existent<br>
<input type="radio" name="q9c" <?php if ($_COOKIE['9c_cook']==2) echo "checked";?> value="2"> Sometimes there<br>
<input type="radio" name="q9c" <?php if ($_COOKIE['9c_cook']==3) echo "checked";?> value="3"> Good<br>
<input type="radio" name="q9c" <?php if ($_COOKIE['9c_cook']==4) echo "checked";?> value="4"> Very good<br>
<input type="radio" name="q9c" <?php if ($_COOKIE['9c_cook']==5) echo "checked";?> value="5"> Excellent</p>


<p id="q10" style="display: none;">10.) How did you find the coursework?<br>
<input type="radio" name="q10" <?php if ($_COOKIE['10_cook']==1) echo "checked";?> value="1"> Too easy<br>
<input type="radio" name="q10" <?php if ($_COOKIE['10_cook']==2) echo "checked";?> value="2"> Somewhat easy<br>
<input type="radio" name="q10" <?php if ($_COOKIE['10_cook']==3) echo "checked";?> value="3"> Neither easy or difficult<br>
<input type="radio" name="q10" <?php if ($_COOKIE['10_cook']==4) echo "checked";?> value="4"> Challenging<br>
<input type="radio" name="q10" <?php if ($_COOKIE['10_cook']==5) echo "checked";?> value="5"> Too difficult</p>

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
<?php
//check logged in
if (isset($_COOKIE['passphrase_cook'])){

	if ($_COOKIE['lecture_cook'] == "1"){
	header("location:detailedfblec.php");
	}
	
}
else {
header("location:passphrase_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Detailed feedback</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>

<?php
//check if box is empty after submit
if (isset($_COOKIE['empty_cook'])){

echo "<body onload=\"show('emptybox'); del_cookie('empty_cook')\">";

}
else 
{
echo "<body>";
}
?>
<div class="form-space">

<h1 class="text-primary">
<?php
echo $_COOKIE['module_cook'];
?>
</h1><h1 class="text-success"> Feedback</h1>

<h3> Please give any comments in the box below </h3>

<p> <form role="form" method="post" action="detailedsubmitm.php"> 

<textarea name="Feedback" style="width:70%;height:30%" class="form-control" rows="6">
</textarea></p>
<!--show if box is empty-->
<p id="emptybox" style="display: none;">
<font color="red"> Please enter some feedback in the box! </font>
</p>
<br>
<p><button type="submit" class="btn btn-default" name="SubmitModuleDetailed" value="Submit">Submit</button></p>
</form>
</p>
<br>
<p> <a class="btn btn-warning" href="selectfbtypemod.php" role="button">Go back to the menu without submitting</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Cancel feedback</a> </p>
</div>

<script type="text/javascript"> 
//show elements
  function show(id){ 
   document.getElementById(id).style.display='block';
  }; 
</script> 

<script type="text/javascript">
//delete cookie
function del_cookie(name) {
document.cookie = name +
'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}
</script>

</body>

</html>
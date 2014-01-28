<?php
if (isset($_COOKIE['passphrase_cook'])){

	if ($_COOKIE['lecture_cook'] == "1"){
	header("location:detailedfblec.php");
	}
	
}
else {
header("location:passphrase_login.php");
}
?>

<html>

<head>
<script type="text/javascript"> 
  function show(id){ 
   document.getElementById(id).style.display='block';
  }; 
</script> 

<script type="text/javascript">
function del_cookie(name) {
document.cookie = name +
'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}
</script>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>

</head>

<?php
if (isset($_COOKIE['empty_cook'])){

echo "<body onload=\"show('emptybox'); del_cookie('empty_cook')\">";

}
else 
{
echo "<body>";
}
?>
<h1>
<?php
echo $_COOKIE['module_cook'] . " " . Feedback;
?>
</h1>
<h2> Give detailed feedback in the box below </h2>

<p> <form method="post" action="detailedsubmitm.php"> 

<textarea name="Feedback" style="width:70%;height:30%">
</textarea></p>
<p id="emptybox" style="display: none;">
<font color="red"> Please enter some feedback in the box! </font>
</p>
<br>
<input type="submit" value="Submit" />
</form>





</p>


<br>
<p> <a href ="selectfbtypemod.php"> Go back to the selection screen</a>  &nbsp; &nbsp; &nbsp; <a href = "Logout.php">Cancel</a> </p>
</body>

</html>
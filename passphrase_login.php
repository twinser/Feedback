<?php
if (isset($_COOKIE['passphrase_cook']))
header("location:login_success.php");
?>
<html>
<head>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>

</head>
<body onload="Load()">
<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1" />
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Login </strong></td>
</tr>
<tr>
<td width="78">Passphrase</td>
<td width="6">:</td>
<td width="294"><input name="passphrase" type="text" id="passphrase"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table><br>
<p id="expired" align="center" style="display: none;">
<font color="red">That quiz has expired. Please contact your lecturer for more details.</font>
</p>
<p id="wrongp" align="center" style="display: none;">
<font color="red">That passphrase is incorrect. Please check your spelling.</font>
</p>
<br>
<p align="center">
<a href = "admin_login.php">Lecturer/Admin Login</a>
</p>
<script type="text/javascript">
function del_cookie(name) {
document.cookie = name +
'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}
</script>
<script type="text/javascript">

  function show(id){ 
   document.getElementById(id).style.display='block';
  } 
</script>

<script type="text/javascript">

function showexp(){
e = <?php if ($_COOKIE['expired_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;

if (e ==  1){
show('expired');
}
del_cookie('expired_cook');
}
</script>

<script type="text/javascript">

function showwrongp(){
w = <?php if ($_COOKIE['wrong_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;

if (w ==  1){
show('wrongp');
}
del_cookie('wrong_cook');
}
</script>



<script type="text/javascript">

function Load(){
showexp();
showwrongp();
}
</script>

<script type="text/javascript" id="cookiebanner"
    src="http://cookiebanner.eu/js/cookiebanner.min.js" data-message="This website relies on cookies being placed on your machine in order for it to function correctly. By continuing to visit this site you agree to the use of cookies." data-moreinfo="cookies.html"></script>

</body>
</html>
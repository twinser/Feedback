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
<form name="form1" method="post" action="checklogin_admin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="username" value="<?php if (empty($_COOKIE['entereduname_cook'])){
echo "";} else { echo $_COOKIE['entereduname_cook']; } ?>"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password"></td>
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
<p id="wrongu" align="center" style="display: none;">
<font color="red">Either the username or password is incorrect. Please check your spelling.</font>
</p>
<br>
<p align="center">
<a href = "passphrase_login.php">Feedback Login (with passphrase)</a>
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

function showwrongu(){
w = <?php if ($_COOKIE['wrong_cook'] == 1){
echo 1;
}
else {
echo 0;
}  ?>;

if (w ==  1){
show('wrongu');
}
del_cookie('wrong_cook');
}
</script>

<script type="text/javascript">
function Load(){
showwrongu();
}
</script>
<script type="text/javascript" id="cookiebanner"
    src="http://cookiebanner.eu/js/cookiebanner.min.js" data-message="This website relies on cookies being placed on your machine in order for it to function correctly. By continuing to visit this site you agree to the use of cookies." data-moreinfo="cookies.html"></script>

</body>
</html>
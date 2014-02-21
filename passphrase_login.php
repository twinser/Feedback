<?php
if (isset($_COOKIE['passphrase_cook']))
header("location:login_success.php");
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

</head>
<body onload="Load()">
<div class="container">

      <form class="form-signin" role="form" method="post" action="checklogin.php">
        <h2 class="form-signin-heading">Enter passphrase</h2>
        <input type="text" class="form-control" placeholder="Passphrase" id="passphrase" name="passphrase" required autofocus>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Login">Sign in</button>
		<button class="btn btn-sm btn-secondary btn-block" type="button" name="admin" value="admin" onclick="window.location.href='admin_login.php'">Lecturer/Admin Login</button>
      </form>

    </div>

<p id="expired" align="center" style="display: none;">
<font color="red">That quiz has expired. Please contact your lecturer for more details.</font>
</p>
<p id="wrongp" align="center" style="display: none;">
<font color="red">That passphrase is incorrect. Please check your spelling.</font>
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
<?php
//check if logged in
if (isset($_COOKIE['user_cook']))
header("location:admin_login_success.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">
</head>
<body onload="Load()">
<div class="container">

      <form class="form-signin" role="form" method="post" action="checklogin_admin.php">
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php if (empty($_COOKIE['entereduname_cook'])){
echo "";} else { echo $_COOKIE['entereduname_cook']; } ?>" required autofocus>
		<input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Login">Sign in</button>
		<a class="btn btn-sm btn-info btn-block" href="passphrase_login.php" role="button" name="feedback" value="feedback">Feedback Login</a>
      </form>

    </div>
<!--paragraph to show if wrong username or password is incorrect-->
<p id="wrongu" align="center" style="display: none;">
<font color="red">Either the username or password is incorrect. Please check your spelling.</font>
</p>
<br>


<script type="text/javascript">
//delete cookie function
function del_cookie(name) {
document.cookie = name +
'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}
</script>
<script type="text/javascript">
//function to show elements
  function show(id){ 
   document.getElementById(id).style.display='block';
  } 
</script>

<script type="text/javascript">
//function to show paragraph if wrong username
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
//load function
function Load(){
showwrongu();
}
</script>
<!--Cookie banner code-->
<script type="text/javascript" id="cookiebanner"
    src="http://cookiebanner.eu/js/cookiebanner.min.js" data-message="This website relies on cookies being placed on your machine in order for it to function correctly. By continuing to visit this site you agree to the use of cookies." data-moreinfo="cookies.html"></script>

</body>
</html>
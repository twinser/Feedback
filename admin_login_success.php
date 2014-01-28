<?php
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login.php");
}

?>
<html>
<head>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>
<h1>Hello <?php
echo $_COOKIE['user_cook'];
?>!</h1>
<h3>You are <?php 
if($_COOKIE['admin_cook'] == 1)
{
echo 'an administrator';
}
else
{
echo 'a lecturer';
}
?></h3>
<?php
if($_COOKIE['admin_cook'] == 1)
{
echo '<p><a href ="adduser.php">Add new user</a><br>
<a href ="users.php">View users</a></p>';
}
?>

<p><a href="newquiz.php">Create new quiz </a><br>
<a href="quizzes.php">View quizzes </a><br></p>
<p><a href ="Logout.php">Log out</a></p>
</html>
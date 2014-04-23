<?php
if (isset($_COOKIE['admin_cook'])){
}
else{
header("location:login_success.php");
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
<body>
<div class="container">
<h1 class="text-success">Hello </h1>
<h1 class="text-primary"><?php
echo ucfirst($_COOKIE['user_cook']);
?></h1>
<h3> Select an option: </h3>

<?php
if($_COOKIE['admin_cook'] == 1)
{
echo '<p><a class="btn btn-default btn-lg" href="adduser.php" role="button">Add new user</a><br>
<a class="btn btn-default btn-lg" href="users.php" role="button">View users</a></p>';
}
?>
<p><a class="btn btn-default btn-lg" href="newquiz.php" role="button">Create new feedback survey</a><br>
<a class="btn btn-default btn-lg" href="quizzes.php" role="button">View existing surveys</a></p>
<br>
<p><a class="btn btn-danger" href="Logout.php" role="button">Log out</a></p></div>
</html>
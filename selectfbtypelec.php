<?php
if (isset($_COOKIE['passphrase_cook']))
{
	if ($_COOKIE['lecture_cook'] != "1"){
	header("location:selectfbtypemod.php");
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

<body>
<div class="container">
<h1 class="text-primary pull-left">
<?php
echo $_COOKIE['module_cook'] ;
?>
</h1><h1 class="text-success"> Feedback </h1>
<h1 class="text-info">
<?php
echo $_COOKIE['topic_cook'] ;
?>
</h1>
<br>
<h2> Select an option: </h2>
<p><a class="btn btn-default btn-lg" href="lecture_quiz.php" role="button">Complete a feedback survey</a></p>

<p><a class="btn btn-default btn-lg" href="detailedfblec.php" role="button">Give detailed feedback</a></p>

<br>
<p> <a class="btn btn-danger" href="Logout.php" role="button">Cancel</a> </p>

</body>

</html>
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



<html>

<head>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>

<body>
<h1>
<?php
echo $_COOKIE['module_cook'] . " " . Feedback . " - " . $_COOKIE['topic_cook'] ;
?>
</h1><h2> Select an option: </h2>

<p> <a href = "lecture_quiz.php">Complete a feedback survey</a> </p>

<p> <a href = "detailedfblec.php">Give detailed feedback</a> </p>
<br>
<p> <a href = "Logout.php">Cancel</a> </p>
</body>

</html>
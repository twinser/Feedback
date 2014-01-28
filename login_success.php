<?php

if (isset($_COOKIE['passphrase_cook'])){

	if ($_COOKIE['lecture_cook'] == "1"){
	header("location:selectfbtypelec.php");
	}
	else {
	header("location:selectfbtypemod.php");
	}
}
else {
header("location:passphrase_login.php");
}
?>
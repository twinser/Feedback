<?php 
/*setcookie("passphrase_cook", "", time()-3600);
setcookie("module_cook", "", time()-3600);
setcookie("lecture_cook", "", time()-3600);*/


$x = $_COOKIE;
foreach ($x as $name=>$value) {
setcookie($name,'',1);
}
header("location:passphrase_login.php");
?>
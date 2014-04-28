<?php 
//check if someone is logged in
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}
//data string read in from POST request
$data = $_POST['d'];
//filename read in from POST request
$filename = $_POST['f'];

//for temporarily saving the file to the server, ready for download
$uriPhp = 'data://' . substr($data, 5);
file_put_contents('image.jpg', file_get_contents($uriPhp));

$file = 'image.jpg';
//if the file was created, start the file transfer to the user's browser
if (file_exists($file)) {
    header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$filename);
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
} 
?>
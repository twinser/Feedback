<?php
if ($_COOKIE['admin_cook'] != 1){
header("location:admin_login_success.php");
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> <meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet"> 
<link href="css/main.css" rel="stylesheet"> 
</head> 

<body class="users-table"> 
<h1 class="text-primary">Users</h1>
<div class="table-responsive"> 
<table class="table table-hover table-condensed table-bordered sortable" id='user-table'>

<?php
//http://www.sudobash.net/web-dev-populate-phphtml-table-from-mysql-database/
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$tbl_name="Users"; // Table name 
$loggedin=$_COOKIE['user_cook'];
// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$sql="SELECT UserID, Admin, Module1, Module2, Module3, Module4, Module5 FROM $tbl_name WHERE NOT UserID='$loggedin'";
$result=mysqli_query($con,$sql);

  echo "<thead><tr><th>Username</th><th>Admin</th><th>Module1</th><th>Module2</th><th>Module3</th><th>Module4</th><th>Module5</th><th> </th></tr></thead><tbody>";
 
  while($row = mysqli_fetch_array($result)){
 
  $userid = $row['UserID'];
  $admin = $row['Admin'];
  $mod1 = $row['Module1'];
  $mod2 = $row['Module2'];
  $mod3 = $row['Module3'];
  $mod4 = $row['Module4'];
  $mod5 = $row['Module5'];
 

echo '<tr><td>'.$userid.'</td><td>'.$admin.'</td><td>'.$mod1.'</td><td>'.$mod2.'</td><td>'.$mod3.'</td><td>'.$mod4.'</td><td>'.$mod5.'</td><td><a class="btn btn-info btn-xs" href="edituser.php?user='. $userid . '" role="button">Edit</a> <a class="btn btn-danger btn-xs" href="javascript:deluser(\''. $userid . '\')" role="button">Delete</a></td> </tr>';
 
} // End our while loop

?>
</tbody>
</table>
</div>
<p> <a class="btn btn-warning" href="admin_login_success.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
<script src="sorttable.js"></script>
 
<script type="text/javascript">
function deluser(uid){
var message = "Are you sure you want to delete " + uid + "?";
var response=confirm(message);
if (response==true)
{
post_to_url('confirmdel.php', {userid: uid});
}
}
</script>

<script type="text/javascript">
// From http://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit/133997#133997
function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
</script>
</body>
</html>
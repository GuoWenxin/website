<?php
	error_reporting(0);
	session_start();
	$old_user=$_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Log out</h1>
<?php
	if (!empty($old_user)) {
		# code...
		echo 'Logged out.<br/>';
	}
	else
	{
		echo 'You were not logged in ,and so have not been logged out.<br/>';
	}
?>
<a href="authmain.php">Back to main page</a>
</body>
</html>
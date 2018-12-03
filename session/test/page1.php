<!DOCTYPE html>
<html>
<head>
	<title>会话页面1</title>
	<meta charset="utf-8"> 
</head>
<body>

<?php
	session_start();
	$_SESSION['sess_var']='Hello World';
	echo 'The content of $_SESSION[\'sess_var\'] is '.$_SESSION['sess_var'].'<br>'; 
 ?>
 <a href="page2.php">Next Page</a>
</body>
</html>
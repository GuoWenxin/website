<?php  
	error_reporting(0);
	session_start();
	$userid=$_POST['userid'];
	$pws=$_POST['password'];
	if (isset($userid) && isset($pws)) 
	{
		//用户名和密码验证
		#简单
		if ($userid=="abc" && $pws=="123") {
			# code...
			$_SESSION['valid_user']=$userid;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Home Page</h1>
<?php
	if(isset($_SESSION['valid_user']))
	{
		echo 'You are logged in as:'.$_SESSION['valid_user'].'<br/>';
		echo '<a href="logout.php">Logout</a><br/>';
	}
	else
	{
		if (isset($userid)) {
			# code...
			echo "Could not log you in.<br/>";
		}
		else
		{
			echo "You are not logged in.<br/>";
		}

		echo '<form method="POST" action="authmain.php">';
		echo '<table>';
		echo '<tr><td>Userid:</td>';
		echo '<td><input type="text" name="userid"></td></tr>';
		echo '<tr><td>password:</td>';
		echo '<td><input type="password" name="password"></td></tr>';
		echo '<tr><td colspan="2" align="center">';
		echo '<input type="submit" value="Log in"></td></tr>';
		echo "</table></form>";
	}
?>
<br/>
<a href="members_only.php">Members section</a>
</body>
</html>
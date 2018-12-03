<?php
	error_reporting(0);
	session_start();
	echo '<h1>Members only</h1>';
	$session=$_SESSION['valid_user'];
	if (isset($session)) {
		# code...
		echo '<p>You are logged in as'.$session.'</p>';
		echo '<p>Members only content goes here</p>';
	}
	else
	{
		echo '<p>You are not logged in</p>';
		echo '<p>Only logged in members may see this page</p>';
	}

	echo '<a href="authmain.php">Back to main page</a>';
?>
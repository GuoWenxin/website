<?php
	session_start();
	echo 'The content of $_SESSION[\'sess_var\'] is '.$_SESSION['sess_var'].'<br/>';
	session_destroy();
  ?>
  <a href="page3.php">Next Page</a>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Browse Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php
	$current_dir="./uploads/";
	$dir=opendir($current_dir);

	echo "<p>Upload directory is $current_dir</p>";
	echo "<p>Directory Listing:</p>";
	while (false !=($file=readdir($dir))) {
		# code...
		if($file != "." && $file !="..") 
		{
			# code...
			$path=$current_dir.$file;
			echo "<li><a href=$path>$file</a></li>";
		}
	}
	echo "</ul>";
	closedir($dir);
?>
</body>
</html>
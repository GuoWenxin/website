<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>上传中...</title>
</head>
<body>
<form action="./upload.html">
	<input type="submit" value="return"/>
</form>
<h1>Uploading file...</h1>
<?php
	const SERVER_PATH="../server/";
	require SERVER_PATH."checksession.php";
	if(!checkTime())
	{
		return;
	}
	$userfile=$_FILES["userfile"];
	if($userfile["error"]>0)
	{
		echo "Proklem:";
		switch ($userfile["error"]) {
			case 1:echo "File exceeded upload_max_filesize";
				# code...
				break;
			case 2:echo "File exceeded max_file_size";
				break;
			case 3:echo "File only partially uploaded";
				break;
			case 4:echo "No file uploaded";
				break;
			case 6:
				echo "Cannot upload file:No temp directory specified";
				break;
			case 7:echo "Upload failed:Cannot write to disk";
				break;
		}
		exit;
	}
	//Doed the file have the right MIME type?
	//if($userfile["type"]!="text/plain")
	//{
	//	echo "Problem:file is not plain text";
	//	exit;
	//}
	//put the file whrer we~d like it
	$dirname='./uploads/';
	if (!is_dir($dirname)) {//check the dir is exist,if it is not exist create it
		# code...
		mkdir($dirname);
	}
	$upfile='./uploads/'.$userfile["name"];
	if(is_uploaded_file($userfile["tmp_name"]))
	{
		if(!move_uploaded_file($userfile["tmp_name"], $upfile))
		{
			echo "Problem:Could not move file to distination directory";
			exit;
		}
	}
	else
	{
		echo "Problem:Possible file upload attack. Filename:";
		echo $userfile["name"];
		exit;
	}
	echo "File Upload Successfully<br><br>";
	//remove possible HTML and PHP tags from the file~s contents
	header("Content-Type:text/html;charset=utf-8");
	$contents=file_get_contents($upfile);
	$contents =strip_tags($contents);
	$contents=iconv("utf-8", "gbk", $contents);
	//file_put_contents($userfile["name"], $contents);

	// show what was upload
	echo "<p>Prewiew of upload file contents:<br/><hr/>";
	echo nl2br($contents);
	echo "<br/><hr/>";
?>
</body>
</html>
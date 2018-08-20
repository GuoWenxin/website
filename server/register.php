<?php
include_once "../server/globalconst.php";
$name=$_POST["name"];
$psw=$_POST["psw"];
$repsw=$_POST["repsw"];
if ($name=="") {
	# code...
	echo "<script>alert('用户名不能为空');window.location.href='../login/register.html'</script>";
	return;
}
if ($psw=="") {
	# code...
	echo "<script>alert('密码不能为空');window.location.href='../login/register.html'</script>";
	return;
}
if ($repsw=="") {
	# code...
	echo "<script>alert('确认密码不能为空');window.location.href='../login/register.html'</script>";
	return;
}
if ($psw!=$repsw) {
	# code...
	echo "<script>alert('两次密码输入不一致，请重新输入');window.location.href='../login/register.html'</script>";
	return;
}
//连接数据库
$mydata=mysqli_connect(DB_IP,DB_LOGIN_NAME,DB_LOGIN_PSW);
if (mysqli_connect_error()) {
	# code...
	echo mysqli_connect_error();
	return;
}
//校验用户名和密码防止sql注入
$name=mysqli_real_escape_string($mydata,$name);
$psw=mysqli_real_escape_string($mydata,$name);
//选择数据库
mysqli_query($mydata,"set name utf8");
mysqli_select_db($mydata,"mydb");
//查看改用户是否已经存在
$sql1="select id from userinfo where name='".$name."';";
$result=mysqli_query($mydata,$sql1);
$resultnum=mysqli_fetch_row($result);
if ($resultnum[0]!='') {
	# code...
	echo "<script>alert('该用户名已经注册，请重新输入用户名');window.location.href='../login/register.html'</script>";
	return;
}
$sql2="insert into userinfo (name,password) values('".$name."','".$psw."');";
$result0=mysqli_query($mydata,$sql2);
if ($result0==true) {
	# code...
	echo "<script>alert('注册成功请登录');window.location.href='../index.html'</script>";
	return;
}
else
{
	echo "<script>alert('注册失败，请重新注册');window.location.href='../login/register.html'</script>";
	return;
}
?>
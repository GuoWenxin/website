<?php
const SERVER_PATH="./";
include_once SERVER_PATH."checksession.php";
include_once SERVER_PATH."globalconst.php";
$name=$_POST["name"];
$psw=$_POST["psw"];
$yzm0=$_POST["yzmconent"];
$yzm1=$_POST["yzm"];
$yzm1=strtoupper($yzm1);
//验证码处理
if ($yzm0=="null" || $yzm0!=$yzm1) {
	# code...
	echo "<script>alert('请输入正确的验证码!');window.location.href='../index.html';</script>";
	return;
}
//连接数据库
$mydata=mysqli_connect(DB_IP,DB_LOGIN_NAME,DB_LOGIN_PSW);
if (mysqli_connect_error()) {
	# code...
	echo mysqli_connect_error();
	return;
}
//校验用户名和密码是否合法（防止sql注入）
$name=mysqli_real_escape_string($mydata,$name);
$psw=mysqli_real_escape_string($mydata,$psw);

//选择数据库
mysqli_query($mydata,"set name utf8");
mysqli_select_db($mydata,"mydb");

//查询
$sql="select password from userinfo where name ='".$name."';";
$result=mysqli_query($mydata,$sql);
$num_result=mysqli_fetch_row($result);
//$num_results=mysqli_num_rows($result);
if ($num_result[0]=="") {
	# code...
	echo "<script>alert('账号不存在!');window.location.href='../index.html';</script>";
}
else
{
	if ($psw==$num_result[0]) {
		# code...
		//echo "<script>window.location.href='../upload/index.html';</script>";
		echo "<script>window.location.href='../frame/frame.html?user=".$name."';</script>";
		setTime();
	}
	else
	{
		echo "<script>alert('账号或密码不正确');window.location.href='../index.html';</script>";
	}
}
?>
<?php
	include_once SERVER_PATH.'getIp.php';
	include_once SERVER_PATH.'cache/cacheClass.php';
	date_default_timezone_set("Asia/Shanghai");
	$time=0;

	function setTime()
	{
		$cacheFile = new Inc_FileCache();  
		// echo getIP();
		// echo '设置时间'.time();
		// $GLOBALS['time']=time();
		// echo '记录时间:'.$GLOBALS['time'];
		// checkTime();
		$val=getIP();
		$cacheFile->set($val,time());
	}

	function checkTime()
	{
		//echo '当前时间'.time().'   记录时间:'.$GLOBALS['time'];
		$cacheFile = new Inc_FileCache(); 
		$val=getIP();
		$time=$cacheFile->get($val);
		if ($time==null) {
			# code...
			echo "<script>alert('您尚未登录，请登录');window.location.href='../index.html';</script>";
			return false;
		}
		else
		{
			$deltatime=time()-$time;
			if($deltatime>20)
			{
				echo "<script>alert('登录已过期，请重新登录');window.location.href='../index.html';</script>";
				return false;
			}
		}
		$cacheFile->set($val,time());
		return true;
	}
	//checkTime();

?>

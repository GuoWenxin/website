<?php  
include("./cacheClass.php");  
  
$cacheFile = new Inc_FileCache(array('cacheTime'=>60,'suffix'=>'.php'));   
  
$value1 = '缓存成功1';  
$value2 = '缓存成功2';  
$value3 = '缓存成功3';  
  
$cacheFile->set('key1',$value1);   
$cacheFile->set('key2',$value2);  
$cacheFile->set('key3',$value3);  
  
echo $cacheFile->get('key3');   
?>  
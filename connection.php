<?php
//connectoin with db
$db="portfolio";
$link= mysqli_connect("localhost", "root", "", $db);
 define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/portfolio/');
define('SITE_PATH','http://127.0.0.1/portfolio/');
 
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'image/');
 define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'image/'); 
if(!$link){
	die(mysqli_error($link).mysqli_errno($link));
}
?>
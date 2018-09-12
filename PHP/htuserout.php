<?php

session_start();

if( !empty($_SESSION['htname']))
{
	unset($_SESSION['htname']);
	$msg = '退出成功';
	$jumpUrl = 'admin.php';
	include 'Jump.php';
	exit;
};
if(!empty($_COOKIE['htname']))
{
	setcookie("htname",'1',time()-1,'/');
	setcookie("htword",'1',time()-1,'/');	
	$msg = '退出成功';
	$jumpUrl = 'admin.php';
	include 'Jump.php';
	exit;
	}

?>
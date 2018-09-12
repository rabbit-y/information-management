<?php

session_start();

if( !empty($_SESSION['name']))
{
	unset($_SESSION['name']);
	$msg = '退出成功';
	$jumpUrl = '../user.php';
	include 'Jump.php';
	exit;
};
if(!empty($_COOKIE['name']))
{
	setcookie('name','1',time()-1,'/');
	setcookie('word','1',time()-1,'/');	
	$msg = '退出成功';
	$jumpUrl = '../user.php';
	include 'Jump.php';
	exit;
	}

?>
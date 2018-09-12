<?php
session_start();
header('Content-type:text/html;charset=utf8');

$conn = new mysqli('localhost','root','HanYan0..0','yanhan');
if( $conn->connect_error )
{
	die('连接错误');
};

?>
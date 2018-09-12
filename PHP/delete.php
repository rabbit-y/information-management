<?php

include 'configPhP.php';

$id = $_GET['id'];
$sql = "DELETE FROM u_article WHERE u_id=$id";

$jumpUrl = 'column.php';
if( $conn->query($sql) )
{
	$msg = '删除成功';
	include 'Jump.php';
	exit;
}
else
{
	$msg = '删除失败';
	include 'Jump.php';
	exit;
};

?>
<?php
include 'configPhP.php';

$msg = '';
$jumpUrl = 'admin.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	if( empty($_POST['username']) )
	{
		$msg = '用户名不能为空';
		include 'Jump.php';		
		exit;
	}
	else
	{
		$re = '/^[a-zA-Z0-9]{5,10}$/';
		if( !preg_match($re,$_POST['username']) )
		{
			$msg = '用户名格式不正确';
			include 'Jump.php';
			exit;
		};
	};		
	
	if( empty($_POST['password']) )
	{
		$msg = '密码不能为空';
		include 'Jump.php';
		exit;
	}
	else
	{
		$re = '/^\w{5,20}$/';
		if( !preg_match($re,$_POST['password']) )
		{
			$msg = '密码格式不正确';
			include 'Jump.php';
			exit;
		};
	};
	
	
	
	$sql = 'SELECT * FROM ht_user';
    $result = $conn->query($sql);
		
	while( $row = $result->fetch_assoc() )
	{
		if( $row['ht_username'] == $_POST['username'] ){	
			if($row['ht_password'] == $_POST['password']){
				if(!empty($_POST['checkbox']))
				{	
					$msg = '登录成功';
					$jumpUrl = 'column.php';
					include 'Jump.php';
					setcookie("htname",$_POST['username'],time()+60*60*24*7,'/');
   					setcookie("htword",$_POST['password'],time()+60*60*24*7,'/');		
					exit;
					}else{
						$msg = '登录成功';
						$jumpUrl = 'column.php';
						include 'Jump.php';
						$_SESSION['htname'] = $_POST['username'];
					    exit;
						}
				
			 }else{
				$msg = '密码错误';
				include 'Jump.php';
				exit;
			 }
		}
	} 
	
	$msg = '用户名不存在';
	include 'Jump.php';
	exit;
}
else
{
	$msg = '非法登录';
	include 'Jump.php';
	exit;
	}
?>
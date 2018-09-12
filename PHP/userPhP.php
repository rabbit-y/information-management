<?php
include 'configPhP.php';

$msg = '';
$jumpUrl = '../user.php';

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
	
	
	$sql = 'SELECT * FROM u_user';
    $result = $conn->query($sql);
	while( $row = $result->fetch_assoc() )
	{
		if( $row['u_username'] == $_POST['username'] ){	
			if($row['u_password'] == md5($_POST['password'])){
				if(!empty($_POST['checkbox']))
				{	
					$msg = '登录成功';
					$jumpUrl = '../index.php';
					include 'Jump.php';
					setcookie('name',$_POST['username'],time()+60*60*24*7,'/');
   					setcookie('word',$_POST['password'],time()+60*60*24*7,'/');		
					exit;
					}else{
						$msg = '登录成功';
						$jumpUrl = '../index.php';
						include 'Jump.php';
						$_SESSION['name'] = $_POST['username'];
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
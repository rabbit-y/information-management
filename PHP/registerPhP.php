<?php
include 'configPhP.php';

$msg = '';
$jumpUrl = '../register.php';

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
	
	if( empty($_POST['password1']) )
	{
		$msg = '密码不能为空';
		include 'Jump.php';
		exit;
	}
	else
	{
		$re = '/^\w{5,20}$/';
		if( !preg_match($re,$_POST['password1']) )
		{
			$msg = '密码格式不正确';
			include 'Jump.php';
			exit;
		};
	};
	
	if( $_POST['password1'] != $_POST['password2']  )
	{
		$msg = '两次密码不一致';
		include 'Jump.php';
		exit;
	};
	
	if( empty($_POST['email']) )
	{
		$msg = '邮箱不能为空';
		include 'Jump.php';
		exit;
	}
	else
	{
		$re = '/^\w+@\w+\.\w+$/';
		if( !preg_match($re,$_POST['email']) )
		{
			$msg = '邮箱格式不正确';
		include 'Jump.php';
			exit;
		};
	};
	
	if( empty($_POST['tel']) )
	{
		$msg = '手机号不能为空';
		include 'Jump.php';
		exit;
	}
	else
	{
		$re = '/^1[357698]\d{9}$/';
		if( !preg_match($re,$_POST['tel']) )
		{
			$msg = '手机号格式不正确';
		include 'Jump.php';
			exit;
		};
	};
	
	if( $_POST['area']=='0' )
	{
		$msg = '请选择地区';
		include 'Jump.php';
		exit;
	};
	
	
	if( empty($_POST['sex']) )
	{
		$msg = '请选择性别';
		include 'Jump.php';
		exit;
	};
	

	$hobbyStr = '';
	if( empty($_POST['hobby']) )
	{
		$msg = '请选择一个爱好';
		include 'Jump.php';
		exit;
	}
	else
	{
		for($i=0;$i<count($_POST['hobby']);$i++)
		{
			
			if( empty($hobbyStr) )
			{
				$hobbyStr .= $_POST['hobby'][$i];
			}
			else
			{
				$hobbyStr .= '|'.$_POST['hobby'][$i];
			};
		};
	};
	
	
	if( empty($_POST['isAgreen']) )
	{
		$msg = '请认真阅读协议';
		include 'Jump.php';
		exit;
	}
	
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
	
	$username = $_POST['username'];
	$password = md5($_POST['password1']);
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$area = $_POST['area'];
	$sex = $_POST['sex'];
	
		$sql = "SELECT * FROM u_user WHERE u_username='$username'";
		$result = $conn->query( $sql );
		
	if( $result->num_rows > 0 )
	{
		$msg = '用户名已经存在';
		$jumpUrl = '../user.php';
		include 'Jump.php';
		exit;
	}
};
	
	$sql = "INSERT INTO u_user (u_username,u_password,u_email,u_tel,u_area,u_sex,u_hobby) VALUES('$username','$password','$email','$tel','$area','$sex','$hobbyStr')";
	if( $conn->query($sql)  )
	{	
		$msg = '注册成功';
		$jumpUrl = '../user.php';
		include 'Jump.php';
		exit;
	}
}
else
{
	$msg = '非法注册';
	$jumpUrl = '../user.php';
	include 'Jump.php';
	exit;
};


?>
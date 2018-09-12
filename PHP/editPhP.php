<?php

include 'configPhP.php';

$id = $_GET['id'];
$msg = '';
$dir = '../upimg/';


$jumpUrl = 'column.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	
	$file = $_FILES['upfile'];
	
	$title = $_POST['title'];
	$column = $_POST['column'];
	$description = $_POST['description'];
	$keyword = $_POST['keyword'];
	$content = $_POST['editorValue'];
	
	if( empty($file['name']) )
	{

		$sql = "UPDATE u_article SET u_title='$title',u_column='$column',u_description='$description',u_keyword='$keyword',u_contents='$content' WHERE u_id=$id";
		
		if($conn->query($sql))
		{
			$msg = '修改成功';
			include 'Jump.php';
			exit;
		}
		else
		{
			$msg = '修改失败';
			include 'Jump.php';
			exit;
		};
		
	};
	/////////////////////////////////////////////////////以上没有上传缩略图
	
	/////////////////////////////////////////////////////下面是上传缩略图

	if( $file['error']>0 )
	{
		$msg = '上传错误';
		include 'Jump.php';
		exit;
	};
	
	$fileSize = $file['size'];
	$fileMaxSize = 1*1024*1024;//1M
	if( $fileSize>$fileMaxSize )
	{
		$msg = '文件太大';
		include 'Jump.php';
		exit;
	};
	
	$fileUploadType = $file['type'];
	$typeArr = [
		'image/jpeg',
		'image/png',
		'image/gif'
	];
	
	if( !in_array($fileUploadType,$typeArr) )
	{
		$msg = '请上传一个图片';
		include 'Jump.php';
		exit;
	};
	
	$fileName = $file['name'];
	$fileNameArr = explode('.',$fileName);
	$suffixName = array_pop($fileNameArr);
	$fileNewName = date('YmdHis').rand(10000,99999).'.'.$suffixName;
	
	if( !move_uploaded_file( $file['tmp_name'],$dir.$fileNewName ) )
	{
		$msg = '上传失败';
		include 'Jump.php';
		exit;	
	};
	
	$thumb = 'upimg/'.$fileNewName;
	
	$sql = "UPDATE u_article SET u_title='$title',u_column='$column',u_description='$description',u_keyword='$keyword',u_contents='$content',u_thumb = '$thumb' WHERE u_id=$id";
		
	if($conn->query($sql))
	{
		$msg = '修改成功';
		include 'Jump.php';
		exit;
	}
	else
	{
		$msg = '修改失败';
		include 'Jump.php';
		exit;
	};
	
	if( $conn->query( $sql ) )
	{
		$msg = '修改文章成功';
		$jumpUrl = 'column.php';
		include 'Jump.php';
		exit;
	}
	else
	{
		$msg = '修改文章失败';
		include 'Jump.php';
		exit;
	};
	
	
}
else
{
	$msg = '非法提交';
	include 'Jump.php';
	exit;
};

?>
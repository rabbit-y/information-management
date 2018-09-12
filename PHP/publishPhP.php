<?php
include 'configPhP.php';

$msg = '';
$jumpUrl = 'publish.php';

$dir = '../upimg/';

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{

	$file = $_FILES['upfile'];
	if( $file['error']>0 )
	{
		$msg = '上传错误--错误代码：'.$file['error'];
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
	
	//3 文件类型
	$fileUploadType = $file['type'];
	$typeArr = [
		'image/jpeg',
		'image/png',
		'image/gif'
	];
	
	if( !in_array($fileUploadType,$typeArr) )
	{
		$msg = '请上传一个正确的图片';
		include 'Jump.php';		
		exit;
	};
	
	$fileName = $file['name'];
	$fileNameArr = explode('.',$fileName);
	$suffixName = array_pop($fileNameArr);
	
	$fileNewName = date('YmdHis').rand(10000,99999).'.'.$suffixName;
	//echo $fileNewName;
	
	//5移动 文件
	
	if( !move_uploaded_file( $file['tmp_name'],$dir.$fileNewName ) )
	{
		$msg = '图片上传失败';
		include 'Jump.php';		
		exit;
	};
	
	//获取数据
	$title = $_POST['title'];
	$column = $_POST['column'];
	$description = $_POST['description'];
	$keyword = $_POST['keyword'];
	$content = $_POST['editorValue'];
	if(!empty($_SESSION['htname'])){
			        $author = $_SESSION['htname'];
				}else{
					$author = $_COOKIE['htname'];
				};
	$thumb = 'upimg/'.$fileNewName;
	$times = time();
	
	$sql = "INSERT INTO u_article (u_title,u_column,u_description,u_keyword,u_contents,u_author,u_thumb,u_add_date) VALUES ( '$title','$column','$description','$keyword','$content','$author','$thumb','$times' )";
	
	if( $conn->query( $sql ) )
	{
		$msg = '发布文章成功';
		$jumpUrl = 'column.php';
		include 'Jump.php';
		exit;
	}
	else
	{
		$msg = '发布文章失败';
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
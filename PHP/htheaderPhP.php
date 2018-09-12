<?php

 if(empty($_SESSION['htname'])){
   if(empty($_COOKIE['htname'])||empty($_COOKIE['htword'])){
	    $msg = '请登录';
		$jumpUrl = 'admin.php';
		include 'Jump.php';
		exit;
  	}else{
    		$_POST['username'] = $_COOKIE['htname'];
			$_POST['password'] = $_COOKIE['htword'];
	     }
	}	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/site.css">
    <link href="../umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="../umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="../umeditor/lang/zh-cn/zh-cn.js"></script>
</head>

<body>


	<div class="container">
    	<div class="projects-header page-header">
        	<h2>后台信息系统 <small>欢迎您：
			<?php 
			  if(!empty($_SESSION['htname'])){
			        echo $_SESSION['htname'];
				}else{
					echo $_COOKIE['htname'];
				}	
			
			?>
            </small>
            	<a href="htuserout.php" style="font-size:12px;color:red;">注销</a>
            </h2>
   		</div>
        <div class="row">
        	<div class="col-md-3">
            	<ul class="list-group">
                  <li class="list-group-item list-group-item-success"><a href="column.php">文章栏目</a></li>
                  <li class="list-group-item"><a href="column.php<?php echo '?column=Web前端开发';?>">Web前端开发</a></li>
                  <li class="list-group-item"><a href="column.php<?php echo '?column=UI设计';?>">UI设计</a></li>
                  <li class="list-group-item"><a href="column.php<?php echo '?column=PHP开发';?>">PHP开发</a></li>
                  <li class="list-group-item"><a href="column.php<?php echo '?column=JAVA开发';?>">JAVA开发</a></li>
                  <li class="list-group-item"><a href="column.php<?php echo '?column=网络营销';?>">网络营销</a></li>
                  <li class="list-group-item"><a href="publish.php">发布文章</a></li>
                </ul>
            </div>
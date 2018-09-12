<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Title</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div>
<!--导航-->
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#a1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand">首页</a> </div>
    <div class="collapse navbar-collapse" id="a1">
      <ul class="nav navbar-nav">
        <li><a href="information.php">前端资讯</a></li>
        <li><a href="select.php">课程选择</a></li>
        <li><a href="vote.php">投票</a></li>
        <li><a href="search.php">搜索</a></li>
        <li>
        	<?php
				if(empty($_COOKIE['name']) && empty($_SESSION['name'])){
					echo '<a href="register.php">注册</a>';
					}else{
						if(!empty($_SESSION['name'])){
								echo '<a href="#">'.$_SESSION['name'].',您好！</a>';
							}else{
								echo '<a href="#">'.$_COOKIE['name'].',您好！</a>';
							}
						}
			?>
        </li>
        <li>
			<?php
				if(empty($_COOKIE['name']) && empty($_SESSION['name'])){
					echo '<a href="user.php">登录</a>';
					}else{
						echo '<a href="PHP/userout.php">注销</a>';
					}
                ?>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">关于我们</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<!--banner图-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: 50px;"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active"> <img src="image/hdp_01.jpg" alt="..."> </div>
    <div class="item"> <img src="image/hdp_01.jpg" alt="..."> </div>
  </div>
  
  <!-- Controls --> 
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

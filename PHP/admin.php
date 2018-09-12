<?php
include 'configPhP.php';

if( !empty($_SESSION['htname']) || !empty($_COOKIE['htname']))
{
	$msg = '己登录，无须重复登录';
	$jumpUrl = 'column.php';
	include 'Jump.php';
	exit;
};
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
<style type="text/css">
* {
	margin: 0px;
	padding: 0px;
}
.error-container {
	background: #fff;
	border: 1px solid #eaeaea;
	text-align: center;
	width: 450px;
	font-family: Microsoft Yahei;
	padding-bottom: 30px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -225px;
}
.error-container h1 {
	font-size: 16px;
	padding: 12px 0;
	background: #303030;
	color: #fff;
	margin: 0;
}
.errorcon {
	padding: 35px 0;
	text-align: center;
	color: #f00;
	font-size: 18px;
}
.errorcon i {
	display: block;
	margin: 12px auto;
	font-size: 30px;
}
.errorcon span {
	color: red;
}
h4 {
	font-size: 14px;
	color: #666;
}
a {
	color: #f00;
}
</style>
</head>
<body class="no-skin">
<div class="error-container">
  <h1> 后台登陆 </h1>
  <div style="width:300px; margin:20px auto 0;">
  <form class="form-horizontal" role="form" method="post" action="adminPhP.php" id="form1">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="用户名">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-3 control-label">密码</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="输入密码">
      </div>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="checkbox">
          七天免登陆</label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-danger" value="&nbsp;登录&nbsp;">
      </div>
    </div>
    </div>
  </form>
</div>
</body>
</html>
<script>
/*var oForm = document.getElementById('form1');


	oForm.onsubmit = function(){

		if( oForm.username.value == '' )
		 {
		 alert('用户名不能为空');
		 return false;
		 }

		 var re = /^[a-zA-Z0-9]{5,10}$/;

		 if( !re.test(oForm.username.value)) {
		 alert('用户名格式不正确');
		 return false;
		 }

		 if( oForm.password.value == '' ){
		 alert('密码不能为空');
		 return false;
		 }
	}*/
</script>
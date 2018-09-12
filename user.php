<?php
    include 'PHP/configPhP.php';
    include 'headerPhP.php';
	
	if( !empty($_SESSION['name']) || !empty($_COOKIE['name']))
   {
	$msg = '己登录，无须重复登录';
	$jumpUrl = 'index.php';
	include 'PHP/Jump.php';
	exit;
    };
?>
        <!--路径导航-->
        <div>
            <ul class="breadcrumb">
                <li><a href="index.php">首页</a></li>
                <li class="active">用户登录</li>
            </ul>
        </div>
        <!--用户登录-->
        <h3>用户登录</h3>
        <hr>
        <form class="form-horizontal" id="form1" role="form" action="PHP/userPhP.php" method="post">
 	        <div class="form-group">
                <label for="username" class="col-md-2 control-label">用户名：</label>
                <div class="col-md-10">
        	        <input id="username" name="username" type="text" value="" placeholder="请输入用户名" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-2 control-label">密码：</label>
                <div class="col-md-10">
                    <input id="password" name="password" type="password" placeholder="请输入密码" class="form-control">
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-3 col-md-offset-2">
                <label>
                  <input type="checkbox" name="checkbox">
                  七天免登陆</label>
              </div>
            </div>
            <div class="form-group">
    	        <div class="col-md-3 col-md-offset-2">
        	        <input type="submit" value="登录" class="btn btn-default btn-success">
        	        <input type="submit" value="重置" class="btn btn-default">
        	        <input type="submit" value="没有账号，去注册" class="btn btn-default btn-danger">
                </div>
            </div>
        </form>       
<?php 
  include 'footerPhP.php'
?>

<script>
var oForm = document.getElementById('form1');


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
	}
</script>

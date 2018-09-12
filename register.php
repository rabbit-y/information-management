<?php 
    include 'PHP/configPhP.php';
    include 'headerPhP.php'
?>
		<!--路径导航-->
		<div>
			<ul class="breadcrumb">
				<li><a href="index.php">首页</a></li>
				<li class="active">用户登录</li>
			</ul>
		</div>
		<!--用户注册-->
		<h3>用户注册</h3>
		<hr>
		<form class="form-horizontal" role="form" action="PHP/registerPhP.php" id="form1" method="post">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" name="username" placeholder="请输入5~10位的英文字母或数字">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">输入密码</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3" name="password1" placeholder="请输入5~20位的密码">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword4" class="col-sm-2 control-label">确认密码</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword4" name="password2" placeholder="请再输入一次密码">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail2" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail2" name="email" placeholder="请输入正确的邮箱地址">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail4" class="col-sm-2 control-label">手机号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail4" name="tel" placeholder="请输入手机号">
				</div>
			</div>
			<div class="form-group">
				<label for="inputArea" class="col-sm-2 control-label">地区</label>
				<div class="col-sm-10">
					<select class="form-control" id="inputArea" name="area">
						<option value="0">请选择省份</option>
						<option>北京</option>
						<option>长春</option>
						<option>上海</option>
						<option>香格里拉</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<b class="col-sm-2 control-label">性别</b>
				<div class="col-sm-10">
					<label class="radio-inline">
						<input type="radio" name="sex" id="inlineRadio2" value="男"> 男
					</label>
					<label class="radio-inline">
						<input type="radio" name="sex" id="inlineRadio3" value="女"> 女
					</label>
				</div>
			</div>
			<div class="form-group">
				<b class="col-sm-2 control-label">爱好</b>
				<div class="col-sm-10">
					<label class="checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="hobby[]" value="音乐"> 音乐
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" id="inlineCheckbox2" name="hobby[]" value="旅游"> 旅游
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" id="inlineCheckbox3" name="hobby[]" value="登山"> 登山
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="isAgreen"> 阅读并接受
						</label>
						<button type="button" class="btn-link" data-toggle="modal" data-target="#myModal">《用户协议》</button>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" class="btn btn-success" value="注册"> <input type="reset" class="btn btn-default" value="重置" /> <a href="login.html" class="btn btn-danger">已有账号，去登录</a>
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

		 if( oForm.password1.value == '' ){
		 alert('密码不能为空');
		 return false;
		 };

		 re = /^\w{5,20}$/;
		 if( !re.test(oForm.password1.value) ){
		 alert('密码格式不正确');
		 return false;
		 }

		 if(oForm.password1.value != oForm.password2.value){
			 alert('两次密码不正确');
			 return false;
		 }

		 if( oForm.email.value == '' ){
			 alert('邮箱不能为空');
			 return false;
		 }

		 re = /^\w+@\w+\.\w+$/;
		 if( !re.test(oForm.email.value) ){
			 alert('邮箱格式不正确');
			 return false;
		 }

		 if( oForm.tel.value == '' ){
			 alert('手机号不能为空');
			 return false;
		 }

		 re = /^1[357698]\d{9}$/;
		 if( !re.test(oForm.tel.value) ){
			 alert('手机号格式不正确');
			 return false;
		 }


		 if( oForm.area.value == '0' ){
			 alert('请选择省份');
			 return false;
		 }


		 var flag = false;
		 for( var i=0;i<oForm.sex.length;i++ ){
			 if( oForm.sex[i].checked ){
				 flag = true;
			 }
		 }

		 if( !flag ){
			 alert('请选择性别');
			 return false;
		 }


		 var flag = false;
		 for(var i=0;i<oForm.hobby.length;i++) {
			 if( oForm.hobby[i].checked )
			 {
				 flag = true;
			 }
		 }
		 if( !flag ) {
			 alert('选一个爱好呗');
			 return false;
		 }

		 if( !oForm.isAgreen.checked ) {
			 alert('请认真阅读协议');
			 return false;
		 }
	};
</script>

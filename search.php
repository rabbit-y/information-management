<?php 
include 'PHP/configPhP.php';
	
include 'headerPhP.php';
?>
    <!--路径导航-->
    <div>
      <ul class="breadcrumb">
        <li><a href="../index.php">首页</a></li>
        <li class="active">搜索</li>
      </ul>
    </div>
    <!--搜索-->
    <form class="form-inline" style = "width:300px;margin: 100px auto;" action="PHP/searchPhP.php">
      <div class="form-group">
        <label for="search"></label>
        <input id="search" type="搜索" placeholder="请输入要搜索的内容" class="form-control">
      </div>
      <div class="form-group">
        <input type="button" value="搜索" class="btn btn-default" id="btn">
      </div>
    </form>
    <div id="box"></div>
    <?php 
  include 'footerPhP.php'
?>
<script>

var oBtn = document.getElementById('btn');
var oTxt = document.getElementById('search');
var oDiv = document.getElementById('box');

oBtn.onclick = function()
{
	var q = oTxt.value;
	ajax( 'PHP/searchPhP.php',q);
};

function ajax(url,q)
{
	if( window.XMLHttpRequest )
	{
		var Ajax = new window.XMLHttpRequest();
	}
	else
	{
		var Ajax = new ActiveXObject('Microsoft.XMLHTTP');
	};

	
	Ajax.open('get',url+'?q='+ q +'&t='+Math.random(),true);

	Ajax.send();
	
	Ajax.onreadystatechange = function()
	{
	
		if( Ajax.readyState == 4 && Ajax.status == 200 )
		{
			oDiv.innerHTML = Ajax.responseText;
		};
	};
};

</script>
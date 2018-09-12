<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style>
.warp {width:500px;height:300px;margin:0 auto;background:url(../image/bg.jpg) no-repeat; background-size: contain;padding:150px 0;}
.warp h2{height:100px;color: #D40000;height:100px; text-align:center; margin:0; line-height:30px;}
.box{ text-align:center;}

</style>
</head>

<body>
<div class="warp">
    <h2><?php echo $msg; ?></h2>
    <div class="box">还有<span id="span1">3</span>秒进行跳转<br><a href="<?php echo $jumpUrl;?>" id="aA">或者直接跳转</a></div>
</div>
</body>
</html>
<script>

var oSpan = document.getElementById('span1');

var timer = null;

var num = oSpan.innerHTML;
var oHref = document.getElementById('aA').href;

timer = setInterval( function(){
	
	num--;
	if( num<=0 )
	{
		num = 0;
		clearInterval( timer );
		window.location.href = oHref;
	};
	oSpan.innerHTML = num;
	
},1000 );


</script>
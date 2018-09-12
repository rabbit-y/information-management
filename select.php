<?php 
    include 'PHP/configPhP.php';
    include 'headerPhP.php'
?>
<script>
function sel(page){
	var selectValue = document.getElementById("select").value;
	//alert(changeValue);
	if(window.XMLHttpRequest){
		var xHttp = new XMLHttpRequest();	
	}else{
		var xHttp = new ActiveXObject("Microsoft.XMLHTTP");	
	}
	xHttp.open("GET","PHP/selectPhP.php?clumn="+selectValue+"&page="+page);
	xHttp.send();
	xHttp.onreadystatechange = function(){
		if(xHttp.readyState==4 && xHttp.status==200){
			document.getElementById("cont").innerHTML = xHttp.responseText;
		}	
	}	
}
</script>
        <!--路径导航-->
        <div>
            <ul class="breadcrumb">
                <li><a href="index.php">首页</a></li>
                <li class="active">课程选择</li>
            </ul>
        </div>
        <!--下拉菜单-->
        <div class="dropdown">
            <select class="form-control" style="width:230px" id="select" onChange="sel(0)">
                  <option>全部课程</option>
                  <option>Web前端开发</option>
                  <option>UI设计</option>
                  <option>网络营销</option>
                  <option>PHP开发</option>
        	</select>
            <hr>
    </div>
    <div id="cont"></div>
<script>
sel();
</script>	
<?php 
  include 'footerPhP.php'
?>
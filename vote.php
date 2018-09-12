<?php 
    include 'PHP/configPhP.php';
    include 'headerPhP.php'
?>
<script>
function vote(){
	var voteArr = document.getElementsByName("optionsRadios");
	var voteValue = 0;
	for(var i=0; i<voteArr.length; i++){
		if(voteArr[i].checked == true){
			voteValue = voteArr[i].value;
		}
	}
	
	if(window.XMLHttpRequest){
		var xHttp = new XMLHttpRequest();
	}else{
		var xHttp = new ActiveXObject("Microsoft.XMLHTTP");	
	}
	xHttp.open("GET","php/votePhP.php?num="+voteValue);
	xHttp.send();
	xHttp.onreadystatechange = function(){
		if(xHttp.readyState==4 && xHttp.status == 200){
			document.getElementById("vote").innerHTML = xHttp.responseText;
		}	
	}
	
}

</script>
    <!--路径导航-->
  <div id = "vote">
    <div>
      <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">投票</li>
      </ul>
    </div>
    <!--投票-->
    <h3>请选择你喜欢的课程</h3>
    <p>你觉得你比较喜欢下列那个课程，请选择</p>
    <hr>
    <div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
          PC端网站重构</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
          移动端网站重构</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios3" value="3">
          JavaScript</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios4" value="4">
          JQ</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios5" value="5">
          Bootstarp</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios6" value="6">
          Angular</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios7" value="7">
          H5高级课程</label>
      </div>
      <input type="button" id="btn" value="投票" onClick="vote()">
    </div>
  </div>
<?php 
  include 'footerPhP.php'
?>


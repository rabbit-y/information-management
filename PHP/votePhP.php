<?php
include 'configPhP.php';

	$vote = $_REQUEST["num"];
	$fileUrl = "../txt/vote.txt";
	$voteArr = file_get_contents($fileUrl);
	$arr = explode("|",$voteArr);
	
	$pc = $arr[0];
	$yd = $arr[1];
	$js = $arr[2];
	$jq = $arr[3];
	$bt = $arr[4];
	$an = $arr[5];
	$h5 = $arr[6];
	
	switch($vote){
		case 1:
			$pc=$pc+1;
			break;
		case 2:
			$yd=$yd+1;
			break;
		case 3:
			$js=$js+1;
			break;
		case 4:
			$jq=$jq+1;
			break;
		case 5:
			$bt=$bt+1;
			break;
		case 6:
			$an=$an+1;
			break;
		case 7:
			$h5=$h5+1;
			break;
	}
	
	$voteStr = $pc."|".$yd."|".$js."|".$jq."|".$bt."|".$an."|".$h5;
	$file = fopen($fileUrl,"w");
	fwrite($file,$voteStr);
	fclose($file);
	
	$voteSum = $pc+$yd+$js+$jq+$bt+$an+$h5;
?>
<!--投票2-->
    <h3>各个科目受欢迎的百分比</h3>
    <p>次数据来自网站<?php echo $voteSum; ?>份用户投票结果</p>
    <hr>
    <div>
      <div>
        <h4>PC端网站重构（<?php echo round(($pc/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-success progress-bar-striped" style="width:<?php echo round(($pc/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
      <div>
        <h4>移动端网站重构（（<?php echo round(($yd/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-striped
		   <?php
            if(round(($pc/$voteSum)*100,2)>=75){
                echo "progress-bar-success";	
            }elseif(round(($pc/$voteSum)*100,2)<75 && round(($pc/$voteSum)*100,2)>=50){
                echo "progress-bar-info";
            }elseif(round(($pc/$voteSum)*100,2)<50 && round(($pc/$voteSum)*100,2)>=25){
                echo "progress-bar-warning";
            }else{
                echo "progress-bar-danger";	
            }
          ?>
          "style="width:<?php echo round(($yd/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
      <div>
        <h4>JavaScript（<?php echo round(($js/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-striped
          		   <?php
            if(round(($pc/$voteSum)*100,2)>=75){
                echo "progress-bar-success";	
            }elseif(round(($pc/$voteSum)*100,2)<75 && round(($pc/$voteSum)*100,2)>=50){
                echo "progress-bar-info";
            }elseif(round(($pc/$voteSum)*100,2)<50 && round(($pc/$voteSum)*100,2)>=25){
                echo "progress-bar-warning";
            }else{
                echo "progress-bar-danger";	
            }
          ?>
          "style="width:<?php echo round(($js/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
      <div>
        <h4>JQ（<?php echo round(($jq/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-striped
          	<?php
            if(round(($pc/$voteSum)*100,2)>=75){
                echo "progress-bar-success";	
            }elseif(round(($pc/$voteSum)*100,2)<75 && round(($pc/$voteSum)*100,2)>=50){
                echo "progress-bar-info";
            }elseif(round(($pc/$voteSum)*100,2)<50 && round(($pc/$voteSum)*100,2)>=25){
                echo "progress-bar-warning";
            }else{
                echo "progress-bar-danger";	
            }
           ?>
          " style="width:<?php echo round(($jq/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
      <div>
        <h4>Bootstarp（<?php echo round(($bt/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-striped
          <?php
            if(round(($pc/$voteSum)*100,2)>=75){
                echo "progress-bar-success";	
            }elseif(round(($pc/$voteSum)*100,2)<75 && round(($pc/$voteSum)*100,2)>=50){
                echo "progress-bar-info";
            }elseif(round(($pc/$voteSum)*100,2)<50 && round(($pc/$voteSum)*100,2)>=25){
                echo "progress-bar-warning";
            }else{
                echo "progress-bar-danger";	
            }
          ?>
          "style="width:<?php echo round(($bt/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
      <div>
        <h4>Angular（<?php echo round(($an/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-striped
		   <?php
            if(round(($pc/$voteSum)*100,2)>=75){
                echo "progress-bar-success";	
            }elseif(round(($pc/$voteSum)*100,2)<75 && round(($pc/$voteSum)*100,2)>=50){
                echo "progress-bar-info";
            }elseif(round(($pc/$voteSum)*100,2)<50 && round(($pc/$voteSum)*100,2)>=25){
                echo "progress-bar-warning";
            }else{
                echo "progress-bar-danger";	
            }
          ?>          
          " style="width:<?php echo round(($an/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
      <div>
        <h4>H5高级课程（<?php echo round(($h5/$voteSum)*100,2);?>%）</h4>
        <div class="progress">
          <div class="progress-bar progress-bar-striped
		   <?php
            if(round(($pc/$voteSum)*100,2)>=75){
                echo "progress-bar-success";	
            }elseif(round(($pc/$voteSum)*100,2)<75 && round(($pc/$voteSum)*100,2)>=50){
                echo "progress-bar-info";
            }elseif(round(($pc/$voteSum)*100,2)<50 && round(($pc/$voteSum)*100,2)>=25){
                echo "progress-bar-warning";
            }else{
                echo "progress-bar-danger";	
            }
          ?>
          " style="width:<?php echo round(($h5/$voteSum)*100,2);?>%;"></div>
        </div>
      </div>
    </div>
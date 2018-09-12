<?php 
    include 'PHP/configPhP.php';
    include 'headerPhP.php';
	$sqlwlyx = "select * from u_article where u_column='网络营销' limit 0,4";
	$wlrelust = $conn->query($sqlwlyx);
	$sqlweb = "select * from u_article where u_column='Web前端开发' limit 0,4";
	$Webrelust = $conn->query($sqlweb);
	$sqljava = "select * from u_article where u_column='JAVA开发' limit 0,4";
	$Javarelust = $conn->query($sqljava);
	$sqlui = "select * from u_article where u_column='UI设计' limit 0,4";
	$Uirelust = $conn->query($sqlui);
	$sqlphp = "select * from u_article where u_column='PHP开发' limit 0,4";
	$Phprelust = $conn->query($sqlphp);
	$sqlall = "select * from u_article limit 0,4";
	$Allrelust = $conn->query($sqlall);
	
?>
        <!--路径导航-->
        <div>
            <ul class="breadcrumb">
                <li><a href="index.php">首页</a></li>
                <li class="active">前端资讯</li>
            </ul>
        </div>
        <!--列表-->
        <div class="row">
        <div class="col-md-6">
            <div class="list-group">
                <a class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-user"></span> 网络营销</a>
          <?php
          	if($wlrelust->num_rows>0){
				while($wlrow = $wlrelust->fetch_assoc()){
			
		  ?>
          <a href="content.php?id=<?php echo $wlrow["u_id"];?>" class="list-group-item"><?php echo $wlrow["u_title"];?></a>
          <?php
          			
				}
			}
		  ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-question-sign"></span> Web前端开发</a>
 		  <?php
          	if($Webrelust->num_rows>0){
				while($webrow = $Webrelust->fetch_assoc()){
			
		  ?>
          <a href="content.php?id=<?php echo $webrow["u_id"];?>" class="list-group-item"><?php echo $webrow["u_title"];?></a>
          <?php
          			
				}
			}
		  ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a class="list-group-item list-group-item"><span class="glyphicon glyphicon-th-large"></span> JAVA开发</a>
 		  <?php
          	if($Javarelust->num_rows>0){
				while($javarow = $Javarelust->fetch_assoc()){
			
		  ?>
          <a href="content.php?id=<?php echo $javarow["u_id"];?>" class="list-group-item"><?php echo $javarow["u_title"];?></a>
          <?php
          			
				}
			}
		  ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a class="list-group-item list-group-item primary"><span class="glyphicon glyphicon-list-alt"></span> UI设计</a>
 		  <?php
          	if($Uirelust->num_rows>0){
				while($uirow = $Uirelust->fetch_assoc()){
			
		  ?>
          <a href="content.php?id=<?php echo $uirow["u_id"];?>" class="list-group-item"><?php echo $uirow["u_title"];?></a>
          <?php
          			
				}
			}
		  ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a class="list-group-item list-group-item-warning"><span class="glyphicon glyphicon-list"></span> PHP开发</a>
 		  <?php
          	if($Phprelust->num_rows>0){
				while($phprow = $Phprelust->fetch_assoc()){
			
		  ?>
          <a href="content.php?id=<?php echo $phprow["u_id"];?>" class="list-group-item"><?php echo $phprow["u_title"];?></a>
          <?php
          			
				}
			}
		  ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-align-left"></span> 全部内容</a>
 		  <?php
          	if($Allrelust->num_rows>0){
				while($allrow = $Allrelust->fetch_assoc()){
			
		  ?>
          <a href="content.php?id=<?php echo $allrow["u_id"];?>" class="list-group-item"><?php echo $allrow["u_title"];?></a>
          <?php
          			
				}
			}
		  ?>
            </div>
        </div>
        </div>
<?php 
  include 'footerPhP.php'
?>
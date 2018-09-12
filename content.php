<?php 
include 'PHP/configPhP.php';
include 'headerPhP.php';

$id = $_GET['id'];

$sql = "SELECT * FROM u_article WHERE u_id=$id";

$result = $conn->query( $sql );

$row = $result->fetch_assoc();
?>
    <!--路径导航-->
    <div>
      <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li><a href="message.php?column=<?php echo $row['u_column']; ?>"><?php echo $row['u_column']; ?></a></li>
        <li class="active"><?php echo $row['u_title']; ?></li>
      </ul>
    </div>
    <!--内容-->
    <div class="projects-header page-header">
       <h2 class="text-center"><?php echo $row['u_title']; ?></h2>
       <p class="text-center">作者：<span class="alert-info"><?php echo $row['u_author']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;发布日期：<span class=" alert-info"><?php echo date('Y-m-d H:i:s',$row['u_add_date']); ?></span></p>
    </div>
    <div class="textIndet">
    	<?php echo $row['u_contents']; ?>
        
        
    <!--列表-->
    <div class="list-group"> 
    <a class="list-group-item list-group-item-success">新闻文章</a> 
    
   <?php
        $sql = "SELECT * FROM u_article ORDER BY u_add_date DESC LIMIT 4";
		$result = $conn->query( $sql );
		if( $result->num_rows>0 )
		{
			while( $row = $result->fetch_assoc() )
			{
		?>
    <a href="content.php?id=<?php echo $row['u_id']; ?>" class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> <?php echo $row['u_title']; ?></a> 
    
    <?php 
			}
		}
	?>
    </div>
    
    
<?php 
  include 'footerPhP.php'
?>
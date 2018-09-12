<?php 
    include 'PHP/configPhP.php';
    include 'headerPhP.php';
	
	if( empty($_GET['column']) )
	{
		$column = '全部内容';
	}
	else
	{
		$column = $_GET['column'];
	};
	
	if( empty($_GET['page']) )
	{
		$pages = 1;
	}
	else
	{
		$pages = $_GET['page'];
	};
	
	
	
	$pageSize = 10;
	
	$pageStart = ($pages-1)*$pageSize;

	if( $column == '全部内容' )
	{
		$sql = "SELECT * FROM u_article ORDER BY u_id LIMIT $pageStart,$pageSize";
		$sqlTotal = "SELECT * FROM u_article";
	}
	else
	{
		$sql = "SELECT * FROM u_article WHERE u_column='$column' ORDER BY u_id LIMIT $pageStart,$pageSize";
		$sqlTotal = "SELECT * FROM u_article WHERE u_column='$column' ORDER BY u_id";
	};
	
	$result = $conn->query($sql);
	$resultTotal = $conn->query($sqlTotal);
	
	$pageNum = ceil($resultTotal->num_rows/$pageSize);

?>
        <!--路径导航-->
        <div>
            <ul class="breadcrumb">
                <li><a href="index.php">首页</a></li>
                <li class="active"><?php echo $column; ?></li>
            </ul>
        </div>
        <!--内容列表-->
        <h3><?php echo $column; ?></h3>
        <hr>
        <div>
           <ul class="container-fluid list-unstyled list-li">
				 <?php
                 $j = 0;
                     if( $result->num_rows>0 )
                     {
                        while( $row = $result->fetch_assoc() )
                        {
                            $j++;
                 ?> 
                <li class="row"><a href="content.php?id=<?php echo $row['u_id']; ?>"><?php echo $row['u_title']; ?></a><span class="pull-right"><?php echo date('Y-m-d H:i:s',$row['u_add_date']); ?></span></li>
                
              <?php
					if( $j%5==0 )
					{
						echo '<li> &nbsp;</li>';
					 }
				 }
			 }
			 else
			 {
				echo '此栏目下没有文章';
			 };
			 ?> 
    
            </ul>
        </div>
        <nav aria-label="Page navigation" style="width: 300px;margin: auto">
            <ul class="pagination">
                <li>
                    <a href="message.php?column=<?php echo $column; ?>&page=<?php echo $pages-1;?>" class="<?php if(1==$pages) echo 'btn disabled' ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                
                <?php
					for($i=1;$i<=$pageNum;$i++)
					{
				?>
                <li><a href="message.php?column=<?php echo $column; ?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php
						};
				?>
                               
                <li><a href="message.php?column=<?php echo $column; ?>&page=<?php echo $pages+1;?>" class="<?php if($pageNum==$pages) echo 'btn disabled' ?>" aria-label="Next">
                         <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>


<?php 
  include 'footerPhP.php'
?>
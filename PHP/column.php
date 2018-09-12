<?php 
    include 'configPhP.php';
    include 'htheaderPhP.php';
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
		$sql = "SELECT * FROM u_article ORDER BY u_id DESC LIMIT $pageStart,$pageSize";
		$sqlTotal = "SELECT * FROM u_article ORDER BY u_id DESC";
	}
	else
	{
		$sql = "SELECT * FROM u_article WHERE u_column='$column' ORDER BY u_id DESC LIMIT $pageStart,$pageSize";
		$sqlTotal = "SELECT * FROM u_article WHERE u_column='$column' ORDER BY u_id DESC";
	};
	
	$result = $conn->query($sql);
	$resultTotal = $conn->query($sqlTotal);
	
	$pageNum = ceil($resultTotal->num_rows/$pageSize);
?>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            
            	<table class="table">
                    <tr>
                        <th></th>
                        <th>文章标题</th>
                        <th>发布日期</th>
                        <th>操作</th>
                    </tr>
                   
				 <?php
					$result = $conn->query( $sql );
					$j = 0;
					if( $result->num_rows>0 )
					{
						while( $row = $result->fetch_assoc() )
						{
							$j++;
				?>
                    <tr>
                        <td><?php echo $row['u_id']; ?></td>
                        <td><?php echo $row['u_title']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$row['u_add_date']); ?></td>
                        <td><a href="javascript:void(0);" onClick="deleteData(<?php echo $row['u_id'];?>);">删除</a> <a href="edit.php?id=<?php echo $row['u_id'];?>">修改</a></td>
                    </tr>
                <?php
						};
					}
					else
					{
				?> 
                    <tr>
                    	<td colspan="4" style="text-align:center">没有数据</td>
                    </tr>
                    
                <?php
					};                   
                ?>
                </table>

            </div> 
         </div>
            <nav aria-label="Page navigation" style="width: 300px;margin: auto">
                <ul class="pagination">
                    <li>
                        <a href="column.php?column=<?php echo $column; ?>&page=<?php echo $pages-1;?>" class="<?php if(1==$pages) echo 'btn disabled' ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    
                    <?php
                        for($i=1;$i<=$pageNum;$i++)
                        {
                    ?>
                    <li><a href="column.php?column=<?php echo $column; ?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php
                            };
                    ?>
                                   
                    <li><a href="column.php?column=<?php echo $column; ?>&page=<?php echo $pages+1;?>" class="<?php if($pageNum==$pages) echo 'btn disabled' ?>" aria-label="Next">
                             <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
     
<?php
include 'htfooterPhP.php'
?>

<script>

function deleteData(id)
{
	if( confirm('你确定要删除吗') )
	{
		window.location.href = 'delete.php?id='+id;
	};
};

</script>
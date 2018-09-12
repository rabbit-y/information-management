<?php
include 'configPhP.php';


$q = $_GET['q'];

$sql = "SELECT * FROM u_article WHERE u_title LIKE '%$q%'";

$result = $conn->query( $sql );
?>

<table width="1000px">
	<tr>
    	<th>题目</th>
    	<th>类别</th>
    	<th>作者</th>
    	<th>发布时间</th>
    </tr>
   <?php
   if( $result->num_rows>0 )
   {
		while( $row = $result->fetch_assoc() )
		{
   ?>
    <tr>
    	<td><a href="content.php?id=<?php echo $row['u_id'] ?>" target="_blank" title="<?php echo $row['u_title']; ?>"><?php echo $row['u_title']; ?></a></td>
    	<td><a href="message.php?column=<?php echo $row['u_column']; ?>" target="_blank"><?php echo $row['u_column']; ?></a></td>
    	<td><?php echo $row['u_author']; ?></td>
    	<td><?php echo date('Y-m-d H:i:s',$row['u_add_date']); ?></td>
    </tr>
    <?php
		};  
   }
   else
   {
	?>
    <tr>
    	<td style="text-align:center;" colspan="5">0条数据</td>
    </tr>
    <?php
    };
	?>
</table>

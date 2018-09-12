<?php
	include 'configPhP.php';
	$pagesum = 4; 
	$clumn = $_REQUEST["clumn"]; 
	$page = $_REQUEST["page"]; 
	$pageStart = $page * $pagesum; 
	
	if($clumn=="全部课程"){
		$sql = "SELECT * FROM u_article ORDER BY u_id LIMIT $pageStart,$pagesum";
		$ssql = "SELECT * FROM u_article ORDER BY u_id"; 
	}else{
		$sql = "SELECT * FROM u_article WHERE u_column='$clumn' ORDER BY u_id LIMIT $pageStart,$pagesum";
		$ssql = "SELECT * FROM u_article WHERE u_column='$clumn' ORDER BY u_id";
	}
	
	$result = $conn->query($sql);
	$sresult = $conn->query($ssql);
	$sumPage = ceil($sresult->num_rows/$pagesum);
?>
<div class="row">

		<?php
        	if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
		
		?>
    	<div class="col-lg-3">
        	<a href="content.php?id=<?php echo $row["u_id"]; ?>" class="thumbnail">
            	<img class="lazy" src="<?php echo $row["u_thumb"]; ?>" width="100%" data-src="images/pic_01.jpg" alt="<?php echo $row["u_title"]; ?>">
            </a>
        </div>
        <?php
        				
				}
			}
		?>
    </div>
    <nav>
      <ul class="pager">
        <li class="previous"><a href="javascript:sel(<?php if($page-1==-1){echo 0;}else{echo $page-1;} ?>)">&larr; Older</a></li>
        <li class="next"><a href="javascript:sel(<?php if($page==$sumPage-1){echo $sumPage-1;}else{echo $page+1;}?>)">Newer &rarr;</a></li>
      </ul>
    </nav>
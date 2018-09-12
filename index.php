<?php 
	include 'PHP/configPhP.php';
    include 'headerPhP.php'
?>
<!--课程推荐-->

<div>
  <h3>Web前端课程推荐</h3>
  <p>这些项目或者是对Bootstrap进行了有益的补充，或者是基于Bootstrap开发的</p>
  <hr>
</div>
<div class="row">
  <?php
        $sql = "SELECT * FROM u_article ORDER BY u_add_date DESC LIMIT 8";
		$result = $conn->query( $sql );
		if( $result->num_rows>0 )
		{
			while( $row = $result->fetch_assoc() )
			{
		?>
          <div class="col-sm-6 col-md-4 col-lg-3 ">
            <div class="thumbnail"> 
              <a href="content.php?id=<?php echo $row['u_id'] ?>" target="_blank" title="<?php echo $row['u_title']; ?>">
                  <img class="lazy" src="<?php echo $row['u_thumb'] ?>" width="300" alt="<?php echo $row['u_title']; ?>"></a>
              <div class="caption">
                <h3><!-- mb_substr() -->
                <a href="content.php?id=<?php echo $row['u_id'] ?>" target="_blank" title="<?php echo $row['u_title']; ?>"><?php echo mb_substr($row['u_title'],0,9,'utf8'); ?></a>
                <br><small><a href="message.php?column=<?php echo $row['u_column']; ?>" target="_blank"><?php echo $row['u_column']; ?></a></small>
              </h3>
                  <p> <?php echo mb_substr($row['u_description'],0,39,'utf8'); ?>…… </p>
              </div>
            </div>
          </div>
  <?php
        	};
		}
		else
		{
			echo '查询到0条数据';
		};
		?>
</div>
<!--课程选择-->
<div>
  <h3>Web前端课程选择</h3>
  <p>这些项目或者是对Bootstrap进行了有益的补充，或者是基于Bootstrap开发的</p>
  <hr>
</div>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>班级名称</th>
        <th>课时</th>
        <th>价格</th>
        <th>免费试听</th>
        <th>购买课程</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>就业精品班（面授/封闭班/包食宿）</td>
        <td>4个月</td>
        <td>优惠价17800.00<del>原价17800.00</del></td>
        <td><span class="glyphicon glyphicon-headphones"></span> 预约</td>
        <td><a href="#" class="btn btn-default btn-xs btn-danger" role="button">立即报名</a></td>
      </tr>
      <tr>
        <td>就业精品班（面授/封闭班/包食宿）</td>
        <td>4个月</td>
        <td>优惠价17800.00<del>原价17800.00</del></td>
        <td><span class="glyphicon glyphicon-headphones"></span> 预约</td>
        <td><a href="#" class="btn btn-default btn-xs btn-danger" role="button">立即报名</a></td>
      </tr>
      <tr>
        <td>就业精品班（面授/封闭班/包食宿）</td>
        <td>4个月</td>
        <td>优惠价17800.00<del>原价17800.00</del></td>
        <td><span class="glyphicon glyphicon-headphones"></span> 预约</td>
        <td><a href="#" class="btn btn-default btn-xs btn-danger" role="button">立即报名</a></td>
      </tr>
    </tbody>
  </table>
</div>
<?php 
  include 'footerPhP.php'
?>
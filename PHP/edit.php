<?php
include 'configPhP.php';
include 'htheaderPhP.php';


$id = $_GET['id'];
$sql = "SELECT * FROM u_article WHERE u_id=$id";

$result = $conn->query( $sql );

$row = $result->fetch_assoc();

?>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            <form method="post" action="editPhP.php?id=<?php echo $row['u_id']; ?>" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="exampleInputEmail1">文章标题</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $row['u_title']; ?>" placeholder="文章标题">
                  </div>
                <div class="form-group">
                    <label for="column">栏目名称</label>
                    <select class="form-control" name="column">
                      <option <?php if($row['u_column']=='Web前端开发') echo 'selected'; ?>>Web前端开发</option>
                      <option <?php if($row['u_column']=='UI设计') echo 'selected'; ?>>UI设计</option>
                      <option <?php if($row['u_column']=='PHP开发') echo 'selected'; ?>>PHP开发</option>
                      <option <?php if($row['u_column']=='JAVA开发') echo 'selected'; ?>>JAVA开发</option>
                      <option <?php if($row['u_column']=='网络营销') echo 'selected'; ?>>网络营销</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="describe">文章描述</label>
                    <textarea class="form-control" rows="3" name="description"><?php echo $row['u_description']; ?></textarea>
                  </div>
                <div class="form-group">
                    <label for="keyworld">关键词</label>
                    <input type="text" class="form-control" value="<?php echo $row['u_keyword']; ?>" id="keyworld" name="keyword" placeholder="关键词">
                  </div>
                  <h5>文章内容</h5>
				<script type="text/plain" id="myEditor" style="width:100%;height:300px;">
                    <?php echo $row['u_contents']; ?>
                </script>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">上传缩略图</label>
                    <input type="file" id="exampleInputFile" name="upfile">
                 </div>
                <input type="submit" class="btn btn-success" value="修改文章"> <input type="reset" class="btn btn-danger" value="重置内容">
                </form>
                <script type="text/javascript">
                    //实例化编辑器
                    var um = UM.getEditor('myEditor');                  
                </script>
            </div>
        </div>
<?php
include 'htfooterPhP.php'
?>
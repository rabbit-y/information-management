<?php 
    include 'configPhP.php';
    include 'htheaderPhP.php'
?>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            <form method="post" action="publishPhP.php" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="exampleInputEmail1">文章标题</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="文章标题">
                  </div>
                <div class="form-group">
                    <label for="column">栏目名称</label>
                    <select class="form-control" name="column">
                      <option>Web前端开发</option>
                      <option>UI设计</option>
                      <option>PHP开发</option>
                      <option>JAVA开发</option>
                      <option>网络营销</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="describe">文章描述</label>
                    <textarea class="form-control" rows="3" id="describe" name="description"></textarea>
                  </div>
                <div class="form-group">
                    <label for="keyworld">关键词</label>
                    <input type="text" class="form-control" id="keyworld" name="keyword" placeholder="关键词">
                  </div>
                  <h5>文章内容</h5>
                 <!--style给定宽度可以影响编辑器的最终宽度-->
				<script type="text/plain" id="myEditor" style="width:100%;height:300px;">
                    <p>请添加文章内容11111……</p>
                </script>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">上传缩略图</label>
                    <input type="file" id="exampleInputFile" name="upfile">
                 </div>
                <input type="submit" class="btn btn-success" value="发布文章"> <input type="reset" class="btn btn-danger" value="重置内容">
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
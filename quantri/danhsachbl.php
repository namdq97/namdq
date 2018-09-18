    
    <script>
    function xoaCom(){
        var conf=confirm("Bạn có chắc chắn muốn xóa danh mục này hay không?");
        return conf;
    }
    </script>
    <?php
    $sql = "SELECT * FROM blsanpham ORDER BY id_bl";
    $query = mysqli_query($conn, $sql);
    ?>

        			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active"></li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý bình luận</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body" style="position: relative;">
                            <a href="" class="btn btn-info" style="margin: 10px 0 20px 0; position: absolute;">Ý kiến người dùng</a>
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>						        
                                        <th data-sortable="true">ID</th>
                                        <th data-sortable="true">Tên khách hàng</th>
                                        <th data-sortable="true">ID sản phầm</th>
                                        <th data-sortable="true">Nội dung bình luận</th>
                                        <th data-sortable="true">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  while ($row= mysqli_fetch_array($query)){
                                  ?>
                                    <tr>
                                        <td data-checkbox="true"><?php echo $row['id_bl']; ?></td>
                                        <td data-checkbox="true"><?php echo $row['ten']; ?></td>
                                        <td data-checkbox="true"><?php echo $row['id_sp']?></td>
                                        <td data-checkbox="true"><?php echo $row['binh_luan']; ?></td>	
                                        
                                        <td>
                                            <a onClick="return xoaCom();" href="xoabl.php?id_bl=<?php echo $row['id_bl']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                        </td>
                                    </tr>
                                   <?php
                                   }
                                   ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div><!--/.row-->	




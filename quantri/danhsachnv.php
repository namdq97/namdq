<script>
    function xoaNhanVien()
    {
        var conf = confirm("Bạn có chắc chắn muốn xóa ?");
        return conf;
    }

</script>
<?php
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }
    else
    {
        $page=1;
    }
    //so san pham hien thi tren 1 trang
    $rowPerPage=5;
    $perRow=$page*$rowPerPage-$rowPerPage;


    $sql="SELECT * FROM nhanvien ORDER BY id_nv ASC  LIMIT $perRow,$rowPerPage";
    $query=mysqli_query($conn,$sql);

    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nhanvien"));
    $totalPages=ceil($totalRows/$rowPerPage);

    $listPage="";
    for($i=1;$i<=$totalPages;$i++)
    {
        if ($page==$i)
        {
           $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachnv&page='.$i.'">'.$i.'</a></li>';
        }
        else
        {
            $listPage.='<li><a href="quantri.php?page_layout=danhsachnv&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>


<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý nhân viên</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themnv" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm nhân viên mới</a>				
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên nhân viên</th>
                            <th data-sortable="true">Chức vụ</th>
                            
                            <th data-sortable="true">Điện thoại</th>
                            <th data-sortable="true">Ảnh mô tả</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=mysqli_fetch_array($query))
                        {


                        ?>

                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_nv'];?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suanv&id_nv=<?php echo $row['id_nv']; ?>"><?php echo $row['ho_ten'];?></a></td>
                            <td data-checkbox="true"><?php echo $row['chuc_vu']?></td>
                            
                            <td data-checkbox="true"><?php echo $row['dien_thoai']?></td>
                            <td data-sortable="true">
                                <span class="thumb"><img width="150px" height="150px" src="anh/<?php echo $row['anh_dai_dien'];?>" /></span>

                            </td>						        
                            <td>
                                <a href="quantri.php?page_layout=suanv&id_nv=<?php echo $row['id_nv']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>

                            <td>
                                <a onclick="return xoaNhanVien();" href="xoanv.php?id_nv=<?php echo $row['id_nv'];?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>

                        <?php
                    }
                        ?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                    <?php
                    echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	




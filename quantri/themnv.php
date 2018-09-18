<?php
if(isset($_POST['submit']))
{
    $ho_ten=$_POST['ho_ten'];
    $chuc_vu=$_POST['chuc_vu'];
    $dien_thoai =$_POST['dien_thoai'];

    if ($_FILES['anh_dai_dien']['name']=="")
    {
        $error_anh_dai_dien='<span style="color:red;">(*)</span>';
    } 
    else
    {
        $anh_dai_dien=$_FILES['anh_dai_dien']['name'];
        $tmp_name=$_FILES['anh_dai_dien']['tmp_name'];
    }
    $gioi_tinh=$_POST['gioi_tinh'];

    if(isset($ho_ten) && isset($chuc_vu) && isset($dien_thoai) &&isset($anh_dai_dien) && isset($gioi_tinh))
    {
        move_uploaded_file($tmp_name, 'anh/'.$anh_dai_dien);
        $sql="INSERT INTO nhanvien(ho_ten,chuc_vu,dien_thoai,anh_dai_dien,gioi_tinh) VALUES ('$ho_ten','$chuc_vu','$dien_thoai','$anh_dai_dien','$gioi_tinh')";
        $query=mysqli_query($conn,$sql);
        header('location: quantri.php?page_layout=danhsachnv');
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
            <h1 class="page-header">Thêm nhân viên mới</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm nhân viên mới</div>
                <div class="panel-body">

                    <form method="post" enctype="multipart/form-data" role="form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input type="text" class="form-control"  name="ho_ten" required="">
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <input type="text" class="form-control" name="chuc_vu" required="">
                            </div>

                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input type="text" class="form-control" name="dien_thoai" value="" required="">
                            </div>

                            <div class="form-group">
                                <label>Giới tính</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gioi_tinh" id="optionsRadios1" value=1>Nam
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gioi_tinh" id="optionsRadios2" value=0 checked>Nữ
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="anh_dai_dien">
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                            <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                        </div>

                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

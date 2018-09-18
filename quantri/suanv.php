<?php
$id_nv=$_GET['id_nv'];
$sql="SELECT *FROM nhanvien Where id_nv=$id_nv";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

if(isset($_POST['submit']))
{
    $ho_ten=$_POST['ho_ten'];
    $chuc_vu=$_POST['chuc_vu'];
    $dien_thoai =$_POST['dien_thoai'];

    if($_FILES['anh_dai_dien']['name']=="")
    {
        $anh_dai_dien=$_POST['anh_dai_dien'];
    }
    else
    {
        $anh_dai_dien=$_FILES['anh_dai_dien']['name'];
        $tmp_name=$_FILES['anh_dai_dien']['tmp_name'];
    }
    $gioi_tinh=$_POST['gioi_tinh'];

    if(isset($ho_ten) && isset($chuc_vu) && isset($dien_thoai) && isset($gioi_tinh))
    {
        move_uploaded_file($tmp_name, 'anh/'.$anh_dai_dien);
        $sql="UPDATE nhanvien SET ho_ten='$ho_ten',chuc_vu='$chuc_vu',dien_thoai='$dien_thoai',anh_dai_dien='$anh_dai_dien',gioi_tinh='$gioi_tinh' Where id_nv='$id_nv'";
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
        <h1 class="page-header">Sửa thông tin nhân viên</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin nhân viên</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên nhân viên</label>
                            <input type="text" class="form-control"  name="ho_ten" value="<?php if(isset($_POST['ho_ten'])){echo $_POST['ho_ten'];} else{ echo $row['ho_ten'];}?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <input type="text" class="form-control" name="chuc_vu" value="<?php if(isset($_POST['chuc_vu'])){echo $_POST['chuc_vu'];} else {echo $row['chuc_vu'];}?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" class="form-control" name="dien_thoai" value="<?php if(isset($_POST['dien_thoai'])){echo $_POST['dien_thoai'];} else {echo $row['dien_thoai'];}?>" required="">
                        </div>       



                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gioi_tinh"<?php
                                    if($row['gioi_tinh']==1)
                                    {
                                        echo 'checked';;
                                    } 
                                    ?> id="optionsRadios1" value=1>Nam
                                    
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gioi_tinh" <?php
                                    if($row['gioi_tinh']==0)
                                    {
                                        echo 'checked';
                                    } 
                                    ?>id="optionsRadios2" value=0>Nữ
                                    
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="anh_dai_dien">  
                                <input type="hidden" name="anh_dai_dien" value="<?php echo $row['anh_dai_dien'];?>">
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                        <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                    </div>

                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


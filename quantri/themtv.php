	<?php
            if(isset($_POST['submit'])){
                $ten_tv = $_POST['email'];
                $mat_khau = $_POST['pass'];
                if(isset($ten_tv)){
                    $sql="INSERT INTO thanhvien(email,mat_khau) VALUES ('$ten_tv', '$mat_khau')";
                    $query = mysqli_query($conn, $sql);
                    header ('location: quantri.php?page_layout=danhsachtv');                    
                }
            }
        ?>
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href=""><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active"></li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới thành viên</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thêm mới thành viên</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form role="form" method="post">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" required="" name="email">
                                    </div>	
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="text" required="" name="pass">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                                    <button type="reset" class="btn btn-default">Làm mới</button>

                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->

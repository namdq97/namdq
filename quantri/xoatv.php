<?php
    session_start();
      
         $id_tv = $_GET['id_thanhvien'];
         include_once './ketnoi.php';
         $sql = "DELETE FROM thanhvien WHERE id_thanhvien='$id_tv'";
         $query= mysqli_query($conn, $sql);
         header('location: quantri.php?page_layout=danhsachtv');

?>

?>

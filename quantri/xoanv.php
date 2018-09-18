<?php
	session_start();

	
		$id_nv=$_GET['id_nv'];
		include_once './ketnoi.php';
		$sql="DELETE FROM nhanvien WHERE id_nv='$id_nv'";
		$query=mysqli_query($conn,$sql);
		header('location: quantri.php?page_layout=danhsachnv');
	
?>
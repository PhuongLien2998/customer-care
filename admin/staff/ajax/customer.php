<?php
include_once "../config.php";
session_start();
$id_khachhang = $_POST['id'];
$id_nv = $_SESSION['id_nv'] ;
$sql_del = "DELETE FROM tbl_chamsoc  WHERE id_nhanvien = $id_nv AND id_khachhang = $id_khachhang ";
$query = mysqli_query($conn, $sql_del);
echo $id_khachhang;
?>
<?php
include_once "../config.php";

$id = $_POST['id'];
$sql_nhanvien = "SELECT id_nhanviennhan,id_khachhang,id_nhanvienchuyen FROM tbl_lichsudieuchuyen where  id_dieuchuyen = $id";
$query_nhanvien = mysqli_query($conn, $sql_nhanvien);
$data_nhanvien = mysqli_fetch_array($query_nhanvien);
$id_nhanviennhan = $data_nhanvien['id_nhanviennhan'] ;
$id_khachhang = $data_nhanvien['id_khachhang'] ;
$id_nhanvienchuyen = $data_nhanvien['id_nhanvienchuyen'] ;
$sql = "UPDATE tbl_lichsudieuchuyen
    SET stt = 1
    WHERE id_dieuchuyen = $id ";
$query = mysqli_query($conn, $sql);
// update database customer
$sql_update = "UPDate tbl_chamsoc SET id_nhanvien = $id_nhanviennhan  
                WHERE id_nhanvien = $id_nhanvienchuyen AND id_khachhang = $id_khachhang " ;
$query = mysqli_query($conn , $sql_update);
if ($query) {
    echo 1;
} else {
    echo 0;
}

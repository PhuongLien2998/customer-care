<?php
include_once "../config.php";
session_start();

$product = $_POST['product']; //id product
$customer = $_POST['customer'];
$number = $_POST['number']; //số lượng đặt
$arr = explode("_", $customer);
$customer = $arr[1]; // id khách hàng
$tongtien = $_SESSION['tongtien'] ;

$id_nvbh = $_SESSION['id_nv'] ;
$sql_nvcs = "SELECT id_nhanvien FROM tbl_chamsoc WHERE id_khachhang = $customer" ;
$query_nvcs = mysqli_query($conn, $sql_nvcs);
$row_nvcs = mysqli_fetch_array($query_nvcs);
$id_nvcs =  $row_nvcs['id_nhanvien'] ; // id nhân viên chăm sóc

date_default_timezone_set('Asia/Ho_Chi_Minh');
$curent_time = date("Y-m-d H:i:s") ;


// Thêm dữ liệu vào bảng tbl_hoadon
$sql_hoadon = "INSERT INTO tbl_hoadon (id_nhanviencs, id_nhanvienbh, id_khachhang, thoigianthanhtoan)
VALUES ($id_nvcs, $id_nvbh , $customer, '$curent_time' ); ";
$query_hoadon = mysqli_query($conn ,$sql_hoadon ) ;

//Lấy id_hoadon vừa tạo
$sql_get_hoadon = "SELECT id_hoadon FROM tbl_hoadon WHERE id_nhanviencs = $id_nvcs 
        AND id_nhanvienbh = $id_nvbh AND id_khachhang = $customer ORDER BY id_hoadon DESC limit 0,1 " ;
$query_get_hoadon = mysqli_query($conn, $sql_get_hoadon);
$row_get_hoadon = mysqli_fetch_array($query_get_hoadon);
$id_hoadon =  $row_get_hoadon['id_hoadon'] ;

//Thêm dữ liệu vào bảng hóa đơn chi tiến
$sql_hdct = "INSERT INTO tbl_hoadonchitiet (id_hoadon, id_dienthoai, soluong)
VALUES ($id_hoadon, '$product', $number) ;" ;
$query_hdct = mysqli_query($conn , $sql_hdct ) ;

// Xóa dữ liệu trong bảng chăm sóc
//$sql_xoa_chamsoc = "DELETE FROM tbl_chamsoc WHERE id_khachhang = $customer ;"
//$query_xoa_chamsoc = mysqli_query($conn , $sql_xoa_chamsoc) ;

//Cập nhật điểm thưởng
$sql_dt = "SELECT diemtichluy FROM tbl_khachhang WHERE id_khachhang = $customer " ;
$query_dt = mysqli_query($conn, $sql_dt);
$row_dt = mysqli_fetch_array($query_dt);
$dt =  $row_dt['diemtichluy'] ;
$dt = round($dt + $tongtien/1000000) ;

//Cập nhật điểm thưởng
$sql_update_dt = "UPDATE tbl_khachhang SET diemtichluy = $dt WHERE id_khachhang = $customer;" ;
$query_update_dt = mysqli_query($conn ,$sql_update_dt ) ;
//Lấy id quản lý của chi nhánh
$sql_ql = "SELECT id_nv  FROM tbl_taikhoan , tbl_nhanvien WHERE level = 4 and id_nhanvien=id_nv and id_chinhanh= 
(SELECT id_chinhanh FROM  tbl_nhanvien WHERE id_nhanvien = $id_nvbh ) ;" ;
$query_ql = mysqli_query($conn, $sql_ql);
$row_ql = mysqli_fetch_array($query_ql);
$id_ql = $row_ql['id_nv'] ;
// Thêm vào tiến trình cham sóc
$sql_lsdc = "INSERT INTO tbl_lichsudieuchuyen (id_nhanvienchuyen, id_nhanviennhan, id_khachhang, lidochuyen,thoigianchuyen,stt)
VALUES ($id_nvcs , $id_ql , $customer  ,'Xuất bán thành công', '$curent_time' , 1); ";
$query_ttcs = mysqli_query($conn , $sql_lsdc ) ;
//lấy só lượng sản phẩm

$sql_sl = "UPDATE tbl_dienthoai SET soluong = (soluong - $number ) WHERE  id_dienthoai = '$product' ;" ;
$query_sl = mysqli_query($conn , $sql_sl );
//Xóa thông tin trong bảng chăm sóc

$sql_xoa = "DELETE FROM tbl_chamsoc WHERE id_khachhang = $customer;" ;
$query_xoa = mysqli_query($conn , $sql_xoa);
?>

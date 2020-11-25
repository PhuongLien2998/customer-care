<?php
session_start();
include_once '../config.php';
if (isset($_POST['saveUpdate']) ) {
    $Name = $_POST['Name'];
    $Cmt = $_POST['Cmt'];
    $Birth = $_POST['Birth'];
    $Phone = $_POST['Phone'];
    $energy = $_POST['energy'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $barnd = $_POST['barnd'];
    $error = '';
    $date = date('Y-m-d');
    $id = $_SESSION["id_nv"];

    //xu ly them

    $sql = "UPDATE tbl_nhanvien 
            SET sdt_nhanvien = '$Phone', email_nhanvien = '$Email', thecancuoc = '$Cmt', gioitinh = '$energy',
                diachi_nhanvien = '$Address', ten_nhanvien = '$Name', ngaysinh = '$Birth', id_chinhanh = '$barnd'
            WHERE  id_nhanvien = '$id'";
    $query = mysqli_query($conn, $sql);

    $sql2 = "UPDATE tbl_taikhoan
            SET username = '$Email'
            WHERE  id_nv = '$id' ";
    $query = mysqli_query($conn, $sql2);

    header("Location: ../index.php?page=info_staff&id=$id");

}
?>
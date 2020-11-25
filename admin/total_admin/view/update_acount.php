<?php
session_start();
include_once '../config/myConfig.php';
    
    $_SESION['err_name']="";
    $_SESION['err_phone']="";
    $_SESION['err_add']="";
    $_SESION['err_cmt']="";
    $_SESION['err_bir']="";
    $_SESION['err_mail']="";
    // Name_err!=""||Cmt_err!=""||Birth_err!=""||Email_err!=""||Phone_err!=""||Address_err!=""
    if(isset($_POST['Name_err'])&&isset($_POST['Cmt_err'])&&isset($_POST['Birth_err'])&&isset($_POST['Email_err'])&&
    isset($_POST['Phone_err'])&&isset($_POST['Address_err'])){

    $_SESION['err_name']=$_POST['Name_err'];
    $_SESION['err_phone']=$_POST['Phone_err'];
    $_SESION['err_add']=$_POST['Address_err'];
    $_SESION['err_cmt']=$_POST['Cmt_err'];
    $_SESION['err_bir']=$_POST['Birth_err'];
    $_SESION['err_mail']=$_POST['Email_err'];
    
   }




    // $Cmt = $_POST['Cmt'];
    // $Birth = $_POST['Birth'];
    // $Phone = $_POST['Phone'];
    // $energy = $_POST['energy'];
    // $Email = $_POST['Email'];
    // $Address = $_POST['Address'];
    // $error = '';
    // $date = date('Y-m-d');
    // $id = $_SESSION["id_ql"];
    
    $_SESSION['err_name']="loi ten nguoi dung";
    //xu ly them

    // $sql = "UPDATE tbl_nhanvien 
    //         SET sdt_nhanvien = '$Phone', email_nhanvien = '$Email', thecancuoc = '$Cmt', gioitinh = $energy,
    //             diachi_nhanvien = '$Address', ten_nhanvien = '$Name', ngaysinh = '$Birth'
    //         WHERE  id_nhanvien = '$id'";
    // $query = mysqli_query($conn, $sql);

    // $sql2 = "UPDATE tbl_taikhoan
    //         SET username = '$Email'
    //         WHERE  id_nv = '$id' ";
    // $query2 = mysqli_query($conn, $sql2);
    //  if($query2!==false&&$query!==false){
    //     echo "<script>alert('Sửa thông tin thành công!');
    //     window.location=\"../index.php?page=info_acount&id=$id\" ;
    //     </script>";
    // }else{
    //     echo "<p style='color: red;'>Sửa không thành công!</p>";
    // }


?>
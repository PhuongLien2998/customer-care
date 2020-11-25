<?php 
session_start();
include_once "config.php";
    $id_kh =$_SESSION['id_kh'];
    $re_addr = $_POST['addr'];
    $sql= "UPDATE tbl_khachhang SET diachi_khachhang = '$re_addr' WHERE id_khachhang = $id_kh";
    $q=mysqli_query($conn,$sql);
    if($q!==false){
        //$_SESSION['name']=$re_name;
        echo $re_addr;
    }
?>
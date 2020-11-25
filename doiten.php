<?php 
session_start();
include_once "config.php";
    $id_kh =$_SESSION['id_kh'];
    $re_name = $_POST['name'];
    $sql= "UPDATE tbl_khachhang SET ten_khachhang = '$re_name' WHERE id_khachhang = $id_kh";
    $q=mysqli_query($conn,$sql);
    if($q!==false){
        $_SESSION['name']=$re_name;
        echo $_SESSION['name'];
    }
?>
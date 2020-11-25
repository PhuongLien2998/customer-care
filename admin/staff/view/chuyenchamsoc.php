<?php
    if (isset($_GET['id_customer'])){
        $id_kh = $_GET['id_customer'] ;
        $id_nv = $_SESSION['id_nv'] ;
        // chuyển trang thái khách hàng sang 1 ;

        $sql_stt = "UPDATE tbl_khachhang SET trang_thai = 1 WHERE id_khachhang = $id_kh ;" ;
        $query_stt = mysqli_query($conn , $sql_stt) ;

        // Thêm vào bảng chăm sóc
        $sql_cs = "INSERT INTO tbl_chamsoc (id_nhanvien , id_khachhang ) VALUES ( $id_nv , $id_kh) ;" ;
        $query_stt = mysqli_query($conn , $sql_cs) ;
        if ($query_stt){
            echo "<script>alert(\"Chuyển sang trạng thái chăm sóc thành công!\");" ;
            echo "window.location.href = 'index.php'; </script>";
        }
    }
?>

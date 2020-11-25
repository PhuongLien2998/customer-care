
<?php
include_once "../config.php" ;
session_start();
$id_nv = $_SESSION['id_nv'];
$sql_info = "SELECT * FROM  tbl_lichsudieuchuyen Where id_nhanviennhan = $id_nv AND stt = 0 ";
$query = mysqli_query($conn, $sql_info);
while ($row_info = mysqli_fetch_array($query)) {
    //get name staff
    $id_staff = $row_info['id_nhanvienchuyen'];
    $sql_staff = "SELECT ten_nhanvien FROM tbl_nhanvien where id_nhanvien = $id_staff ";
    $query_staff = mysqli_query($conn, $sql_staff);
    $row_staff = mysqli_fetch_array($query_staff);
    // get name customer
    $id_customer = $row_info['id_khachhang'];
    $sql_customer = "SELECT ten_khachhang FROM tbl_khachhang where id_khachhang = $id_customer ";
    $query_customer = mysqli_query($conn, $sql_customer);
    $row_customer = mysqli_fetch_array($query_customer);
    ?>
        <div class="alert alert-success <?php echo "del" . $row_info['id_dieuchuyen']; ?>">
            <strong>Thông báo : </strong> Nhân viên <?php echo $row_staff['ten_nhanvien']; ?> đã chuyển một khách hàng <?php echo $row_customer['ten_khachhang']; ?> cho bạn;
            <p>Lý do : <?php echo $row_info['lidochuyen'] ?> </p>
            <p>Thời gian chuyển : <?php echo $row_info['thoigianchuyen']; ?> </p>
            <button class = "btn btn-success confirm" value = "<?php echo $row_info['id_dieuchuyen']; ?>">Xác nhận</button>
            <button class = "btn btn-danger cancel "  value = "<?php echo $row_info['id_dieuchuyen']; ?> ">Hủy bỏ</button>
        </div>

<?php
}
?>

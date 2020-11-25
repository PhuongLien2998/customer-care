<?php
include_once "../config.php";
session_start();

$product = $_POST['product'];
$customer = $_POST['customer'];
$number = $_POST['number'];
$arr = explode("_", $customer);
$customer = $arr[1];
$nv_banhang = $_SESSION['ten_nv'];

$sql_customer = "SELECT ten_khachhang,ngaysinh ,diemtichluy FROM tbl_khachhang WHERE id_khachhang = $customer";
$query_customer = mysqli_query($conn, $sql_customer);
$row_customer = mysqli_fetch_array($query_customer);
//lấy tên sản phẩm trong kho
$sql_product = "SELECT ten_dienthoai ,soluong , gia_dienthoai FROM tbl_dienthoai WHERE id_dienthoai = '$product' ";
$query_product = mysqli_query($conn, $sql_product);
$row_product = mysqli_fetch_array($query_product);
//Kiểm tra xem đã ma hàng chưa
$sql_thanhtoan = "SELECT thoigianthanhtoan FROM tbl_hoadon WHERE id_khachhang = $customer";
$query_thanhtoan = mysqli_query($conn, $sql_thanhtoan);
$ngay_thanhtoan = array();
While ($row_thanhtoan = mysqli_fetch_array($query_thanhtoan)) {
    $arr_thanhtoan = explode("-", $row_thanhtoan['thoigianthanhtoan']);
    array_push($ngay_thanhtoan, $arr_thanhtoan[1]);
}
//Tính khuyến mại
$str_ngaysinh = $row_customer['ngaysinh'];
$arr_ngaysinh = explode("-", $str_ngaysinh);
$thangsinh = $arr_ngaysinh[1]; // ngày sinh của khách hàng

$current_m = date("m"); //ngày sinh hiện tại
    $km_kh = 0;
    $dtl = $row_customer['diemtichluy'];
    if ($dtl >= 50 && $dtl <= 200) {
        $km_kh = 0.05;
    }
    if ($dtl > 200) {
        $km_kh = 0.1;
    }

    //kiểm tra sn
if ($current_m == $thangsinh) {
    $count = 0 ;
    foreach ($ngay_thanhtoan as $key => $value) {
        if ($current_m == $value) {
            $count++ ;
        }
    }
    if ($count == 0){
        $km_kh = 0.4 ;
    }
}

$tongtien  = $row_product['gia_dienthoai']*$number - $km_kh*$row_product['gia_dienthoai']*$number ;
$_SESSION['tongtien'] = $tongtien ;
?>

<h2 style="border-bottom: 1px solid black ;">Hóa đơn chi tiết :</h2>
<strong>Nhân viên bán hàng:</strong>
<p><?php echo $nv_banhang; ?></p>

<strong>Tên khách hàng:</strong>
<p><?php echo $row_customer['ten_khachhang']; ?></p>

<strong>Sản phẩm mua hàng:</strong>
<p><?php echo $row_product['ten_dienthoai']; ?></p>

<strong>Số lượng:</strong>
<p><?php
    if ($number > $row_product['soluong']) {
        echo "Số lượng sản phẩm trong kho không đủ";
        $khoa = 1;
    } else {
        echo $number;
    }
    ?></p>
<strong>Giảm giá:</strong>
<p><?php
    if (isset($km_kh)) {
        echo $km_kh * 100 . "%";
    } else {
        echo "0%";
    } ?></p>

<strong>Tổng tiền thành toán:</strong>
<p><?php echo number_format($tongtien)." VND" ; ?></p>

<button class="btn btn-success xac_nhan" style="margin-top: 12%;" <?php if (isset($khoa)) {
    echo "disabled";
} ?>> Xác nhận
</button>


<?php

$id_nv = $_SESSION['id_nv'];
if (isset($_POST['sm_add'])) {
    $customer = $_POST['customer'] ;
    $arr_customer = explode("_" , $customer) ;
    $id_khachhang = $arr_customer[1] ;
    $time = $_POST['time'];
    $content = $_POST['content'];
    $sql = "INSERT INTO tbl_tientrinhcs ( id_nhanvien , id_khachhang , thoigiantuvan , noidungtuvan)
               Values ( $id_nv , $id_khachhang ,'$time' , '$content' )";
    $query = mysqli_query($conn, $sql) ;
    if ($query) {
        $_SESSION['noti'] = "Thêm tiến trình thành công !" ;
    }
}

?>
<div class="container">
    <div class="row" style="padding: 10px 10px  ;">
        <div class="col-md-9">
            <form action="" method="POST">
            <h2 style="border-bottom: 1px solid black ;"> Thêm mới tiến trình </h2>
            <div class="form-group">
                <label for="usr">Tên khách hàng :<span class="error error_customer"></span></label>
                <input list="customer" class="form-control customer" name="customer">
            </div>
            <datalist id="customer">
                <?php
                $sql_customer = "SELECT id_khachhang , ten_khachhang FROM tbl_khachhang ";
                $query_product = mysqli_query($conn, $sql_customer);
                While ($row_customer = mysqli_fetch_array($query_product)) {
                    ?>
                    <option value="<?php echo 'KH_' . $row_customer['id_khachhang'] ?>"><?php echo $row_customer['ten_khachhang']; ?></option>
                <?php } ?>
            </datalist>

                <div class="form-group">
                    <label for="">Thời gia tư vấn:</label>
                    <input type="text" name="time" class="form-control datetime" readonly>
                </div>

                <div class="form-group ">
                    <label for="comment">Nội dung tư vấn :</label>
                    <textarea class="form-control" name="content" rows="5" id="comment"></textarea>
                </div>
                <input type="submit" class="btn btn-danger" name="sm_add" value="Thêm mới" style="margin-bottom:10px">
        </div>
        </form>
    </div>
    <!-- Kết thúc nội dung trang web Nội dung -->
</div>

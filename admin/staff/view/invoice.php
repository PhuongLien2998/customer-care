<!-- Phần nội dung trang WEb ---------------------------------->

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2 style="border-bottom: 1px solid black ;">Xuất Bán :</h2>
            <!--    Tìm kiếm sản phẩm -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="sanpham">Sản phẩm : <span class="error error_product"></span></label>
                    <input list="merchandise" class="form-control " name="merchandise" id="sanpham">
                </div>
                <datalist id="merchandise">
                    <?php
                    $sql_product = "SELECT id_dienthoai , ten_dienthoai FROM tbl_dienthoai";
                    $query_product = mysqli_query($conn, $sql_product);
                    While ($row_product = mysqli_fetch_array($query_product)) {
                        ?>
                        <option value="<?php echo $row_product['id_dienthoai'] ?>"><?php echo $row_product['ten_dienthoai']; ?></option>
                    <?php } ?>
                </datalist>
                <!--        khách hàng-->
                <div class="form-group">
                    <label for="usr">Tên khách hàng :<span class="error error_customer"></span></label>
                    <input list="customer" class="form-control customer" name="customer">
                </div>
                <datalist id="customer">
                    <?php
                    $sql_customer = "SELECT tbl_chamsoc.id_khachhang , tbl_khachhang.ten_khachhang , tbl_khachhang.sdt_khachhang  FROM tbl_khachhang , tbl_chamsoc 
                                    WHERE tbl_chamsoc.id_khachhang = tbl_khachhang.id_khachhang ORDER BY tbl_chamsoc.id_khachhang ASC ";
                    $query_product = mysqli_query($conn, $sql_customer);
                    While ($row_customer = mysqli_fetch_array($query_product)) {
                        ?>
                        <option value="<?php echo 'KH_' . $row_customer['id_khachhang'] ?>"><?php echo $row_customer['ten_khachhang'].' : '.$row_customer['sdt_khachhang'] ; ?></option>
                    <?php } ?>
                </datalist>
                <!--        Số lượng hàng hóa-->
                <div class="form-group">
                    <label for="usr">Số lượng :<span class="error error_number"></span></label>
                    <input type="number" class="form-control" id="number">
                </div>
                <div class="form-group">
                    <label for="comment">Ghi chú: </label>
                    <textarea class="form-control" rows="5" id="comment" name="note" value=""></textarea>
                </div>
                <!--        Kết thúc nội dung trang web-->
                <input type="submit" class="btn btn-danger xuat_ban" name="xuat_ban" value="Xuất bán">
            </form>
        </div>
        <!--    hóa đơn chi tiết-->
        <div class="col-md-5 detail_invoice"></div>
    </div>
</div>
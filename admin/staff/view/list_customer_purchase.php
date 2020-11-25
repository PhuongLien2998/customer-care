<?php
$id_nv = $_SESSION['id_nv'];
$sql = "SELECT id_khachhang,ten_khachhang , sdt_khachhang , diachi_khachhang FROM tbl_khachhang WHERE trang_thai = 2";
$query = mysqli_query($conn, $sql);
?>
<div class="container">
    <div class="row" style="padding: 10px 10px  ;">
        <h2>Danh sách khách hàng đã mua hàng</h2>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Họ Tên</th>
                <th>Số điện thoại</th>
                <th>Địa Chỉ</th>
                <th>Chi tiết</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="custumer<?php echo $row['id_khachhang']; ?>">
                    <td><?php echo $row['ten_khachhang']; ?></td>
                    <td><?php echo $row['sdt_khachhang']; ?></td>
                    <td><?php echo $row['diachi_khachhang']; ?></td>
                    <td>
                        <!--   data-toggle="modal" data-target="#myModal"-->
                        <a href="index.php?page=show-detail&id_customer=<?php echo $row['id_khachhang']; ?>"
                           class="btn btn-success">Xem chi tiết</a>
                        <a href="index.php?page=chuyenchamsoc&id_customer=<?php echo $row['id_khachhang']; ?>"
                           class="btn btn-danger">Chuyển sang chăm sóc</a>
                        <!-- <a href="index.php?page=edit" class="btn btn-success">Xem chi tiết</a>-->
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</div>
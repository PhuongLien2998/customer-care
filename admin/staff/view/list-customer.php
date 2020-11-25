<?php
$id_nv = $_SESSION['id_nv'];
$sql = "SELECT tbl_khachhang.ten_khachhang ,tbl_khachhang.sdt_khachhang , tbl_khachhang.id_khachhang
    FROM tbl_khachhang,tbl_chamsoc WHERE tbl_khachhang.id_khachhang = tbl_chamsoc.id_khachhang
    AND tbl_chamsoc.id_nhanvien = $id_nv ";
$query = mysqli_query($conn, $sql);

?>

<div class="container">
    <div class="row table-responsive" style="padding: 10px 10px  ;">
        <h2>Danh sách khách hàng đang chăm sóc</h2>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Họ Tên</th>
                <th>Số điện thoại</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="custumer<?php echo $row['id_khachhang'];?>">
                    <td><?php echo $row['ten_khachhang']; ?></td>
                    <td><?php echo $row['sdt_khachhang']; ?></td>
                    <td>
<!--                        data-toggle="modal" data-target="#myModal"-->
                        <button class="btn btn-danger delete_custumer" value = "<?php echo $row['id_khachhang'];?>" >Xóa</button>
                        <a href="index.php?page=show-detail&id_customer=<?php echo $row['id_khachhang']; ?>"
                           class="btn btn-success">Xem chi tiết</a>
                        <!-- <a href="index.php?page=edit" class="btn btn-success">Xem chi tiết</a>-->
                        <a href="index.php?page=customer_rotation&id=<?php echo $row['id_khachhang']; ?>"
                           class="btn btn-info">Điều chuyển</a>
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
<?php
$id_nhanvien = $_SESSION['id_nv'];
$id_khachhang = $_GET['id_customer'];
$sql_detail = "SELECT thoigiantuvan, noidungtuvan ,id_tientrinh
    FROM tbl_tientrinhcs WHERE  id_khachhang = $id_khachhang AND id_nhanvien = $id_nhanvien ; ";
$query_detail = mysqli_query($conn, $sql_detail);
// Query name custommer
$sql_name = " SELECT ten_khachhang FROM tbl_khachhang WHERE id_khachhang = $id_khachhang ";
$query_name = mysqli_query($conn, $sql_name);
$name = mysqli_fetch_array($query_name);
?>
<div class="container">
    <div class="row" style="padding: 10px 10px  ;">
        <h2>Chi tiết chăm sóc khách hàng: <?php echo $name['ten_khachhang']; ?></h2>
        <?php
        $sql_kh = "SELECT trang_thai FROM tbl_khachhang WHERE id_khachhang = $id_khachhang";
        $query_kh = mysqli_query($conn, $sql_kh);
        $row_kh = mysqli_fetch_array($query_kh);

        ?>
        <a href="index.php?page=add-process&id_khachhang=<?php echo $id_khachhang; ?>"
           class="btn btn-success add-process" <?php if ($row_kh['trang_thai'] == 2){echo "style=\"display: none\"";} ?> >Thêm tiến trình </a>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th >STT</th>
                <th>Thời gian tư vấn</th>
                <th>Nội dung tư vấn</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <ol>
                <tbody id="myTable" class="table_number">
                <?php
                While ($row_detail = mysqli_fetch_array($query_detail)) {
                    ?>
                    <tr class="delete<?php echo $row_detail['id_tientrinh']; ?>">
                        <td><strong></strong></td>
                        <td> <?php echo $row_detail['thoigiantuvan']; ?> </td>
                        <td> <?php echo $row_detail['noidungtuvan']; ?> </td>
                        <td>
                            <button class="btn btn-danger delete" value="<?php echo $row_detail['id_tientrinh']; ?>">Xóa
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </ol>
        </table>
    </div>
</div>
</div>
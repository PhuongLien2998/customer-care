<?php  
		include_once '../config/myConfig.php';
    $id = $_POST['id']; // số điện thoại muốn tìm
    $ngaybd = $_POST['ngaybd'];
    $ngaykt = $_POST['ngaykt'];

    $sql=" SELECT tbl_hoadon.id_hoadon, tbl_khachhang.id_khachhang, tbl_khachhang.ten_khachhang,tbl_hoadon.thoigianthanhtoan ,SUM(tongtien) AS B
    FROM tbl_hoadon, tbl_nhanvien, tbl_khachhang,
        (SELECT tbl_hoadonchitiet.id_hdct, tbl_hoadonchitiet.id_hoadon ,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
                    FROM tbl_hoadonchitiet,tbl_dienthoai
                    WHERE tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai) AS KL
    WHERE tbl_hoadon.id_hoadon=KL.id_hoadon AND tbl_nhanvien.id_nhanvien=tbl_hoadon.id_nhanvienbh  AND tbl_khachhang.id_khachhang=tbl_hoadon.id_khachhang AND  tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt' AND tbl_hoadon.id_nhanvienbh='$id'
    GROUP BY KL.id_hoadon
    ";
    $query = mysqli_query($conn, $sql); // câu lênh truy vấn
    $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
    ?>
        <div class="list_khachhangtheodoanhthhu">
    
    <table class="table table-striped table-responsive">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã hóa đơn</th>
                    <th scope="col">Thời gian thanh toán </th>
                    <th scope="col">Mã khách hàng </th>
                    <th scope="col">Tên khách hàng </th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Xem chi tiết</th>

                  
                  </tr>
                </thead>
                <tbody>
                  
                    <?php 
                    $dem = 0;
                    while ($row = mysqli_fetch_array($query)) {
                      $dem += 1;
                    ?>

                    <tr>
                        <th scope="row"><?php echo $dem; ?></th>
                        <td><?php echo $row['id_hoadon']  ?></td>
                        <td><?php echo $row['thoigianthanhtoan']  ?></td>
                    <td><?php echo $row['id_khachhang']  ?></td>
                    <td><?php echo $row['ten_khachhang']  ?></td>
                    <td><?php echo number_format($row['B']) ?> </td>
                    <td><button type="button" class="btn btn-info" id="view_hdctbnv" value="<?php echo $row['id_hoadon']; ?>" >Xem  </button></td>
                    
                    </tr>
                  
                  <?php 
                    }
                  
                    
                  ?>
                </tbody>
              </table>
              <?php 
           
          }
          else {
            echo "Không có bản ghi nào";
          }
   ?>
</div>
    </div>
</body>
</html>

<?php include_once "header/header.php" ;

$sql="SELECT tonghd.thoigianthanhtoan,tonghd.id_khachhang,tonghd.ten_khachhang, SUM(a)AS b
FROM
(SELECT tbl_hoadon.id_hoadon,tbl_hoadon.thoigianthanhtoan, tbl_khachhang.id_khachhang,tbl_khachhang.ten_khachhang ,SUM(tongtien)AS a
FROM tbl_hoadon,tbl_hoadonchitiet,tbl_nhanvien,tbl_khachhang,tbl_chinhanh,
	(SELECT tbl_hoadonchitiet.id_hdct,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
     FROM tbl_hoadonchitiet,tbl_dienthoai
     WHERE tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai)AS tien
WHERE tbl_hoadon.id_hoadon=tbl_hoadonchitiet.id_hoadon AND tbl_hoadonchitiet.id_hdct=tien.id_hdct AND tbl_hoadon.id_nhanvienbh=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_hoadon.id_khachhang=tbl_khachhang.id_khachhang 
GROUP BY tbl_hoadonchitiet.id_hoadon)AS tonghd
 GROUP BY tonghd.id_khachhang
 ORDER BY b DESC
 LIMIT 10
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
                    <th scope="col">Mã khách hàng </th>
                    <th scope="col">Tên khách hàng </th>
                    <th scope="col">Tổng số hóa đơn</th>
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
                        <td><?php echo $row['thoigianthanhtoan']  ?></td>
                    <td><?php echo $row['id_khachhang']  ?></td>
                    <td><?php echo $row['ten_khachhang']  ?></td>
                    <td><?php echo number_format($row['b']) ?> </td>
                    <td><button type="button" class="btn btn-info" id="view_hd" value="<?php echo $row['id_khachhang']; ?>" >Xem  </button></td>
                    
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

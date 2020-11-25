<?php  
		include_once '../config/myConfig.php';
  $id = $_POST['id']; // số điện thoại muốn tìm
  $ngaybd = $_POST['ngaybd']; // số điện thoại muốn tìm
  $ngaykt = $_POST['ngaykt']; 
  $chinhanh = $_POST['chinhanh']; 
	$sql = "SELECT tbl_hoadon.thoigianthanhtoan, tbl_hoadon.id_hoadon, tbl_khachhang.ten_khachhang ,SUM(tongtien)AS a
  FROM tbl_hoadon,tbl_hoadonchitiet,tbl_nhanvien,tbl_khachhang,tbl_chinhanh,
    (SELECT tbl_hoadonchitiet.id_hdct,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
       FROM tbl_hoadonchitiet,tbl_dienthoai
       WHERE tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai)AS tien
  WHERE tbl_hoadon.id_hoadon=tbl_hoadonchitiet.id_hoadon AND tbl_hoadonchitiet.id_hdct=tien.id_hdct AND tbl_hoadon.id_nhanvienbh=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_hoadon.id_khachhang=tbl_khachhang.id_khachhang AND tbl_chinhanh.ten_chinhanh='$chinhanh' AND tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt'AND tbl_hoadon.id_khachhang='$id' 
  GROUP BY tbl_hoadonchitiet.id_hoadon
  ORDER BY tbl_hoadon.thoigianthanhtoan DESC
   ";
    $query = mysqli_query($conn, $sql);
    $sql1="SELECT    DISTINCT tbl_khachhang.id_khachhang,tbl_khachhang.ten_khachhang,tbl_khachhang.diachi_khachhang,tbl_khachhang.sdt_khachhang
    FROM tbl_khachhang,tbl_hoadon
    WHERE tbl_khachhang.id_khachhang=tbl_hoadon.id_khachhang AND tbl_hoadon.id_khachhang='$id'";
    $query1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($query1);
    $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
    if ($count > 0) {
		
?>


        <div class="row list-mota">
        <div class="info col">
              <ul class="info-client">
                <li><?php echo $row1['id_khachhang']; ?></li>
                <li><?php echo $row1['ten_khachhang']; ?></li>
                <li><?php echo $row1['diachi_khachhang']; ?> </li>
                <li><?php echo $row1['sdt_khachhang']; ?></li>
				
             
              </ul>

                
            </div>
            
        <table class="table table-striped table-responsive-md">
                <thead class="table-primary">
                  <tr>
                  <th scope="col">STT</th>
                    <th scope="col">Thời gian</th>
                   
                    <th scope="col"> Mã hóa đơn </th>
                    <th scope="col">Tổng tiền </th>
                    <th scope="col"> Xem chi tiết hóa đơn </th>
                
                   
                  
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
				  <td><?php echo $row['thoigianthanhtoan']; ?></td>
					<td><?php echo $row['id_hoadon']; ?></td>
					<td><?php echo number_format($row['a']) ?></td>
          <td><button type="button" class="btn btn-info view" id="view_hdct" value="<?php echo $row['id_hoadon']; ?>" >Xem  </button></td>
				
		
                   
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
       
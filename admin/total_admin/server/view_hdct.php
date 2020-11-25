<?php  
		include_once '../config/myConfig.php';
  $id = $_POST['id']; // số điện thoại muốn tìm
  $ngaybd = $_POST['ngaybd']; // số điện thoại muốn tìm
  $ngaykt = $_POST['ngaykt']; 
  $chinhanh = $_POST['chinhanh']; 
	$sql = "SELECT tbl_hoadonchitiet.id_hdct,tbl_hoadonchitiet.id_dienthoai,tbl_dienthoai.ten_dienthoai,tbl_dienthoai.gia_dienthoai,tbl_hoadonchitiet.soluong,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
    FROM tbl_hoadonchitiet,tbl_hoadon,tbl_dienthoai
    WHERE tbl_hoadonchitiet.id_hoadon=tbl_hoadon.id_hoadon AND tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai AND tbl_hoadon.id_hoadon='$id';
    
   ";
    $query = mysqli_query($conn, $sql);
    $sql1="SELECT tbl_hoadon.thoigianthanhtoan, tbl_hoadon.id_hoadon, tbl_khachhang.ten_khachhang ,SUM(tongtien)AS a
    FROM tbl_hoadon,tbl_hoadonchitiet,tbl_nhanvien,tbl_khachhang,tbl_chinhanh,
      (SELECT tbl_hoadonchitiet.id_hdct,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
         FROM tbl_hoadonchitiet,tbl_dienthoai
         WHERE tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai)AS tien
    WHERE tbl_hoadon.id_hoadon=tbl_hoadonchitiet.id_hoadon AND tbl_hoadonchitiet.id_hdct=tien.id_hdct AND tbl_hoadon.id_nhanvienbh=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_hoadon.id_khachhang=tbl_khachhang.id_khachhang AND tbl_chinhanh.ten_chinhanh='$chinhanh' AND tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt'AND tbl_hoadon.id_hoadon='$id' 
    GROUP BY tbl_hoadonchitiet.id_hoadon";
    $query1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($query1);
    $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
    if ($count > 0) {
		
?>


        <div class="row list-mota">
        <div class="info col">
              <ul class="info-client">
                <li>Mã hóa đơn:<?php echo $row1['id_hoadon']; ?></li>
                <li>Tổng tiền:<?php echo number_format($row1['a'])?></li>
               
				
             
              </ul>

                
            </div>
            
        <table class="table table-striped table-responsive-md">
                <thead class="table-primary">
                  <tr>
                  <th scope="col">Mã hóa đơn chi tiết</th>
                    <th scope="col">Mã sản phẩm </th>
                    <th scope="col"> Mã sản phẩm  </th>
                    <th scope="col"> Tên sản phẩm  </th>
                    <th scope="col">Đơn giá  </th>
                    <th scope="col"> Số lượng </th>
                    <th scope="col"> Tổng tiền </th>
                
                   
                  
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
				  <td><?php echo $row['id_hdct']; ?></td>
					<td><?php echo $row['id_dienthoai']; ?></td>
                    <td><?php echo $row['ten_dienthoai']; ?></td>
                    <td><?php echo number_format($row['gia_dienthoai']) ?></td>
                    <td><?php echo $row['soluong']; ?></td>
                    <td><?php echo number_format($row['tongtien']) ?></td>
          
		
                   
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
       
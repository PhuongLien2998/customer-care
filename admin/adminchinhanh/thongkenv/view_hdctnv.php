<?php  
		include_once '../config/myConfig.php';
  $id = $_POST['id']; // số điện thoại muốn tìm
  $ngaybd = $_POST['ngaybd']; // số điện thoại muốn tìm
  $ngaykt = $_POST['ngaykt']; 
  
	$sql = "SELECT tbl_hoadonchitiet.id_hdct,tbl_hoadonchitiet.id_dienthoai,tbl_dienthoai.ten_dienthoai,tbl_dienthoai.gia_dienthoai,tbl_hoadonchitiet.soluong,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
    FROM tbl_hoadonchitiet,tbl_hoadon,tbl_dienthoai
    WHERE tbl_hoadonchitiet.id_hoadon=tbl_hoadon.id_hoadon AND tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai AND tbl_hoadon.id_hoadon='$id';
    
   ";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
   
	
		
?>
<div class="container"><a href="javascript:history.back() " class="goback">Quay lại</a></div>

        <div class="row list-mota">
        
            
        <table class="table table-striped table-responsive">
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
       
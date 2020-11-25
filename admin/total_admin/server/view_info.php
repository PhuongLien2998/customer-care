<?php  
		include_once '../config/myConfig.php';
	$id = $_POST['id']; // số điện thoại muốn tìm
	$sql = "SELECT tbl_tientrinhcs.thoigiantuvan,tbl_tientrinhcs.id_nhanvien,tbl_nhanvien.ten_nhanvien,tbl_chinhanh.ten_chinhanh,tbl_tientrinhcs.noidungtuvan FROM tbl_tientrinhcs,tbl_nhanvien,tbl_chinhanh WHERE tbl_tientrinhcs.id_nhanvien=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_tientrinhcs.id_khachhang='$id'";
	$query = mysqli_query($conn, $sql);
	$sql1="SELECT tbl_khachhang.id_khachhang,tbl_khachhang.ten_khachhang,tbl_khachhang.diachi_khachhang,tbl_khachhang.sdt_khachhang,tbl_khachhang.trang_thai,tbl_nhanvien.ten_nhanvien FROM tbl_khachhang,tbl_tientrinhcs,tbl_nhanvien WHERE tbl_tientrinhcs.id_khachhang=tbl_khachhang.id_khachhang AND tbl_nhanvien.id_nhanvien=tbl_tientrinhcs.id_nhanvien AND tbl_tientrinhcs.id_khachhang='$id'  ";
	$query1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array($query1);
	$count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
		
?>

        <div class="row list-mota">
            <div class="info col">
              <ul class="info-client">
                <li>id: <?php echo $row1['id_khachhang']; ?></li>
                <li>Khách hàng: <?php echo $row1['ten_khachhang']; ?></li>
                <li>Địa chỉ:  <?php echo $row1['diachi_khachhang']; ?> </li>
                <li>SĐT: <?php echo $row1['sdt_khachhang']; ?></li>
				<li> Trạng thái: <?php if($row1['id_khachhang']==1)echo "Đang chăm sóc" ;
						else if($row1['id_khachhang']==2) echo "Đã mua";
						else if($row1['id_khachhang']==3) echo "Chăm sóc mới "; ?></li>
                <li>NV chăm sóc: <?php echo $row1['ten_nhanvien']; ?></li>
              </ul>

                
            </div>
        <table class="table table-striped table-responsive-xs">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">Thời gian</th>
                   
                    <th scope="col">Mã nhân viên </th>
                    <th scope="col">Tên nhân viên  </th>
                    <th scope="col"> Chi Nhánh</th>
                    <th scope="col">Nội dung chăm sóc</th>
                   
                  
                  </tr>
                </thead>
                <tbody>
					<?php 
					while ($row = mysqli_fetch_array($query)) {
					?>
                  <tr>
				  <td><?php echo $row['thoigiantuvan']; ?></td>
					<td><?php echo $row['id_nhanvien']; ?></td>
					<td><?php echo $row['ten_nhanvien']; ?></td>
					<td><?php echo $row['ten_chinhanh']; ?></td>
					<td><?php echo $row['noidungtuvan']; ?></td>
		
                   
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
       
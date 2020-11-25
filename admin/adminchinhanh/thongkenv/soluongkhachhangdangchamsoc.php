
<?php  
		include_once '../config/myConfig.php';
  $id = $_POST['id'];
  $id1= trim($id);
  $ngaybd = $_POST['ngaybd'];
  $ngaykt = $_POST['ngaykt'];
 
 
	$sql = "SELECT tbl_chamsoc.id_nhanvien,tbl_nhanvien.ten_nhanvien,COUNT(tbl_chamsoc.id_nhanvien) AS C
    FROM tbl_chamsoc,tbl_nhanvien,tbl_chinhanh,tbl_tientrinhcs
    WHERE tbl_chamsoc.id_nhanvien=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_tientrinhcs.id_nhanvien=tbl_chamsoc.id_nhanvien AND tbl_tientrinhcs.id_khachhang=tbl_chamsoc.id_khachhang AND tbl_chinhanh.id_chinhanh='$id1' AND tbl_tientrinhcs.thoigiantuvan BETWEEN ' $ngaybd' AND ' $ngaykt'
    GROUP BY tbl_chamsoc.id_nhanvien
  
  ";
  $query = mysqli_query($conn, $sql);
  
  $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {



	?>
	    
<div >
            <table class="table table-striped table-responsive-xs">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã nhân viên </th>
                    <th scope="col">Tên nhân viên </th>
                    <th scope="col">Số lượng khách hàng </th>
                  
                  
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
                <td><?php echo $row['id_nhanvien']  ?></td>
                <td><?php echo $row['ten_nhanvien']  ?></td>
                <td><?php echo $row['C']  ?></td>
		
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
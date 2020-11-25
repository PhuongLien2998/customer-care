<?php  
		include_once '../config/myConfig.php';
  $id = $_POST['id'];
  $id1= trim($id);
 
 
	$sql = "SELECT tbl_nhanvien.id_nhanvien,tbl_nhanvien.ten_nhanvien,AVG(tbl_danhgia.xephang)AS xephang
  FROM tbl_nhanvien,tbl_danhgia,tbl_chinhanh
  WHERE tbl_nhanvien.id_nhanvien=tbl_danhgia.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_chinhanh.id_chinhanh='$id1'
  GROUP BY tbl_danhgia.id_nhanvien
  ORDER BY xephang DESC,ten_nhanvien ASC
  ";
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {




	?>
	    
<div class="">
<table class="table table-striped table-responsive-xs">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã Nhân viên</th>
                    <th scope="col">Tên nhân viên  </th>
                    <th scope="col">Số sao </th>
                    

                  
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
                <td><?php echo $row['xephang']  ?></td>
		
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
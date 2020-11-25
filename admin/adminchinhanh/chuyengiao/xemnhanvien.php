<?php  
		include_once '../config/myConfig.php';
  
        $nvc = $_POST['nvc'];
        $nvn = $_POST['nvn'];
    $sql=" SELECT X.id_dieuchuyen,X.id_nhanvienchuyen,X.id_chinhanh,X.sdt_nhanvien, X.ten_nhanvien,X.id_nhanviennhan,(tbl_nhanvien.id_chinhanh) AS chinhanh,( tbl_nhanvien.ten_nhanvien ) as ten,(tbl_nhanvien.sdt_nhanvien)AS sdt,X.sdt_khachhang,X.ten_khachhang,x.lidochuyen,x.thoigianchuyen
    FROM tbl_nhanvien,
        (SELECT tbl_lichsudieuchuyen.id_dieuchuyen,tbl_lichsudieuchuyen.id_nhanvienchuyen,tbl_nhanvien.id_chinhanh,tbl_nhanvien.sdt_nhanvien ,tbl_nhanvien.ten_nhanvien ,tbl_lichsudieuchuyen.id_nhanviennhan,tbl_khachhang.sdt_khachhang,tbl_khachhang.ten_khachhang,tbl_lichsudieuchuyen.lidochuyen,tbl_lichsudieuchuyen.thoigianchuyen
        FROM tbl_lichsudieuchuyen,tbl_khachhang,tbl_nhanvien
        WHERE tbl_lichsudieuchuyen.id_khachhang=tbl_khachhang.id_khachhang AND tbl_lichsudieuchuyen.id_nhanvienchuyen=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.sdt_nhanvien='$nvc' )as X
    WHERE tbl_nhanvien.id_nhanvien=X.id_nhanviennhan AND tbl_nhanvien.sdt_nhanvien='$nvn'
    ORDER BY thoigianchuyen DESC
    
    
    ";
    $query = mysqli_query($conn, $sql); // câu lênh truy vấn
    $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
    ?>

<table class="table table-striped table-responsive">
             <thead class="table-primary">
               <tr>
                
                 <th scope="col">Mã điều chuyển</th>
                 <th scope="col">Mã nhân viên chuyển</th>
                 <th scope="col">Tên nhân viên chuyển </th>
                 <th scope="col">Mã nhân viên nhận</th>
                 <th scope="col">Tên nhân viên  nhận</th>
                 <th scope="col">Mã khách hàng</th>
                 <th scope="col">Tên khách hàng</th>
                 <th scope="col">Lý do </th>
                 <th scope="col">thời gian</th>
               
               </tr>
             </thead>
             <tbody>
             <?php 
                    $dem = 0;
                    while ($row = mysqli_fetch_array($query)) {
                      $dem += 1;
                  ?>

               <tr>
               <td><?php echo $row['id_dieuchuyen']  ?></td>
               <td><?php echo $row['id_chinhanh']."-".$row['id_nhanvienchuyen']  ?></td>
               <td><?php echo $row['ten_nhanvien']  ?></td>
               <td><?php echo $row['chinhanh']."-".$row['id_nhanviennhan']  ?></td>
               <td><?php echo $row['ten']  ?></td>
               <td><?php echo $row['sdt_khachhang']  ?></td>
               <td><?php echo $row['ten_khachhang']  ?></td>
               <td><?php echo $row['lidochuyen']  ?></td>
               <td><?php echo $row['thoigianchuyen']  ?></td>
              
                 
                
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
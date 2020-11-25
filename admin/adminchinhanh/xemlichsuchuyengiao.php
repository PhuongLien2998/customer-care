<?php  
	$sql = 'SELECT X.id_dieuchuyen,X.id_nhanvienchuyen,X.id_chinhanh, X.ten_nhanvien,X.id_nhanviennhan,(tbl_nhanvien.id_chinhanh) AS chinhanh,( tbl_nhanvien.ten_nhanvien ) as ten,X.sdt_khachhang,X.ten_khachhang,x.lidochuyen,x.thoigianchuyen
  FROM tbl_nhanvien,
      (SELECT tbl_lichsudieuchuyen.id_dieuchuyen,tbl_lichsudieuchuyen.id_nhanvienchuyen,tbl_nhanvien.id_chinhanh, tbl_nhanvien.ten_nhanvien ,tbl_lichsudieuchuyen.id_nhanviennhan,tbl_khachhang.sdt_khachhang,tbl_khachhang.ten_khachhang,tbl_lichsudieuchuyen.lidochuyen,tbl_lichsudieuchuyen.thoigianchuyen
      FROM tbl_lichsudieuchuyen,tbl_khachhang,tbl_nhanvien
      WHERE tbl_lichsudieuchuyen.id_khachhang=tbl_khachhang.id_khachhang AND tbl_lichsudieuchuyen.id_nhanvienchuyen=tbl_nhanvien.id_nhanvien  )as X
  WHERE tbl_nhanvien.id_nhanvien=X.id_nhanviennhan
  ORDER BY thoigianchuyen DESC
  LIMIT 10
   ';
	$query = mysqli_query($conn, $sql); // câu lênh truy vấn
  $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {

?>
<div class="container-fluid lichsu">
<div class="row chuyengiao">
            <div class="col-md-2 " name="left">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">Xem lịch sử chuyển giao</li>
                  
                    
                    <li class="list-group-item "> <button type="button" class="thoigian bt" value=" <?php echo $id ?>">Thời gian </button> </li>
                    <li class="list-group-item "> <button type="button" class="nhanvien bt" value=" <?php echo $id ?>">Nhân viên </button> </li>
                    <li class="list-group-item "> <button type="button" class="khachhang bt" value=" <?php echo $id ?>">Khách hàng  </button> </li>
                    
                  </ul>
            </div>
            <div class="col-md-10 chuyengiao" id="right" >
            <div >
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
     </div>
           
          
            </div>
        </div>

     

</div>

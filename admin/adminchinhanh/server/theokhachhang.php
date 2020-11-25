
<?php include_once '../config/myConfig.php';
	$sql = 'SELECT *FROM tbl_khachhang LIMIT 10  ';
    $query = mysqli_query($conn, $sql); // câu lênh truy vấn
?>
<div class="container-fluid">
<div class="row">
   
   <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12" >
   <div class="form-group ">
       <input type="tel"id="search_member" class="form-control inp-day" placeholder="Nhập số điện thoại cần tìm..." >
         
             </div>
   </div>
  
 </div>
 <div class="list-client " id="content-info" style="overflow-x:auto;">
         <table class="table table-striped table-responsive-xs">
             <thead class="table-primary">
               <tr>
                 <th scope="col">STT</th>
                 <th scope="col">Mã khách hàng </th>
                 <th scope="col">SDT khách hàng </th>
                 <th scope="col">Tên khách hàng </th>
                 <th scope="col">Chọn</th>
               
               </tr>
             </thead>
             <tbody id="view_data">
               <?php 
                 $dem = 0;
                 while ($row = mysqli_fetch_array($query)) {
                   $dem += 1;
               ?>

               <tr>
                 <th scope="row"><?php echo $dem; ?></th>
                 <td><?php echo $row['id_khachhang']  ?></td>
                 <td><?php echo $row['ten_khachhang']  ?></td>
                 <td><?php echo $row['sdt_khachhang'] ?> </td>
                 <td><button type="button" class="btn btn-info view" id="view_info" value="<?php echo $row['id_khachhang']; ?>" >Xem  </button></td>
                
               </tr>
             
              <?php 
                 }
               
              ?>
               
             </tbody>
           </table>
           <?php 
        
      
?>
     </div>

</div>
    
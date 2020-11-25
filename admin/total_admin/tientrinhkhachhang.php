
<?php  
	$sql = 'SELECT *FROM tbl_khachhang ';
  $query = mysqli_query($conn, $sql); // câu lênh truy vấn
  $sql4 = 'SELECT tbl_chinhanh.ten_chinhanh ,tbl_chinhanh.id_chinhanh FROM tbl_chinhanh ';

$query4 = mysqli_query($conn, $sql4);

	$count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
?>


<div class="chonchinhanh">
  <div class="container-fluid">
<!--     
    <div class="row">
   
      <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12" >
      <div class="form-group ">
          <input type="tel"id="search_member" class="form-control inp-day" placeholder="Nhập số điện thoại cần tìm..." >
            
                </div>
      </div>
     
    </div> -->
    <div class="row">
            <div class="col-md-2 " name="left">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">Tiến trình chăm sóc   </li>
                  
                    
                    <li class="list-group-item "> <button type="button" class=" theokhachhang bt" value=" <?php echo $id ?>">Theo khách hàng </button> </li>
                    <li class="list-group-item "> <button type="button" class="theochinhanh bt" value=" <?php echo $id ?>">Theo chi nhánh</button> </li>
                    
                    
                  </ul>
            </div>
            <div class="col-md-10" id="right" >
          
            </div>
        </div>
        <?php die();?>
    <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          
                <select class="browser-default custom-select custom-select-lg mb-3 select">
                <?php 
                   
                    while ($row1 = mysqli_fetch_array($query4)) {
                      
                  ?>
                <option  value="<?php echo $row1['ten_chinhanh']  ?>"> <?php echo $row1['ten_chinhanh']  ?></option>
                <?php 
                    }
                ?>
              
              </select>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                <button class="btn btn-info timkiem" onclick="checkRegis()">Tìm kiếm</button>
            </div>

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
           
          }
          else {
            echo "Không có bản ghi nào";
          }
   ?>
        </div>
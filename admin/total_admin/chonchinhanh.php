

<?php  

	$sql = 'SELECT tbl_chinhanh.ten_chinhanh ,tbl_chinhanh.id_chinhanh FROM tbl_chinhanh ';
	$query = mysqli_query($conn, $sql); // câu lênh truy vấn
	
  $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
?>

 
          <div class="list-chinhanh " id="show-tk">
          <table class="table table-striped table-responsive-xs">
            <thead class="table-primary">
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Chi Nhánh</th>
                <th scope="col">Chọn</th>
              
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
                <td><?php echo $row['ten_chinhanh']  ?></td>
                <td><button type="button" class="btn btn-info view_employ" id="chinhanh" value=" <?php echo $row['id_chinhanh'] ?>">Chọn</button></td>
               
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


<?php  
	include_once '../config/myConfig.php';
  $sql4 = 'SELECT tbl_chinhanh.ten_chinhanh ,tbl_chinhanh.id_chinhanh FROM tbl_chinhanh ';

$query4 = mysqli_query($conn, $sql4);

	
?>
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

                <button class="btn btn-info tim">Tìm kiếm</button>
            </div>

 </div>
 <div class="main-chinhanh">
     
 </div>
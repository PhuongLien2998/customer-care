<?php  
		include_once '../config/myConfig.php';
    $chinhanh= $_POST['chinhanh']; // số điện thoại muốn tìm

	$sql = "SELECT tbl_chamsoc.id_khachhang,tbl_khachhang.ten_khachhang,tbl_khachhang.sdt_khachhang
    FROM tbl_chamsoc,tbl_khachhang,tbl_nhanvien,tbl_chinhanh
    WHERE tbl_chamsoc.id_khachhang=tbl_khachhang.id_khachhang AND tbl_nhanvien.id_nhanvien=tbl_chamsoc.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_chinhanh.ten_chinhanh='$chinhanh'";
	$query = mysqli_query($conn, $sql);
	$stt = 0;
	$count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
	?>
	        
<div class="list-client " id="content-info" style="overflow-x:auto;">
<table class="table table-striped table-responsive-md">
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
	
<?php  
		include_once '../config/myConfig.php';
	$name = $_POST['key']; // số điện thoại muốn tìm
	$sql = "SELECT tbl_nhanvien.anh_nhanvien,tbl_nhanvien.ten_nhanvien,tbl_nhanvien.id_nhanvien,tbl_chinhanh.ten_chinhanh
    FROM tbl_nhanvien,tbl_taikhoan,tbl_chinhanh
    WHERE tbl_taikhoan.id_nv=tbl_nhanvien.id_nhanvien ANd tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND  tbl_nhanvien.ten_nhanvien LIKE'%$name%' AND tbl_taikhoan.status=1 AND (
        tbl_taikhoan.level = 2 OR tbl_taikhoan.level = 4
    ) ";
	$query = mysqli_query($conn, $sql);
	$stt = 0;

	?>
					<table class="table table-striped">
						<thead class="table-primary">
							<th scope="col">STT</th>
							<th scope="col">Ảnh</th>
							<th scope="col">Tên</th>
							<th scope="col">Mã nhân viên</th>
							<th scope="col">Chi nhánh</th>
							<th scope="col">chức năng</th>
						</thead>
						<tbody>
							<?php 
							$dem = 0;
							while ($row = mysqli_fetch_array($query)) {
								$dem += 1;
								?>
								<tr>
									<td><?php echo $dem; ?></td>
									<td><img style="width: 100px; height: 100px" src="../images/anhnv/<?php echo $row['anh_nhanvien']; ?>" alt="<?php echo $row['anh_nhanvien']; ?>"></td>
									<td><?php echo $row['ten_nhanvien']; ?></td>
									<td><?php echo $row['id_nhanvien']; ?></td>
									<td><?php echo $row['ten_chinhanh']; ?></td>	
									<td>
										<a  href="index.php?page=info_staff&id=<?php echo $row['id_nhanvien']; ?>">
											<button class="btn btn-primary">xem</button>
										</a>
									</td>	
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>

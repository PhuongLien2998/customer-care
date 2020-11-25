<?php
include_once "config/myConfig.php";
if (session_id() == ''){
	session_start();
}
$sqlco = 'SELECT *FROM
	tbl_khachhang, tbl_taikhoan
	WHERE
	tbl_khachhang.id_khachhang = tbl_taikhoan.id_kh AND tbl_taikhoan.status = 1 AND 
	tbl_taikhoan.level =3 
LIMIT 10';
	$queryco = mysqli_query($conn, $sqlco); // câu lênh truy vấn
	$count = mysqli_num_rows($queryco); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
		?>

		<div class="container" >
			<div class="row" style="margin-top: 20px">
				
				<br>
				<!-- search -->
				<div class="col-md-3 ">			
					<form class="form-inline" role="form">
						<div class="form-group">
							<input type="email" class="form-control" id="Id_NV" placeholder="Số điện thoại">
						</div>
						<button type="submit" name="Search" class="btn btn-default" >Tìm</button>
					</form>
				</div>
				<!-- end search -->
			</div>
			<!-- result table -->
			<div class="col-md-12">
				<legend class="text-center"a>Danh sách khách hàng</legend>	

				<table class="table table-striped">
					<thead class="table-primary">
						<th scope="col">STT</th>
						<th scope="col">Mã khách hàng</th>
						<th scope="col">Tên</th>
						<th scope="col">Giới tính</th>
						<th scope="col">Số điện thoại</th>
						<th scope="col">Địa chỉ</th>
						<th scope="col">chức năng</th>
					</thead>
					<tbody>
						<?php 
						$dem = 0;
						while ($row = mysqli_fetch_array($queryco)) {
							$dem += 1;
							?>
							<tr>
								<td><?php echo $dem; ?></td>
								<td><?php echo $row['id_khachhang']; ?></td>
								<td><?php echo $row['ten_khachhang']; ?></td>
								<td><?php if($row['gioitinh']==1){echo "Nam";}else{ echo "Nữ";} ?></td>	
								<td><?php echo $row['sdt_khachhang']; ?></td>
								<td><?php echo $row['diachi_khachhang']; ?></td>
								<td>
									<a  href="index.php?page=info_co&id=<?php echo $row['id_khachhang']; ?>">
										<button class="btn btn-primary">xem</button>
									</a>
								</td>	
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
<?php }
?>


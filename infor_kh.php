<?php
	if(isset($_SESSION['id_kh'])){
		$id_kh= $_SESSION['id_kh'];
		$sql="SELECT * FROM tbl_khachhang WHERE id_khachhang =$id_kh";
		$query= mysqli_query($conn,$sql);
		$info_kh= mysqli_fetch_assoc($query);
		// echo "<pre>";
		// print_r($info_kh);
		// echo "</pre>";
		// die();
	}
 ?>
<div class="col-md-12">
	<div class="col-md-12">
		<h3>Thông tin cá nhân</h3>
	</div>

	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table table-hover ">
				
					<tr>
		<td><b>Họ & Tên</b></td><td><span  id="noti_name"><?php echo $info_kh['ten_khachhang'] ?></span> <span style="color: cyan;"> |<a  data-toggle="modal" href='#doiten' style="color: cyan;">Thay đổi</a></span></td>
					</tr>
					<tr>
						<td><b>Số điện thoại</b></td><td><?php echo $info_kh['sdt_khachhang'] ?></td>
					</tr>
					<tr>
						<td><b>Số thẻ căn cước</b></td><td><?php echo $info_kh['thecancuoc'] ?></td>
					</tr>
					
					<tr>
						<td><b>Ngày sinh</b></td><td><?php echo $info_kh['ngaysinh'] ?></td>
					</tr>
					
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table table-hover">
				
					
					<tr>
						<td><b>Địa chỉ</b></td><td><span  id="noti_diachi"><?php echo $info_kh['diachi_khachhang'] ?></span> <span style="color: cyan;">| <a  data-toggle="modal" href='#doidiachi' style="color: cyan;">Thay đổi</a></span></td>
					</tr>
					<tr>
						<td><b>Tuổi</b></td><td><?php if(isset($_SESSION['age'])) echo $_SESSION['age']; ?></td>
					</tr>
					<tr>
						<td><b>Giới tính</b></td><td><?php if($info_kh['gioitinh']==1) echo 'Nam';
						 else echo 'Nữ';?></td>
					</tr>
					<tr>
						<td><b>Điểm tích lũy</b></td><td><?php echo $info_kh['diemtichluy'] ?></td>
					</tr>
			
				
			</table>
		</div>
	</div>

	

	<div class="col-md-12">
		<a  type="button" class="btn btn-danger"  href="index.php?page=changepass">Đổi mật khẩu</a>
	</div>

<!--  doi ten -->

<div class="modal fade" id="doiten">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
			<span>Tên hiện tại: <b><span id="c_n"><?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></span></b> </span>
			<form action="" method="POST" role="form" id="re_name">

	<div class="form-group">
		<input type="text"  class="form-control" id="fname" placeholder="Nhập tên mới của bạn">
	</div>
	<span id="noti_check_name"></span>
	<div class="form-group">
	<button type="submit" style="background:#FCDE5C; border:none;color:#000;" 
	class="btn btn-primary form-control"  id="btn_rename">Lưu thay đổi</button>
	</div>
	</form>
			</div>
		
		</div>
	</div>
</div>

<!-- doi dia chi -->

<div class="modal fade" id="doidiachi">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
			<span>Địa chỉ hiện tại: <b><span id="c_a"><?php echo $info_kh['diachi_khachhang']; ?></span></b> </span>
			<form action="" method="POST" role="form" id="re_addr">

	<div class="form-group">
		<input type="text"  class="form-control" id="faddr" placeholder="Nhập địa chỉ mới của bạn">
	</div>
	<span id="noti_check_addr"></span>
	<div class="form-group">
	<button type="submit" style="background:#FCDE5C; border:none;color:#000;" 
	class="btn btn-primary form-control"  id="btn_readdr">Lưu thay đổi</button>
	</div>
	</form>
			</div>
		
		</div>
	</div>
</div>


<!-- <div class="modal fade " id="doimatkhau">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Đổi mật khẩu</h4>
			</div>
			<div class="modal-body">
				<table class="table-responsive">
					<tr><td><b>Nhập mật khẩu cũ:</b> </td><td> <input type="password"style="border-radius: 5px; height: 30px;"> </td></tr>
					<tr><td><b>Nhập mật khẩu mới:</b>  </td><td><input type="password" style="border-radius: 5px; height: 30px;"></td></tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
				<button type="button" class="btn btn-danger">Lưu thay đổi</button>
			</div>
		</div>
	</div>
</div> -->
</div>
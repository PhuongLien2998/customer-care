<?php
include_once 'config/myConfig.php';
    if (session_id() == ''){
        session_start();
    }
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
        $_SESSION["idkh"] = $id;
		$sqlSelecco = "SELECT
					    *
					FROM
					    tbl_khachhang
					WHERE
					   id_khachhang = '$id' ";
		$querySelecco = mysqli_query($conn, $sqlSelecco);
		$rowSelecco = mysqli_fetch_array($querySelecco);
		$_SESSION["cmtkh"] = $rowSelecco['thecancuoc'];
        $_SESSION["sdtkh"] = $rowSelecco['sdt_khachhang'];
	}else{
		header("Location: index.php");
	}

?>
<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin-top: 10px"> <h3>THÔNG TIN KHÁCH HÀNG</h3></div>
        
		
		<div class="col-md-9">
            <div  id="noti_up">
 
             </div>
           
			<form class="form-horizontal" role="form" method="POST" action="">
			 	<div class="form-group">
					<label for="Name" class="col-sm-3 control-label">Mã khách hàng : <?php echo $rowSelecco['id_khachhang']; ?></label>
				</div>
                <div class="form-group">
                    <label for="Point" class="col-sm-3 control-label">Điểm tích lũy</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="Point" id="Point" value="<?php echo $rowSelecco['diemtichluy']; ?>" disabled>
                    </div>
                </div>  
				<div class="form-group">
					<label for="Name" class="col-sm-3 control-label">Họ và Tên</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Name" id="Name" value="<?php echo $rowSelecco['ten_khachhang']; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="Cmt" class="col-sm-3 control-label">Thẻ căn cước</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Cmt" id="Cmt" value="<?php echo $rowSelecco['thecancuoc']; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="Birth" class="col-sm-3 control-label">Ngày sinh</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="Birth" id="Birth" value="<?php echo $rowSelecco['ngaysinh']; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="Energy" class="col-sm-3 control-label">Giới tính</label>
					<div class="col-sm-10">
						<input type="radio" name="energy" id="Energy" value="" <?php if ($rowSelecco['gioitinh'] ==1) echo "checked"; {
							# code...
						} ?> disabled>Nam
						<input type="radio" name="energy" id="Energy" value="" <?php if ($rowSelecco['gioitinh'] ==0) echo "checked"; {
							# code...
						} ?> disabled>Nữ 
					</div>
				</div>
				<div class="form-group">
					<label for="Phone" class="col-sm-3 control-label">Số điện thoại</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Phone" id="Phone" value="<?php echo $rowSelecco['sdt_khachhang']; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Địa chỉ</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Address" id="Address" value="<?php echo $rowSelecco['diachi_khachhang']; ?>" disabled>
					</div>
				</div>	
				
			</form>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a  href="index.php?page=edit_co&id=<?php echo $rowSelecco['id_khachhang']; ?>">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                </div>
            </div>
		</div>
	</div>
</div>





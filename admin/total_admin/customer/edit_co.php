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
	$tcc = $rowSelecco['thecancuoc'];
     $sdt= $rowSelecco['sdt_khachhang'];
}else{
	header("Location: index.php");
}
if (isset($_POST['submit']) ) {
    $Name = $_POST['Name'];
    $Point = $_POST['Point'];
    $Cmt = $_POST['Cmt'];
    $Birth = $_POST['Birth'];
    $Phone = $_POST['Phone'];
    $Energy = $_POST['Energy'];    
    $Address = $_POST['Address'];
    $date = date('Y-m-d');
    $error =0;
    $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
    $regexCmt = '/^\d+$/';
    $regexPhone = '/^\d+$/';
    $regexEmail = '/\b[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,6}\b/i';
   // check ten
    if($Name == ""){
            $eror_Name = "Họ tên không được để trống!";
            $error ++;
            //echo "ht k dc de trong";
    }
    else if (preg_match($regexName, $Name) == 0) {
            $eror_Name = "Họ tên không hợp lệ!";
            $error ++;
            //echo "ko hop le ten";
            // $Name = "";
    }
    //check cmt
    if($tcc!= $Cmt){
    	if($Cmt == ""){
    		$eror_Cmt = "Chứng minh thư không được để trống!";
    		$error ++;
    	}
    	else if (preg_match($regexCmt, $Cmt) == 0) {
    		$eror_Cmt = "Chứng minh thư không hợp lệ!";
    		$error ++;
            // $Cmt = "";
    	}
    	else if(check_cmt($Cmt)==1){
    		$eror_Cmt = "Chứng minh thư Đã tồn tại!";
    		$error ++;
            // $Cmt = "";
    	}
    }else if($Cmt == ""){
            $eror_Cmt = "Chứng minh thư không được để trống!";
            $error ++;
        }
    
    //check Birrth
    if($Birth == ""){
            $eror_Birth = "Ngày sinh không được để trống!";
            $error ++;
    }
    // check phone
    if($sdt!=$Phone){
    	if($Phone == ""){
    		$eror_Phone = "Số điện thoại không được để trống!";
    		$error ++;
    	}
    	else if (!preg_match($regexPhone, $Phone)) {
    		$eror_Phone = "Số điện thoại không hợp lệ!";
    		$error ++;
            // $Phone = "";
    	}
    	else if(check_phone($Phone)==1){
    		$eror_Phone = "Số điện thoại đã tồn tại!";
    		$error ++;
            // $Phone = "";
    	}
    }else if($Phone == ""){
            $eror_Phone = "Số điện thoại không được để trống!";
            $error ++;
        }
   
    // check energy
    if($Energy == ""){
            $eror_energy = "Giới tính không được để trống!";
            $error ++;
    }
    // check Email

    // check Address
     if($Address == ""){
            $eror_Address = "Địa chỉ không được để trống!";
            $error ++;
    }
    
	   
    if($error == 0){
      $sql = "UPDATE tbl_khachhang 
      SET sdt_khachhang = '$Phone', thecancuoc='$Cmt', gioitinh = $Energy,
      diachi_khachhang = '$Address', ten_khachhang = '$Name', diemtichluy =$Point, ngaysinh = '$Birth' WHERE  id_khachhang = '$id' ";
      $query = mysqli_query($conn, $sql);
      $sql2 = "UPDATE tbl_taikhoan
      SET username = '$Phone'
      WHERE  id_kh = '$id' ";
      $query2 = mysqli_query($conn, $sql2);
      if($query2!==false&&$query!==false){
        echo "<script>alert('Sửa thông tin thành công!');
        window.location=\"index.php?page=info_co&id=$id\" ;
        </script>";
    }else{
        echo "<p style='color: red;'>Thêm mới không thành công!</p>";
    }
}

    
}

    function check_phone($phone){
        global $conn;
        $sqlCheck = "SELECT  sdt_khachhang FROM tbl_khachhang WHERE
                  sdt_khachhang = '$phone' ";
        $queryCheck = mysqli_query($conn, $sqlCheck);
        return mysqli_num_rows( $queryCheck);
    }
    
     function check_cmt($cmt){
        global $conn;
        $sqlCheck2 = "SELECT thecancuoc FROM tbl_khachhang WHERE
                   thecancuoc = '$cmt' ";
        $queryCheck2 = mysqli_query($conn, $sqlCheck2);
        return mysqli_num_rows($queryCheck2);
    }

     // function check_email($email){
     //    global $conn;
     //    $sqlCheck3 ="SELECT email_nhanvien FROM tbl_nhanvien WHERE
     //               email_nhanvien = '$email' ";
     //    $queryCheck3 = mysqli_query($conn, $sqlCheck3);
     //    return mysqli_num_rows($queryCheck3);
    //}

    
?> 


<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-5"><br>
			<span style="color: red;"><?php if(isset($eror)){ echo $eror; } ?></span>
			<form class="form-horizontal" role="form" method="POST" action="">
			 	<div class="form-group">
					<label  class="col-sm-10 control-label">Mã khách hàng : <?php echo $rowSelecco['id_khachhang']; ?></label>
				</div>
                <div class="form-group">
                    <label for="Point" class="col-sm-10 control-label">Điểm tích lũy</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="Point" id="Point" value="<?php echo $rowSelecco['diemtichluy']; ?>" >
                    </div>
                </div>  
				<div class="form-group">
					<label for="Name" class="col-sm-10 control-label">Họ và Tên <span style="color: red;"><?php if(isset($eror_Name)){ echo $eror_Name; } ?></span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Name" id="Name" value="<?php echo $rowSelecco['ten_khachhang']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Cmt" class="col-sm-10 control-label">Thẻ căn cước <span style="color: red;"><?php if(isset($eror_Cmt)){ echo $eror_Cmt; } ?></span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Cmt" id="Cmt" value="<?php echo $rowSelecco['thecancuoc']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Birth" class="col-sm-10 control-label">Ngày sinh <span style="color: red;"><?php if(isset($eror_Birth)){ echo $eror_Birth; } ?></span></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="Birth" id="Birth" value="<?php echo $rowSelecco['ngaysinh']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Energy" class="col-sm-10 control-label">Giới tính <span style="color: red;"><?php if(isset($eror_energy)){ echo $eror_energy; } ?></span></label>
					<div class="col-sm-10">
						<input type="radio" name="Energy" id="Energy" value="1" <?php if ($rowSelecco['gioitinh'] ==1) echo "checked"; {
							# code...
						} ?> >Nam
						<input type="radio" name="Energy" id="Energy" value="0" <?php if ($rowSelecco['gioitinh'] ==0) echo "checked"; {
							# code...
						} ?> >Nữ 
					</div>
				</div>
				<div class="form-group">
					<label for="Phone" class="col-sm-10 control-label">Số điện thoại <span style="color: red;"><?php if(isset($eror_Phone)){ echo $eror_Phone; } ?></span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Phone" id="Phone" value="<?php echo $rowSelecco['sdt_khachhang']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Address" class="col-sm-10 control-label">Địa chỉ <span style="color: red;"><?php if(isset($eror_Address)){ echo $eror_Address; } ?></span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Address" id="Address" value="<?php echo $rowSelecco['diachi_khachhang']; ?>" >
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary"  name="submit">Lưu</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

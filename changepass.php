<?php 
include_once "config.php";
	if(isset($_POST['btn_repass'])){
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$passr= md5($pass);
		$user = $_SESSION['id_kh'];
		
		$re_pass =$_POST['repassword'];
		$sql ="SELECT password FROM  tbl_taikhoan WHERE password = '$passr' AND id_kh= $user";
		$q1= mysqli_query($conn,$sql);
		$r1=mysqli_fetch_assoc($q1);
		$pass_db=$r1['password'];
		$count=mysqli_num_rows($q1);
		
		if($count!=1){$password_err="Mật khẩu không chính xác";
			if($re_pass=="") $repassword_err ="Mật khẩu không được để trống";
		}
		else {
			if($re_pass=="") $repassword_err ="Mật khẩu không được để trống";
			else{
			$re_pass =md5($re_pass);	
			$update = "UPDATE tbl_taikhoan SET password = '$re_pass' WHERE id_kh = $user ";
			$query = mysqli_query($conn,$update);
			if($query) {
				$_SESSION['noty_repass'] =1;
				header("Location: index.php");
			}
			}
		}
	}
?>

<div class="container-fluid" style="background-image: url('admin/images/anhnen/b2.jpg'); min-height: 560px">
	<div class="col-md-4 col-md-push-4" style="margin-top: 60px;">
	<form action="" method="POST" role="form">
	<legend>Đổi mật khẩu</legend>

	
	<div class="form-group">
		<label for="">Mật khẩu hiện tại</label><span class="err"><?php if(isset($password_err)) echo $password_err; ?></span>
		<input type="password" class="form-control"
		 value="<?php if(isset($password)) echo $password; ?>" 
		  name="password"  placeholder="Nhập mật khẩu của bạn">
	</div>
	<div class="form-group">
		<label for="">Mật khẩu mới</label><span class="err"><?php if(isset($repassword_err)) echo $repassword_err; ?></span>
		<input type="password" class="form-control" 
		value="<?php if(isset($repassword)) echo $repassword; ?>" 
		 name="repassword"  placeholder="Nhập mật khẩu mới">
	</div>

	<button type="submit" class="btn btn-danger" style="margin-left: 5px;" name="btn_repass">Lưu thay đổi</button>
	
	</form>
			
	</div>
	</div>
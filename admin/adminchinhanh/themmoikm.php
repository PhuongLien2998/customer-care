<?php  
	include_once "config/myConfig.php";

	if (isset($_POST['submit'])) {
		$des = $_POST['des_content'];
		$sd= $_POST['startdate'];
		$ed= $_POST['endate'];
		if($des==""){
				$co_km_err="Cần nhập đủ nội dung khuyến mãi";
				if($sd>$ed){
					$sd_err="Ngày bắt đầu không hợp lí";
					$ed_err="Ngày kết thúc không hợp lí";
				}
		}
		else if($sd>$ed){
			$sd_err="Ngày bắt đầu không hợp lí";
			$ed_err="Ngày kết thúc không hợp lí";
		}
		else{
			$co_km_err="";
			$sd_err="";
			$ed_er="";
		$sql = "INSERT INTO tbl_khuyenmai(noidung,startdate,endate) VALUES('$des','$sd','$ed')";
		 $query = mysqli_query($conn, $sql);
		 if($query!==false){ 
		 	echo "<script> alert('Bạn đã thêm thành công!'); </script>";
		 	$des="";
		 	$sd="";
		 	$ed="";
		 }
		 }
	}
?>

		<div class="container">
			<div class="col-md-12">
				<form action="" method="POST" role="form">
					<legend>Thêm mới khuyến mãi</legend>

					<div class="form-group">
						<label for="">Nội dung</label>
						<span style="color: red;"><?php if(isset($co_km_err)) echo $co_km_err; ?></span>
						<textarea class="form-control" name="des_content" id="description" cols="30" rows="10" required ><?php if(isset($des)) echo $des; ?></textarea>
						<script>
							CKEDITOR.replace('description');//id
						</script>
					</div>
					<div class="form-group">
						<label for="">Ngày bắt đầu</label>
					
						<input type="date" name="startdate" required value="<?php if(isset($sd)) echo $sd; ?>">
						<span  style="color: red;"><?php if(isset($sd_err)) echo $sd_err; ?></span>
					</div>
					<div class="form-group">
						<label for="">Ngày kết thúc</label>
					
						<input type="date" name="endate" required value="<?php if(isset($ed)) echo $ed; ?>">
						<span  style="color: red;"><?php if(isset($ed_err)) echo $ed_err; ?></span>
					</div>
					
				
					<button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
					<!-- <a href="#" class="btn btn-info">Về trang chủ</a> -->
				</form>
			</div>

		</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		

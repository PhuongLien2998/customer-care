<?php  
include_once "config/myConfig.php";

	
		
	if(isset($_GET['id_km'])){
		$id_km =$_GET['id_km'];
	 $sql= "SELECT * FROM tbl_khuyenmai WHERE id_khuyenmai=$id_km ";
	 $q= mysqli_query($conn,$sql);

	 $r= mysqli_fetch_assoc($q);
	 if(isset($_POST['btn_e'])){
		$des = $_POST['content_e'];
		$sd= $_POST['startdate_e'];
		$ed= $_POST['endate_e'];
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
		$sql1 = "UPDATE tbl_khuyenmai SET noidung='$des',startdate='$sd',endate='$ed'
		WHERE id_khuyenmai= $id_km";
			 $q1 = mysqli_query($conn, $sql1);
		 $query = mysqli_query($conn, $sql);
		 if($query!==false){ 
		 	$des="";
		 	$sd="";
		 	$ed="";
		  echo "<script>location.href='list_km.php';</script>";
		 	
		 }
		 }
	}
}

else {
	echo "Khuyen mai ko ton tai";
}
	 


?>

		<div class="container">
			<div class="col-md-12">
				<form action="" method="POST" role="form">
					<legend>Thay đổi thông tin khuyến mãi</legend>
				
					<div class="form-group">
						<label for="">Nội dung khuyến mãi</label>
						<span style="color: red;"><?php if(isset($co_km_err)) echo $co_km_err; ?></span>
						<textarea name="content_e" id="content_e" cols="30" rows="10">
							<?php echo $r['noidung'];  ?>
						</textarea>
					</div>
					<script>
						CKEDITOR.replace('content_e');
					</script>
				<?php 
					if($id_km!=1){
				?>
					<div class="form-group">
						<label for="">Ngày bắt đầu</label>
						<input type="date" name="startdate_e" value="<?php echo $r['startdate'];  ?>">
						<span style="color: red;"><?php if(isset($sd_err)) echo $sd_err; ?></span>
					</div>
					<div class="form-group">
						<label for="">Ngày kết thúc</label>
						<input type="date" name="endate_e" value="<?php echo $r['endate'];  ?>" >
						<span  style="color: red;"><?php if(isset($ed_err)) echo $ed_err; ?></span>
					</div>
					<?php }?>
				<button type="submit" name="btn_e" class="btn btn-primary">Lưu thay đổi</button>
				<a href="list_km.php" name="btn_re" class="btn btn-info">Quay lại</a>
				</form>
			</div>

		</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 
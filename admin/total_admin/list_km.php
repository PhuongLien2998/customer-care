<?php  
	include_once "config/myConfig.php";
	
	 $sql= "SELECT * FROM tbl_khuyenmai  ";
	 $q= mysqli_query($conn,$sql);

	 
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xem khuyến mãi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/logo/icon.png">
  <!--   <link rel="stylesheet" href="css/myCSS.css"> -->
</head>
<body>
	<?php
			if(isset($_SESSION['noty_del_km'])&&$_SESSION['noty_del_km']==1){
		?>
			<div class="alert alert-success view_noti">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Bạn đã xóa khuyến mãi thành công</strong> 
		</div>
		<?php
			unset($_SESSION['noty_del_km']);
			}
		 ?>
		<div class="container">
			<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-hover">

								
								<?php 
									$dem=0;
									while($r=mysqli_fetch_assoc($q)){
									$dem++;
								?>
								<tr>
									<td><?php echo "#".$dem; ?></td>
									<td style="
										overflow: hidden;
									   text-overflow: ellipsis;
									   display: -webkit-box;
									   -webkit-line-clamp: 1;
									   -webkit-box-orient: vertical;
									   ">

										<?php echo $r['noidung']; ?>
										
									</td>
									<td><?php echo $r['startdate']; ?></td>
									<td><?php echo $r['endate']; ?></td>
									<td><a class="btn btn-primary" href="index.php?page=edit_km&id_km=<?php echo $r['id_khuyenmai']; ?>">Sửa</a></td>
									<?php if($r['id_khuyenmai']!=1) {?>
									<td><a class="btn btn-danger" onclick="return confirm('Bạn có thực sự muốn xóa khuyến mãi này không?');" href="index.php?page=del_km&id_km=<?php echo $r['id_khuyenmai']; ?>">Xóa</a></td>
								<?php } ?>
								</tr>
								<?php 
									}
								 ?>
								 
							</table>
						</div>
				
			</div>

		</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>
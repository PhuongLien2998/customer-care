<?php
	$sql1= "SELECT * FROM tbl_khuyenmai";
	$q1= mysqli_query($conn,$sql1);
	$sql2 = "SELECT CURDATE() AS time_now";
	$q2= mysqli_query($conn,$sql2);
	$r2= mysqli_fetch_assoc($q2);
	$now=$r2['time_now'];
	$ngaysinhkh= $_SESSION['ngaysinhkh'];
	$arr1 = explode("-",$now);
	
	$arr2 = explode("-",$ngaysinhkh);
	
 ?>
<div class="col-md-12">
			<?php 
			if($arr1[1]==$arr2[1]){
				$r1=mysqli_fetch_assoc($q1);
				?>
				<h3><span class="fa fa-star" style="color: gold;margin-right: 5px;">
				</span>Ưu đãi đặc biệt dành cho bạn </h3>
				<div class="table-responsive">
				<table class="table table-hover">
				<tr style="background:rgba(108,219,227,0.5);">
					<td><?php echo $r1['noidung'] ; ?></td>
					</tr>

				<?php 
				while($r1=mysqli_fetch_assoc($q1)){
					if($now>=$r1['startdate']&&$now<=$r1['endate']){
						
					?>
					<tr style="background:rgba(237,131,10,0.5);">
					<td><?php echo $r1['noidung'] ; ?></td>
					</tr>
					<?php
					}
						}
					?>	
				

				</table>
				</div>
				<?php
				}
				else {
			 ?>
			<h3><span class="fa fa-star" style="color: gold;margin-right: 5px;"></span>Khuyến mãi dành cho bạn</h3>
			<div class="table-responsive">
				<table class="table table-hover">
			<?php 
				$dem=0;
				while($r1=mysqli_fetch_assoc($q1)){
					if($now>=$r1['startdate']&&$now<=$r1['endate']){
						$dem++;
					?>
					<tr style="background:rgba(237,131,10,0.5);">
					<td><?php echo $r1['noidung'] ; ?></td>
					</tr>
					<?php
					}
				}
				if($dem==0){
					?>
					<div class="alert alert-info text-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong >Hiện tại chưa có khuyến mãi nào </strong> <a href="http://ptitsoft.likesyou.org">Tới trang mua sắm để săn đón các sản phẩm hot!</a>
				</div>
					<?php
				}

			 ?>
			
		</table>
	</div>

	<?php } ?>
		

			

	
</div>
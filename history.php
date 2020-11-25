<?php 
	include_once "config.php";
	$id_kh= $_SESSION['id_kh'];
	$sql1= "SELECT * FROM tbl_hoadon WHERE tbl_hoadon.id_khachhang= $id_kh ORDER BY tbl_hoadon.thoigianthanhtoan DESC";
	$sql3 = "SELECT CURDATE() AS time_now, tbl_khachhang.ngaysinh,tbl_khachhang.diemtichluy FROM tbl_khachhang WHERE id_khachhang= $id_kh ";
	$r3=mysqli_fetch_assoc(mysqli_query($conn,$sql3));
	$arr1 = explode("-",$r3['time_now']);
	$arr2 = explode("-",$r3['ngaysinh']);
	
	$kmsn=0;
	$kmtl=0;
	if($arr1[1]==$arr2[1]){ //&&$arr1[2]==$arr2[2]
		$kmsn=0.4;
	}
	$dtl= $r3['diemtichluy'];
	if($dtl>=50&&$dtl<=200){
		$kmtl=0.05;
	}
	if($dtl>200){
		$kmtl=0.1;
	}
	
	$q1=mysqli_query($conn,$sql1);
	$soluong_hd=mysqli_num_rows($q1);
	// echo $soluong_hd;
	// die();
	if($soluong_hd>0){
	$thutu_hd=0;
	while($r1= mysqli_fetch_assoc($q1)){
		 $idhd=$r1['id_hoadon'];
		 $q_check_rate = mysqli_query($conn,"SELECT tbl_danhgia.xephang FROM tbl_danhgia WHERE tbl_danhgia.id_hoadon = $idhd");
		 $r_check_rate = mysqli_fetch_assoc($q_check_rate);
		 // echo "<pre>";
		 // print_r($r_check_rate);
		 // echo "</pre>";
		 // die();
		 // echo gettype($r_check_rate['xephang']);
		 // die();
		 $check_rate= (int)$r_check_rate['xephang'];

		 $thutu_hd++;
		 ?>
		<div class="col-md-12" style="margin-top:20px;">
		<div>
		<b>Mã hóa đơn : </b><span class="cyan">#<?php echo $r1['id_hoadon']; ?></span></br>
		<b>Mua hàng vào : </b><span class="cyan"><?php echo $r1['thoigianthanhtoan']; ?></span>
		<hr style="border: 1px solid #000;">
		 <?php
		
		$sql2= "SELECT tbl_hoadonchitiet.soluong,tbl_dienthoai.ten_dienthoai,tbl_dienthoai.hinhanh,
	tbl_dienthoai.gia_dienthoai,tbl_dienthoai.mota,tbl_hoadonchitiet.id_hdct
	 FROM tbl_hoadonchitiet,tbl_dienthoai  WHERE tbl_hoadonchitiet.id_hoadon= $idhd
	 AND tbl_dienthoai.id_dienthoai=tbl_hoadonchitiet.id_dienthoai";
	 $q2=mysqli_query($conn,$sql2);
	 $dem=0;
	 $ar_hdct= array();
	 while($r2= mysqli_fetch_assoc($q2)){
		$dem++;
		$idhdct=$r2['id_hdct'];
		$ar_hdct[$idhdct]=array(
			'soluong'=>$r2['soluong'],
			'ten_dienthoai'=>$r2['ten_dienthoai'],
			'hinhanh'=>$r2['hinhanh'],
			'gia_dienthoai'=>$r2['gia_dienthoai'],
			'mota'=>$r2['mota']
		);
	?>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<td>#<?php echo $dem; ?></td>
					<td><img src="admin/images/sanpham/<?php echo $r2['hinhanh'];  ?>" style="width: 50px;" alt=""></td>
					<td><span><b><?php echo $r2['ten_dienthoai']; ?></b></span></td>
					<td><span>Số lượng: <b><?php echo $r2['soluong'];?></b></span></td>
					<td><span>Tổng tiền :<b> <?php $total_money= $r2['soluong']*$r2['gia_dienthoai'];
					 echo number_format($total_money) ?></b> </span></td>
					<td><span>Tiền giảm:<b> <?php 
					if($thutu_hd==$soluong_hd) $re_money=0;
					else if($kmsn>0) $re_money=$kmsn*$total_money;
					else if($kmtl>0) $re_money=$kmtl*$total_money;
					 echo number_format($re_money) ?></b> </span></td>
					<td><span>Đã thanh toán:<b> <?php echo number_format($total_money-$re_money) ?></b> </span></td>
					<?php if($check_rate!=0){ ?>
					<td><a type="button" href="rating.php?id_hd=<?php echo $idhd; ?>" class="btn btn-primary">Xem đánh giá nhân viên</a></td>
				<?php }else{
					?>
						<td><a type="button" href="rating.php?id_hd=<?php echo $idhd; ?>" class="btn btn-danger">Đánh giá nhân viên</a></td>
					<?php
				} ?>
				</tr>
			</table>
		</div>
		<hr style="border: 1px solid #000;">
	
	<?php
	 }
	
	$_SESSION['hoadon'][$idhd]=$ar_hdct;
	
	?>
	</div>
</div>
<?php
	}
}
else {
	?>
		<div class="alert alert-info text-center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong >Bạn chưa có sản phẩm nào đã mua</strong> <a href="http://ptitsoft.likesyou.org">Tới trang mua sắm</a>
		</div>
	<?php 
}
?>

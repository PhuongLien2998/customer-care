<?php 
   $arr=array();
   for($i=1;$i<=2;$i++){
    $r=mysqli_fetch_assoc($q1);
    $arr[$i]= array(
        'id_nhanvien'=>$r['id_nhanvien'],
        'ten_nhanvien'=>$r['ten_nhanvien'],
        'anh_nhanvien'=>$r['anh_nhanvien'],
        'gioitinh'=>$r['gioitinh'],
        'sdt_nhanvien'=>$r['sdt_nhanvien'],
        'diachi_nhanvien'=>$r['diachi_nhanvien'],
        'tuoi_nhanvien'=>$r['tuoi_nhanvien'],
        'email_nhanvien'=>$r['email_nhanvien']
    );
   }
	$id_kh =$_SESSION['id_kh'];
	   $id_nv1= $arr[1]['id_nhanvien'];
	   $id_nv2= $arr[2]['id_nhanvien'];
	$sql_r="SELECT * FROM tbl_danhgia WHERE (id_hoadon= $id_hd AND id_khachhang = 
    $id_kh AND id_nhanvien= $id_nv1 ) OR  (id_hoadon= $id_hd AND id_khachhang = 
	$id_kh AND id_nhanvien= $id_nv2 ) ORDER BY id_nhanvien";
	$q_r = mysqli_query($conn,$sql_r);
	$c_r = mysqli_num_rows($q_r);
	$info_rate =array();
	if($c_r==2){
		for($j=1;$j<=2;$j++){
	$r_r= mysqli_fetch_assoc($q_r);
		$info_rate[$j]= array(
			'id_nv' =>$r_r['id_nhanvien'],
			'noidung'=>$r_r['noidung'],
			'xephang' => $r_r['xephang']
		);
	}
	}
	
?>

<!--Start nhân viên -->
<div class="col-md-12">
	<div class="col-md-12" style="margin-bottom:5px;">
		<h3>Đánh giá nhân viên</h3>
		
	</div>
	
	<div class="col-md-12 ">
    <form action="" method="POST" role="form">
		<div class="table-responsive">
			<table class="table table-hover">
                    <tr>
                    <td><b></b></td>
					<td><img src="admin/images/anhnv/<?php echo $arr[1]['anh_nhanvien']; ?>" alt="" width="100";></td>
					<td><img src="admin/images/anhnv/<?php echo $arr[2]['anh_nhanvien']; ?>" alt="" width="100";></td>
                    </tr>
					<tr>
						<td><b>Tên nhân viên</b></td>
						<td><?php echo $arr[1]['ten_nhanvien']; ?></td>
						<td><?php echo $arr[2]['ten_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Số điện thoại</b></td>
						<td><?php echo $arr[1]['sdt_nhanvien']; ?></td>
						<td><?php echo $arr[2]['sdt_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Tuổi</b></td>
						<td><?php echo $arr[1]['tuoi_nhanvien']; ?></td>
						<td><?php echo $arr[2]['tuoi_nhanvien']; ?></td>
					</tr>
                    <tr>
						<td><b>Địa chỉ</b></td>
						<td><?php echo $arr[1]['diachi_nhanvien']; ?></td>
						<td><?php echo $arr[2]['diachi_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td><?php echo $arr[1]['email_nhanvien']; ?></td>
						<td><?php echo $arr[2]['email_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Giới tính</b></td>
						<td><?php if($arr[1]['gioitinh']==0) echo "Nữ"; else echo "Nam"; ?></td>
						<td><?php if($arr[2]['gioitinh']==0) echo "Nữ"; else echo "Nam";  ?></td>
					</tr>
		<?php if($c_r==2){ ?>
                    <tr>
						<td><b>Nội dung bạn đã đánh giá</b></td>
						<td><p><?php echo $info_rate[1]['noidung']; ?></p></td>
						<td><p><?php echo $info_rate[2]['noidung']; ?></p></td>
					</tr>
                    <tr>
						<td><b>Xếp hạng nhân viên của bạn</b></td>
                        <td><?php for($i=1;$i<= $info_rate[1]['xephang'];$i++){?>
			<span><i class= "fa fa-star" style="color: gold; font-size:20px;"></i></span>
            <?php }  echo "(".$info_rate[1]['xephang']."/5)"; ?></td>
                        <td><?php for($i=1;$i<= $info_rate[2]['xephang'];$i++){?>
			<span><i class= "fa fa-star" style="color: gold; font-size:20px;"></i></span>
			<?php }  echo "(".$info_rate[2]['xephang']."/5)"; ?>
			</td>
			</tr>
			</table>
			<?php }else {
					if(isset($_POST['btn_rate_cs_bh'])){
						$con_rate1 =$_POST['rate1'];
						$con_rate2 =$_POST['rate2'];
						if(isset($_POST['rating'])){
					   $value_rate1= $_POST['rating'];
							if(isset($_POST['rating1'])){
								$value_rate2= $_POST['rating1'];
								$post_rate = "INSERT INTO tbl_danhgia(id_hoadon,id_khachhang,id_nhanvien,noidung,xephang)
								VALUES ($id_hd,$id_kh,$id_nv1,'$con_rate1',$value_rate1),
								($id_hd,$id_kh,$id_nv2,'$con_rate2',$value_rate2)";
								$q_rate= mysqli_query($conn,$post_rate);
								if($q_rate!==false){
									$_SESSION['noti_rate']=1;
									header("Location: index.php");
								}
							}
							else {
								echo ' <script>alert("Vui lòng xếp hạng nhân viên còn lại để hoàn tất đánh giá,xin cám ơn");</script>';
							}
						
					}
					else {
						echo ' <script>alert("Vui lòng xếp hạng cả 2 nhân viên để hoàn tất đánh giá,xin cám ơn");</script>';
					}
					   
					}
				?>		
			<tr>
						<td><b>Nội dung đánh giá</b></td>
						<td><textarea name="rate1" cols="50" rows="4"><?php if(isset($con_rate1)) echo $con_rate1; ?></textarea></td>
                        <td><textarea name="rate2" cols="50" rows="4"><?php if(isset($con_rate2)) echo $con_rate2; ?></textarea></td>
					</tr>
                    <tr>
						<td><b>Xếp hạng</b></td>
                        <td><div class="rating">
	    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rất tốt!">5 stars</label>
	    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Khá tốt">4 stars</label>
	    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Bình thường">3 stars</label>
	    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Khá tệ">2 stars</label>
	    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Tệ">1 star</label>
		</div></td>
                        <td><div class="rating">
	    <input type="radio" id="star51" name="rating1" value="5" /><label for="star51" title="Rất tốt!">5 stars</label>
	    <input type="radio" id="star41" name="rating1" value="4" /><label for="star41" title="Khá tốt">4 stars</label>
	    <input type="radio" id="star31" name="rating1" value="3" /><label for="star31" title="Bình thường">3 stars</label>
	    <input type="radio" id="star21" name="rating1" value="2" /><label for="star21" title="Khá tệ">2 stars</label>
	    <input type="radio" id="star11" name="rating1" value="1" /><label for="star11" title="Tệ">1 star</label>
		</div></td>
					</tr>
					</table>
		</div>
        <button type="submit" name="btn_rate_cs_bh" class="btn btn-primary">Gửi đánh giá</button>
        <span style="color: blue;"> (Rất mong nhận được đánh giá của quý khách, xin cám ơn!)</span>
	</form>
		<?php } ?>	
			
	</div>
</div>

</div>

</div>

</div>
<!--End nhân viên -->


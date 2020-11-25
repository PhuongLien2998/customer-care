<?php 
    $r1=mysqli_fetch_assoc($q1);

    $id_kh =$_SESSION['id_kh'];
    $id_nv=$r1['id_nhanviencs'];
    $rate = "SELECT * FROM tbl_danhgia WHERE id_hoadon= $id_hd AND id_khachhang = 
    $id_kh AND id_nhanvien= $id_nv ";
    $q2 =mysqli_query($conn,$rate);
    $count_rate= mysqli_num_rows($q2);

    $r2= mysqli_fetch_assoc($q2);
    
?>

<!--Start nhân viên -->
<div class="col-md-12">
	<div class="col-md-12" style="margin-bottom:5px;">
		<h3>Thông tin nhân viên chăm sóc</h3>
		<img src="admin/images/anhnv/<?php echo $r1['anh_nhanvien']; ?>" width="50px" alt="">
	</div>
	
	<div class="col-md-6 col-sm-12 col-xs-12">
		
		<div class="table-responsive">
			<table class="table table-hover">
				
					<tr>
						<td><b>Tên nhân viên</b></td><td><?php echo $r1['ten_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Số điện thoại</b></td><td><?php echo $r1['sdt_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Tuổi</b></td><td><?php echo $r1['tuoi_nhanvien']; ?></td>
					</tr>
					
			</table>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-hover">
				
					
					<tr>
						<td><b>Địa chỉ</b></td><td><?php echo $r1['diachi_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td><td><?php echo $r1['email_nhanvien']; ?></td>
					</tr>
					<tr>
						<td><b>Giới tính</b></td><td><?php  if($r1['gioitinh']==0) echo "Nữ"; else echo "Nam"; ?></td>
					</tr>
					
				
			</table>
		</div>
	</div>
	
	


<div class="col-md-12">
<?php if($count_rate==1){
    ?>
    <div class="form-group">
			<label for="">Nội dung bạn đã nhận xét: </label></br>
            <p disabled style=" width:50%; font-style:italic; color: violet;"><?php if($count_rate==1) echo $r2['noidung'];
             ?></p>
		</div>

        <div class="form-group">
			<label for="">Xếp hạng nhân viên của bạn(<?php echo $r2['xephang']."/5"; ?>):  </label>
            <?php for($i=1;$i<=$r2['xephang'];$i++){?>
			<span><i class= "fa fa-star" style="color: gold; font-size:20px;"></i></span>
            <?php } echo "</br>"; ?>
		</div>
		<div style="clear: both;"></div>
		<!-- </br><span style="color :blue;font-size: 20px;">Rất cám ơn ý kiến đóng góp của bạn</span> -->
    <?php
}

else {
    if(isset($_POST['btn_rate_cs'])){
        $con_rate =$_POST['rate'];
        if(isset($_POST['rating'])){
       $value_rate= $_POST['rating'];
        $post_rate = "INSERT INTO tbl_danhgia(id_hoadon,id_khachhang,id_nhanvien,noidung,xephang)
        VALUES ($id_hd,$id_kh,$id_nv,'$con_rate',$value_rate)";
        $q_rate= mysqli_query($conn,$post_rate);
        if($q_rate!==false){
            $_SESSION['noti_rate']=1;
            header("Location: index.php");
        }
    }
    else {
        echo ' <script>alert("Bạn cần xếp hạng nhân viên để gởi đánh giá");</script>';
    }
       
    }
 ?>
    <div class="col-md-12">
       
        <h3>Đánh giá nhân viên</h3>
    </div>
	<form action="" method="POST" role="form">
    <div class="form-group">
			<label for="">Xếp hạng nhân viên</label></br>
			
		<div class="rating">
	    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rất tốt!">5 stars</label>
	    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Khá tốt">4 stars</label>
	    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Bình thường">3 stars</label>
	    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Khá tệ">2 stars</label>
	    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Tệ">1 star</label>
		</div>
		</div>
		<div style="clear: both;"></div>
		</br>
		<div class="form-group">
			<label for="">Nội dung nhận xét: </label></br>
            <textarea name="rate" id="rate" cols="100" rows="4">
            <?php if(isset($con_rate)) echo $con_rate; ?></textarea>
		</div>
		<!-- <script>
			CKEDITOR.replace('rate');
		</script> -->
	
		
		
		<button type="submit" name="btn_rate_cs" class="btn btn-primary">Gửi đánh giá</button>
        <span style="color: blue;"> (Rất mong nhận được đánh giá của quý khách, xin cám ơn!)</span>
	</form></br>
    <?php } ?>
</div>

</div>

</div>

</div>
<!--End nhân viên -->


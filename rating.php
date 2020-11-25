<?php 
 session_start();
 include_once "config.php";
 if(isset($_GET['id_hd'])){
	 $id_hd=$_GET['id_hd'];
	//  tbl_nhanvien.id_nhanvien,
	 $sql1= "SELECT tbl_nhanvien.id_nhanvien,id_nhanviencs,id_nhanvienbh,tbl_nhanvien.ten_nhanvien, tbl_nhanvien.anh_nhanvien,
	 tbl_nhanvien.gioitinh,tbl_nhanvien.sdt_nhanvien, tbl_nhanvien.diachi_nhanvien,
	 (YEAR(CURDATE())-YEAR(tbl_nhanvien.ngaysinh)) AS tuoi_nhanvien,
	  tbl_nhanvien.email_nhanvien FROM tbl_nhanvien,tbl_hoadon WHERE 
	  (tbl_nhanvien.id_nhanvien = tbl_hoadon.id_nhanviencs  AND tbl_hoadon.id_hoadon= $id_hd) 
	 OR (tbl_nhanvien.id_nhanvien = tbl_hoadon.id_nhanvienbh  AND tbl_hoadon.id_hoadon= $id_hd)
	 ORDER BY id_nhanvien";
	$q1= mysqli_query($conn,$sql1);
	$soluongnv=mysqli_num_rows($q1);

 }

  ?>

  
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang chủ</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/myCSS.css">
		<style type="text/css">
			.cyan{
				color: cyan;
			}
		
			.rating {
				    float:left;
				}

				.rating:not(:checked) > input {
				    position:absolute;
				    top:-9999px;
				    clip:rect(0,0,0,0);
				}

				.rating:not(:checked) > label {
				    float:right;
				    width:1em;
				    padding:0 .1em;
				    overflow:hidden;
				    white-space:nowrap;
				    cursor:pointer;
				    font-size:200%;
				    line-height:1.2;
				    color:#ddd;
				    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
				}

				.rating:not(:checked) > label:before {
				    content: '★ ';
				}

				.rating > input:checked ~ label {
				    color: #f70;
				    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
				}

				.rating:not(:checked) > label:hover,
				.rating:not(:checked) > label:hover ~ label {
				    color: gold;
				    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
				}

				.rating > input:checked + label:hover,
				.rating > input:checked + label:hover ~ label,
				.rating > input:checked ~ label:hover,
				.rating > input:checked ~ label:hover ~ label,
				.rating > label:hover ~ input:checked ~ label {
				    color: #ea0;
				    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
				}

				.rating > label:active {
				    position:relative;
				    top:2px;
				    left:2px;
				}


		</style>
		<!-- <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script> -->
		
	</head>

			<!--Start of Message Dialog Script-->
		<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5d9cbc186c1dde20ed059e40/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		</script>
		<!--End of  Message Dialog Script-->


	<body>	
		<div class="container">
		<div class="row">
		
<?php
 	if($soluongnv==1)
		include_once "info_nvcs.php";
	 
	if($soluongnv==2) 
		include_once "info_nvcs_bh.php";
	?>
	<!-- Start sản phẩm -->
	<div class="col-md-12" style="margin-top:20px;">
	<div>
	<h3>Các sản phẩm đã được tư vấn</h3>
	
		<hr style="border: 1px solid #000;">
		<div class="table-responsive">
			<table class="table table-hover">
			<?php 
			$dem=0;
			foreach($_SESSION['hoadon'][$id_hd] as $key => $value){
				$dem++;
				?> 
				<tr>
					<td>#<?php echo $dem; ?></td>
					<td><img src="admin/images/sanpham/<?php echo $value['hinhanh'] ;?>" style="width: 50px;" alt=""></td>
					<td><span><b><a href="#"><?php echo $value['ten_dienthoai'] ;?></a></b></span></td>
					<td><span>Số lượng: <b><?php echo $value['soluong'] ;?></b></span></td>
					<td><span><b>Một số điểm nổi bật:</b><?php echo $value['mota'] ;?> </span></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<hr style="border: 1px solid #000;">
	</div>
</div>
	<!-- End sản phẩm -->
	
<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src= "js/myJs.js"></script>
 		
	</body>
</html>
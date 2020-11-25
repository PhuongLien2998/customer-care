<?php 
 session_start(); 
 if(isset($_SESSION['name'])==false||$_SESSION['name']==""){
	header("Location:login.php");
 }
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang chủ</title>
		<link rel="shortcut icon" href="admin/images/logo/icon.png">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/myCSS.css">
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

		<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=482473955896871&autoLogAppEvents=1"></script>
		

		<div class="header">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><img src="admin/images/logo/LG1.png" alt="" style="width: 150px; height:100px;margin-top: -29px;margin-left: -20px;"></a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						
						<ul class="nav navbar-nav navbar-right">
							 <li><a href="#" style="height:50px; font-size: 20px;color:#0179EA;">
							 	Xin chào
							 </a></li> 
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="home.php?map=infor_kh">Thông tin cá nhân</a></li>
									<li><a href="index.php?page=changepass">Đổi mật khẩu</a></li>
									<!-- <li><a href="home.php?map=history">Lịch sử mua hàng</a></li> -->
									<li><a href="home.php?map=logout">Đăng xuất</a></li>
									
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->

				</div>
			</nav>
		</div>
		<?php
			if(isset($_SESSION['noty_repass'])&&$_SESSION['noty_repass']==1){
		?>
			<div class="alert alert-success view_noti">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Bạn đã thay đổi mật khẩu thành công</strong> 
		</div>
		<?php
			unset($_SESSION['noty_repass']);
			}
		 ?>

<?php
			if(isset($_SESSION['noti_rate'])&&$_SESSION['noti_rate']==1){
		?>
			<div class="alert alert-success view_noti">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Rất cám ơn ý kiến đánh giá của quý khách</strong> 
		</div>
		<?php
			unset($_SESSION['noti_rate']);
			}
		 ?>
		<!-- <button id="demo">check</button> -->
	<?php 
		if(isset($_GET['page'])){
			$page= $_GET['page'];
		}
		else $page= "main";

		switch($page){
		
		case 'main':
			include_once "main.php";
			include_once "footer.php";
			break;
		
		 case 'changepass':
		 	include_once "changepass.php";
		 	// include_once "footer.php";
			break;
		
		default :
			echo "<h3 style='color: red;' class='text-center'>Error 404 Trang không tồn tại <a href='home.php?map=infor_kh'>Quay lại</a></h3>";
	}	
	 ?>
<!-- <a href="javascript:history.back()">Quay lại</a> -->
	
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src= "js/myJs.js"></script>
 		
	</body>
</html>
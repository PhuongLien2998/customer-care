<?php 
 session_start();
 include_once "config.php";
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
				    content: '\f005 ';
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
		<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
		<!-- <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> -->
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
	<ul class="nav nav-tabs" role="tablist">
	  <li class="active"><a href="index.php"><img src="admin/images/logo/LG.png" 
	  alt="" style="width:25px; height: 25px;"></a></li>
	  <li>
		<a href="home.php?map=infor_kh">Thông tin tài khoản</a>
	</li>

	
	<li>
		<a href="home.php?map=history">Lịch sử đơn hàng</a>
	</li>
	<li>
		<a href="home.php?map=sale">Xem khuyến mãi</a>
	</li>
	<li>
		<a href="http://ptitsoft.likesyou.org">Đến trang mua sắm</a>
	</li>
	<li>
		<a href="home.php?map=logout">Đăng xuất</a>
	</li>
	</ul>
</div>

<div class="row">
	<?php 
	if(isset($_GET['map'])){
		$map= $_GET['map'];
	}else {
		$map='infor_kh';
		}
	switch($map){
		
		case 'infor_kh':
			include_once "infor_kh.php";
			break;
		
		case 'changepass':
			include_once "changepass.php";
			break;
		case 'history':
			include_once "history.php";
			break;
		case 'sale':
			include_once "sale.php";
			break;
		case 'shopping':
			include_once "shopping.php";
			break;
		case 'logout':
			include_once "logout.php";
			break;
		default :
			echo "<h3 style='color: red;' class='text-center'>Error 404 Trang không tồn tại <a href='home.php?map=infor_kh'>Quay lại</a></h3>";
	}	
	?>


</div>

</div>

<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src= "js/myJs.js"></script>
 		
	</body>
</html>
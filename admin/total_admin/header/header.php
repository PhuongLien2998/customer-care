<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="shortcut icon" href="../images/logo/icon.png">
  <link rel="stylesheet" href="css/cuc.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <!-- Latest compiled and minified CSS-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/myAjax.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="ckd/ckeditor.js"></script>
  <script src="ckf/ckfinder.js"></script>
</head>
<body>
  <div class="wrapper container-fluid">
    <div class="header container-fluid">
      <nav class="navbar navbar-expand-lg nav-background navbar-light color">
        <a class="navbar-brand logo" href="#"><img src="../images/logo/LG.png"  style="height: 56px; margin-left:15px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ul-header">
            <li class="nav-item dropdown menu-header ">
              <a class="nav-link dropdown-toggle main-text text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Nhân viên 
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?page=list_staff">Danh sách nhân viên </a>
              <a class="dropdown-item" href="index.php?page=list_staffblock"> Nhân viên đã khóa </a>
              <a class="dropdown-item" href="index.php?page=xemlichsuchamsoc">Xem lịch sử chăm sóc</a>
            </div>
          </li>
          <li class="nav-item dropdown menu-header">
            <a class="nav-link dropdown-toggle main-text text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Khách hàng 
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
              <a class="dropdown-item" href="index.php?page=list_co">Danh sách khách hàng </a>
              
              <a class="dropdown-item" href="index.php?page=tientrinhkhachhang">Tiến trình chăm sóc</a>
            </div>
          </li>
          <li class="nav-item dropdown menu-header">
            <a class="nav-link dropdown-toggle main-text text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Thống kê
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
              <a class="dropdown-item" href="index.php?page=thongketheokhachhang">Khách hàng </a>
              
              <a class="dropdown-item" href="index.php?page=chonchinhanh">Nhân viên </a>
            </div>
          </li>
          <li class="nav-item dropdown menu-header">
            <a class="nav-link dropdown-toggle main-text text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Quản lý khuyến mãi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
              <a class="dropdown-item" href="index.php?page=themkhuyenmai">Thêm khuyến mãi </a>
              
              <a class="dropdown-item" href="index.php?page=danhsachkhuyenmai">Các khuyến mãi </a>
            </div>
          </li>
          
          <li class="nav-item active menu-header">
            <a class="nav-link main-text text" href="index.php?page=xemlichsuchuyendoi">Xem lịch sử chuyển đổi <span class="sr-only">(current)</span></a>
          </li>
          
          <li class="nav-item dropdown menu-header">
            <a class="nav-link dropdown-toggle text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img style="width: 40px; height: 40px;border-radius: 50%; margin-right: 5px;" src="../images/anhnv/<?php if (isset($_SESSION['anh_ql'])) { echo $_SESSION['anh_ql']; } ?>" alt="<?php if (isset($_SESSION['anh_ql'])) { echo $_SESSION['anh_ql']; } ?>"><?php if (isset($_SESSION['ten_ql'])) { echo  $_SESSION['ten_ql']; } ?>
              
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?page=info_acount">Thông tin cá nhân </a>
              <a class="dropdown-item" href="index.php?page=logout">Đăng xuất</a>
            </div> 
          </li>
          
        </ul>
        
      </div>
    </nav> 
  </div>
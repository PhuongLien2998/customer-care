<?php
if (isset($_SESSION['noti'])) {
    ?>
    <div class="alert alert-success alert_noti">
        <strong>Thông báo: </strong> <?php echo $_SESSION['noti'] ; ?>
    </div>
    <?php
    unset($_SESSION['noti']);
}
?>
<div class="wrapper">
    <div class="">
        <nav class="navbar navbar-expand-lg nav-background navbar-light color">
            <a class="navbar-brand logo" href="index.php"><img src="../images/logo/LG.png"
                                                               style="height: 56px; margin-left:15px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ul-header">
                    <li class="nav-item dropdown menu-header ">
                        <a class="nav-link dropdown-toggle main-text text huy" href="#" id="navbarDropdown"
                           role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                            Quản lý khách hàng
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?page=list-customer">Khách hàng đang chăm
                                sóc </a>
                            <a class="dropdown-item" href="index.php?page=list-customer_purchase">Khách hàng đã
                                mua hàng</a>
                        </div>
                    </li>
                    <li class="nav-item active menu-header">
                        <a class="nav-link main-text" href="index.php?page=add-customer" style="color: white;">Thêm mới
                            khách
                            hàng<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active menu-header">
                        <a class="nav-link main-text" href="index.php?page=add_process" style="color: white;">Thêm tiến
                            trình<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active menu-header">
                        <a class="nav-link main-text" href="index.php?page=invoice" style="color: white;">Xuất bán<span
                                    class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active menu-header">
                        <a class="nav-link main-text load_info" href="#" style="color: white;">Thông báo<span
                                    class="btn btn-danger number_info">0</span></a>
                    </li>

                    <li class="nav-item menu-header">
                        <a class="nav-link dropdown-toggle text" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                            <img class="img-avt" src="../images/anhnv/<?php echo $_SESSION['anh_nv']; ?>"
                                 width="40" height="40" alt=""> <?php if (isset($_SESSION['ten_nv'])) {
                                echo $_SESSION['ten_nv'];
                            } ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?page=info_staff">Thông tin cá nhân </a>
                            <a class="dropdown-item" href="index.php?page=logout">Đăng xuất</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
<?php
session_start();
include_once "staff/config.php";
if (isset($_SESSION['ten_nv'])) {
    header("Location: staff/");
}else if ( isset($_SESSION['ql_tong'])){
    header('Location: total_admin/');
}else if (isset($_SESSION['ql_cn'])){
    header('Location: adminchinhanh/');
}


if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($pass);
    $sql = "SELECT  * FROM tbl_taikhoan WHERE username = '$username' 
		AND password = '$password' AND tbl_taikhoan.status	= 1 ";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);
    if ($username == "") {
        $username_err = "Tên đăng nhập không để trống";
        if ($pass == "") {
            $password_err = "Mật khẩu không để trống";
        }
    } else if ($pass == "") {
        $password_err = "Mật khẩu không để trống";
    } else if ($count == 0) {
        $err_login = "Thông tin đăng nhập không đúng";
    } else {
        if ($row['level'] == 2) {
            $id_nv = $row['id_nv'];
            $sql_nv = "SELECT ten_nhanvien , anh_nhanvien  FROM tbl_nhanvien WHERE  id_nhanvien = $id_nv";
            $query_nv = mysqli_query($conn, $sql_nv);
            $row_nv = mysqli_fetch_array($query_nv);
            $_SESSION['ten_nv'] = $row_nv['ten_nhanvien'];
            // insert data to session
            $_SESSION['id_nv'] = $row['id_nv'];
            $_SESSION['anh_nv'] = $row_nv['anh_nhanvien'] ;
            // echo $_SESSION['id_nv']  ;
            header("Location: staff/");
        }
        else if ($row['level'] == 1 ) {
            $id_nv = $row['id_nv'] ;
            $sql_nv = " SELECT ten_nhanvien ,anh_nhanvien  FROM tbl_nhanvien WHERE  id_nhanvien = $id_nv " ;
            $query_nv = mysqli_query($conn, $sql_nv);
            $row_nv = mysqli_fetch_array($query_nv);
            $_SESSION['ten_ql'] = $row_nv['ten_nhanvien'] ;
            $_SESSION['anh_ql'] = $row_nv['anh_nhanvien'] ;
            $_SESSION['ql_tong'] = 1 ;
            // insert data to session
            $_SESSION['id_ql']= $row['id_nv'];

            header('Location: total_admin/');
        }
        else if ($row['level'] == 4 ) {
            $id_nv = $row['id_nv'] ;
            $sql_nv = " SELECT * FROM tbl_nhanvien WHERE  id_nhanvien = $id_nv " ;
            $query_nv = mysqli_query($conn, $sql_nv);
            $row_nv = mysqli_fetch_array($query_nv);
            $_SESSION['ten_ql'] = $row_nv['ten_nhanvien'] ;
            $_SESSION['anh_ql'] = $row_nv['anh_nhanvien'] ;
            $_SESSION['chi_ql'] = $row_nv['id_chinhanh'] ;
            $_SESSION['ql_cn'] = 1 ;
            // insert data to session
            $_SESSION['id_ql']= $row['id_nv'];

            header('Location: adminchinhanh/');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo/icon.png">
    <link rel="stylesheet" href="css/myCSS.css">

</head>
<body>
<div class="container">


    <div id="noti_phone"></div>


    <div class="col-md-4 col-md-push-4" style="margin-top: 60px;">
        <form action="" method="POST" role="form">
            <legend>Đăng nhập</legend>

            <div class="form-group">
                <label for="">Username</label><span
                        class="err"><?php if (isset($username_err)) echo $username_err; ?></span>
                <input type="text" class="form-control" value="<?php if (isset($username)) echo $username; ?>"
                       name="username" placeholder="Nhập tên đăng nhập ">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label><span
                        class="err"><?php if (isset($password_err)) echo $password_err; ?></span>
                <input type="password" class="form-control" value="<?php if (isset($pass)) echo $pass; ?>"
                       name="password" placeholder="Nhập mật khẩu">
                <span class="err"><?php if (isset($err_login)) echo "</br>" . $err_login; ?></span>
            </div>


            <button type="submit" class="btn btn-primary" style="margin-left: 10px;" name="btn_login">Đăng nhập</button>
            <span>Quên mật khẩu? Nhấn vào <a data-toggle="modal" class="help" href='#quenmatkhau'>đây</a> </span>
        </form>

    </div>
</div>

<!--start modal quen mat khau -->
<div class="modal fade" id="quenmatkhau">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Quên mật khẩu?</h4>
                <span>Vui lòng cung cấp email hoặc số điện thoại đăng nhập để lấy lại mật khẩu.</span>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form" id="re_password">

                    <div class="form-group">
                        <input type="number" require class="form-control" id="help"
                               placeholder="Nhập số điện thoại của bạn">
                    </div>
                    <span id="noti_check_md"></span>
                    <div class="form-group">
                        <button type="submit" style="background:#FCDE5C; border:none;color:#000;"
                                class="btn btn-primary form-control" id="btn_sdt">Gửi
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!--end modal quen mat khau -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/myJs.js"></script>

</body>
</html>
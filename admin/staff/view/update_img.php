<?php
session_start();
$sqlcn = ' SELECT
	*
	FROM
	tbl_chinhanh ';
 include_once "../config.php";
$querycn = mysqli_query($conn, $sqlcn); // câu lênh truy vấn

if (isset($_POST['submit']) ) {

    //xu ly upload img
    $target_dir = "../../images/anhnv/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    $nameimg = basename( $_FILES["img"]["name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;

// Check file size
        if ($_FILES["img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
                $_SESSION['anh_nv'] = $_FILES["img"]["name"] ;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    $id = $_SESSION["id_nv"];
    $sql = "UPDATE tbl_nhanvien SET anh_nhanvien = '$nameimg' WHERE  id_nhanvien = '$id'";
    $query = mysqli_query($conn, $sql);
    $_SESSION['noti'] = "Cập nhật ảnh thành công";
    header("Location:../index.php?page=info_staff");

}
?>

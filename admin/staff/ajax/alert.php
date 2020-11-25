<?php
include_once "../config.php";
?>
<?php
session_start();
$id_nv = $_SESSION['id_nv'];
$sql = "SELECT * FROM tbl_lichsudieuchuyen where  id_nhanviennhan = $id_nv AND stt = 0 ";
$query = mysqli_query($conn, $sql);
$number_info = mysqli_num_rows($query);
echo $number_info;
?>
<?php
include_once "../config.php";
session_start();
$id = $_POST['id'];
$sql_del = "DELETE FROM tbl_tientrinhcs  WHERE id_tientrinh = $id";
$query = mysqli_query($conn, $sql_del);
echo $id ;
?>

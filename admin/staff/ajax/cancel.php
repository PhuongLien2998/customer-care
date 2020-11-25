<?php
include_once "../config.php";

$id = $_POST['id'];
$sql = "UPDATE tbl_lichsudieuchuyen
    SET stt = 3
    WHERE id_dieuchuyen = $id ";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo 1;
} else {
    echo 0;
}

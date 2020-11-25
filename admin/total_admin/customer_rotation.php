<!-- Phần nội dung trang WEb ---------------------------------->
<div class="container">

    <?php
    $id_khachhang = $_GET['id'];
    $id_nhanvienchuyen = $_SESSION['id_ql'];


    $count_error = 0;
    if (isset($_POST["confirm"])) {
        $name_nv = $_POST["nhanvien"];
        if ($name_nv != "") {
            $array_exp = explode("_", $name_nv);
            $id_nhanviennhan = $array_exp[1];
        } else {
            $erorr = "Bạn chưa chọn tên nhân viên ";
            $count_error++;
        }
        $reason = $_POST['reason'];
        if ($reason == "") {
            $erorr_reason = "Bạn chưa nhập lý do ";
            $count_error++;
        }
       

        if ($count_error == 0) {
            include_once "config/myConfig.php";
            $sql_add_info = "INSERT INTO tbl_lichsudieuchuyen ( id_nhanvienchuyen, id_nhanviennhan, id_khachhang ,lidochuyen,stt)
            VALUES ($id_nhanvienchuyen, $id_nhanviennhan, $id_khachhang , '$reason', 0 ) ";
            $query = mysqli_query($conn, $sql_add_info);
             
            if ($query) {
                echo "<script>alert(\"Chuyển nhân viên thành công . Chờ xác nhận !\") ;
                         window.location=\" index.php?page=list_staff \";
                        </script>";
            }
        }
    }
    ?>
    <div class="row" style="padding: 10px 10px  ;">
        <div class="col-md-9">
            <h2 style="border-bottom: 1px solid black ;">Điều chuyển khách hàng</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for=""> Nhân viên tiếp nhận : <span style="color : red ;"><?php if (isset($erorr)) {
                                echo $erorr;
                            } ?></span> </label>
                    <input list="brow" class="form-control" name="nhanvien" value="<?php
                    if (isset($name_nv)) {
                        echo $name_nv;
                    } ?>">
                    <datalist id="brow">
                        <?php
                        $sql_nv = "SELECT ten_nhanvien , id_nhanvien FROM tbl_nhanvien, tbl_taikhoan WHERE tbl_nhanvien.id_nhanvien = tbl_taikhoan.id_nv AND tbl_taikhoan.level = 2";
                        $query_nv = mysqli_query($conn, $sql_nv);
                        while ($data_nv = mysqli_fetch_array($query_nv)) {
                            ?>
                            <option value="<?php echo "nv_" . $data_nv['id_nhanvien']; ?>">
                                <?php echo $data_nv['ten_nhanvien']; ?> </option>
                            <?php
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="comment">Lý do:<span style="color : red ;"> <?php if (isset($erorr_reason)) {
                            echo $erorr_reason;
                        } ?></label>
                    <textarea class="form-control" rows="5" id="comment" name="reason" value=""><?php if (isset($reason)) {echo $reason;} ?></textarea>
                </div>
                <input type="submit" class="btn btn-danger" name="confirm" value="Xác nhận" style="margin-bottom:10px">
        </div>
        </form>
    </div>
    <!-- Kết thúc nội dung trang web Nội dung -->
</div>
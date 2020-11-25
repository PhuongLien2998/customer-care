<?php
if (isset($_POST["sm_add"])) {
    $count_e = 0;
    $phone = $_POST['phone'];
    //Lấy số điện thoại xem đã tồn tại trong database hay chưa
    $sql_check_phone = "SELECT sdt_khachhang FROM tbl_khachhang WHERE sdt_khachhang = '$phone'";
    $query_check = mysqli_query($conn, $sql_check_phone);
    $number_check = mysqli_num_rows($query_check);
    if ($phone == '') {
        $error_phone = "Bạn chưa nhập số điện thoại ";
        $count_e++;
    } //    Kiểm tra xem số điện thoại đã tồn tại hay chưưa
    else if ($number_check > 0) {
        $error_phone = "Số điện thoại đã tồn tại";
        $count_e++;
    }
    // Kiểm tra Tên khách hàng
    $name = $_POST['nameCustom'];
    if ($name == '') {
        $error_name = "Bạn chưa nhập tên khách hàng";
        $count_e++;
    }
    //Kiêm tra số chứng minh thư
    $identifi = $_POST['identifi'];
    if ($identifi == '') {
        $error_id = "Bạn chưa nhập CMT/CCCD";
        $count_e++;
    }
    //Kiểm tra xem địa chỉ được nhập chưa
    $address = $_POST['address'];
    if ($address == '') {
        $error_add = "Bạn chưa nhập địa chỉ";
        $count_e++;
    }
    //Kiểm tra xem ngày sinh đã được nhập chưa
    $datetime = $_POST['datetime'];
    if ($datetime == "") {
        $error_time = "Bạn chưa nhập ngày sinh của khách hàng";
        $count_e++;
    }
    //Kiểm tra xem đã thêm
    $note = $_POST['note'];
    if (isset($_POST["optradio"])){
        $gender = $_POST["optradio"] ;
    }else{
        $gender = 0 ;
    }
    //
    if($count_e == 0 ){
       $sql_add = "INSERT INTO tbl_khachhang ( sdt_khachhang , ten_khachhang , thecancuoc ,ngaysinh,gioitinh, diemtichluy , trang_thai ,diachi_khachhang ,mota )
                VALUES ('$phone', '$name' , '$identifi', '$datetime' , '$gender', 0 , 1 , '$address' , '$note') " ;
       $query_add = mysqli_query($conn , $sql_add ) ;
       if ($query_add){
//           echo "<script>alert('Thêm khách hàng thành công!');</script>";
           //Lây id khách hàng vừa tạo
           $pass = md5("ksmart") ;
           $sql_get_id = "SELECT id_khachhang,CURDATE() AS time_now FROM tbl_khachhang WHERE sdt_khachhang = '$phone' ";
           $query_get_id = mysqli_query($conn , $sql_get_id) ;
           $data_id = mysqli_fetch_array($query_get_id) ;
           $time_cre_ac =$data_id['time_now'];
           $id_khachhang =  $data_id['id_khachhang'] ;
           $sql_add_acc = "INSERT INTO tbl_taikhoan (username ,password , level , status ,id_kh,thoigiantao) VALUES ('$phone','$pass', 3 ,1 , $id_khachhang,'$time_cre_ac')" ;
           $query_add_acc = mysqli_query($conn , $sql_add_acc ) ;
           $id_nv = $_SESSION['id_nv'] ;
           if ($query_add_acc){
               $sql_chamsoc = "INSERT INTO tbl_chamsoc (id_nhanvien , id_khachhang ) VALUES ($id_nv ,$id_khachhang ) " ;
               $query =  mysqli_query($conn , $sql_chamsoc ) ;
               if ($query){
                   $_SESSION['noti'] = "Thêm mới khách hàng thành công" ;
                   echo "<script>
                    window.location=\"index.php\" ;
                    </script>";
               }
           }

       }
    }
}
?>
<!-- Phần nội dung trang WEb ---------------------------------->
<div class="container">
    <div class="row" style="padding: 10px 10px  ;">
        <div class="col-md-9">
            <h2 style="border-bottom: 1px solid black ;">Thêm mới khách hàng</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Số diện thoại: <span class="error">
                            <?php if (isset($error_phone)) {
                                echo $error_phone;
                            } ?></span> </label>
                    <input type="number" class="form-control" name="phone" value="<?php if (isset($phone)) {
                        echo $phone;
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="">Tên khách hàng:<span class="error">
                            <?php if (isset($error_name)) {
                                echo $error_name;
                            } ?></span></label>
                    <input type="text" name="nameCustom" class="form-control" value="<?php if (isset($name)) {
                        echo $name;
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="">Số CMT/Thẻ CCCD:<span class="error">
                            <?php if (isset($error_id)) {
                                echo $error_id;
                            } ?></span></label>
                    <input type="number" name="identifi" class="form-control" value="<?php if (isset($identifi)) {
                        echo $identifi;
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ :<span class="error">
                            <?php if (isset($error_add)) {
                                echo $error_add;
                            } ?></span></label>
                    <input type="name" class="form-control" name="address" value="<?php if (isset($address)) {
                        echo $address;
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="">Ngày sinh :<span class="error">
                        <?php if (isset($error_time)) {
                            echo $error_time;
                        } ?></label>
                    <div class="input-group  ">
                        <input type="date" class="form-control" name="datetime" value="<?php if (isset($datetime)) {
                            echo $datetime;
                        } ?>">
                    </div>
                </div>
                <label>Giới tính : <input type="radio" value="1" name="optradio" checked="checked" >Nam </label>
                <label><input type="radio" value="0" name="optradio" >Nữ</label>

                <div class="form-group ">
                    <label for="comment">Mô tả :</label>
                    <textarea class="form-control" name="note" rows="5" id="comment"><?php if (isset($note)){echo $note ;} ?></textarea>
                </div>
                <input type="submit" class="btn btn-danger" name="sm_add" value="Thêm mới" style="margin-bottom:10px">
        </div>
        </form>
    </div>
    <!-- Kết thúc nội dung trang web Nội dung -->
</div>

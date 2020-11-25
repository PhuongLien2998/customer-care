<?php
    if(isset($_GET['id_khachhang'])){
        $id_khachhang = $_GET['id_khachhang'] ;
    }
    $id_nv = $_SESSION['id_nv'] ;
    if (isset($_POST['sm_add'])){
        $time = $_POST['time'] ;
        $content = $_POST['content'];
        $sql = "INSERT INTO tbl_tientrinhcs ( id_nhanvien , id_khachhang , thoigiantuvan , noidungtuvan)
               Values ( $id_nv , $id_khachhang ,'$time' , '$content' )";
        $query = mysqli_query($conn , $sql ) ;
        $_SESSION['noti'] = "Thêm tiến trình thành công !" ;
    }

?>
<div class="container">
    <div class="row" style="padding: 10px 10px  ;">
        <div class="col-md-9">
            <h2 style="border-bottom: 1px solid black ;"> Thêm mới tiến trình </h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Thời gia tư vấn:</label>
                    <input type="text" name="time" class="form-control datetime" readonly>
                </div>

                <div class="form-group ">
                    <label for="comment">Nội dung tư vấn :</label>
                    <textarea class="form-control" name="content" rows="5" id="comment"></textarea>
                </div>
                <input type="submit" class="btn btn-danger" name="sm_add" value="Thêm mới" style="margin-bottom:10px">
        </div>
        </form>
    </div>
    <!-- Kết thúc nội dung trang web Nội dung -->
</div>
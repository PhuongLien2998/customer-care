<?php 
include_once "header/header.php" ;
include_once "config/myConfig.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    }
 $_SESSION['id_nv1'] = $id;
$sqllstaff =" SELECT
                  id_nhanvien,
                  ten_nhanvien
                  
              FROM
                    tbl_nhanvien
              WHERE
                  id_nhanvien = '$id'";
$querystaff = mysqli_query($conn, $sqllstaff);
$rowstaff = mysqli_fetch_array($querystaff);
 ?>


<div class="container"><a href="javascript:history.back() " class="goback">Quay lại </a> 
         <div class="info col">
            <ul class="info-client">
                <li>Mã nhân viên: <?php echo $rowstaff['id_nhanvien']; ?></li>
                <li>Tên nhân viên: <?php echo $rowstaff['ten_nhanvien']; ?></li>     
            </ul>    
        </div>
</div></div>
<div class="content container">
    <div class="row">
        <div class="col-md-3 " name="left">
            <ul class="list-group">
                <input type="text" id="id_nv" hidden="" value="<?php echo $id; ?>">
                <li class="list-group-item list-group-item-primary">Xem lịch sử chăm sóc</li>

                <li class="list-group-item " value="1" onclick="show_dcs(this.value);">Đang chăm sóc </li>

                <li class="list-group-item " value="2" onclick="show_dcs(this.value);">Đã chăm sóc</li>

                <li class="list-group-item "  value="3" onclick="show_dcs(this.value);">Đã mua hàng</li>

            </ul>
        </div>
        <div class="col-md-9" name="right" id="load_kh">
           
        </div>
    </div>

</div>

</body>
</html>

<script>
      function show_dcs(value) {
        var id_nv = $("#id_nv").val();
        $.post('list_KH.php', {value:value,id_nv:id_nv}, function(data) {
          $("#load_kh").html(data);
      });
         

      }
    </script>
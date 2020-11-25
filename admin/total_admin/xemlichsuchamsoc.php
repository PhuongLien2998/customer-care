<?php  
  $sqllscs = 'SELECT
                *
              FROM
                 tbl_chinhanh';// câu lệnh truy vấn
    $querylscs = mysqli_query($conn, $sqllscs); // câu lênh truy vấn
?>

<div class="container"><a href="javascript:history.back() " class="goback">Quay lại</a>

<!-- end quay lai -->
<div class="chonchinhanh">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <select onchange="show_list(this.value);" name="barnd" class="browser-default custom-select custom-select-lg mb-3 select">
          <option selected>Chọn chi nhánh </option>
          <?php 
               while ($rowlscs = mysqli_fetch_array($querylscs)) {
            ?>       
            <option value="<?php  echo $rowlscs['id_chinhanh']; ?>">	    <?php  echo $rowlscs[1]; ?>
            </option>
         <?php } ?>
         </select>
      </div>      
    </div>
  </div>
</div>
<div id="load_nv"></div>
</div>
<script>
      function show_list(value) {
        $.post('list_NV.php', {value: value}, function(data) {
          $("#load_nv").html(data);
      });
      // alert(value);
      }
    </script>
<!-- xem lịch sử chăm sóc -> chonlichsuchamsoc->dangchamsoc+dachamsoc+daban-> chitietkhachhang -->

        <!-- trên là chọn chi nhánh , bên dưới ban đầu khi chưa chọn chi nhánh thì sẽ để 10 nhân viên của công ty, sau khi chọn sẽ liệt kê những nhân viên ở chi nhánh mình chọn  -->

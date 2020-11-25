<?php 
	include_once "config/myConfig.php";
 $id_nv = $_POST['id_nv'];
 $tt = $_POST['value'];
  $sqllist =" SELECT
                  *
                  
              FROM
                    tbl_khachhang,tbl_chamsoc
              WHERE
                  tbl_khachhang.id_khachhang = tbl_chamsoc.id_khachhang
              AND tbl_chamsoc.id_nhanvien=$id_nv
              AND tbl_khachhang.trang_thai=$tt";// câu lệnh truy vấn
    $querylist = mysqli_query($conn, $sqllist);
    // $r= mysqli_fetch_assoc($querylist);
    // echo "<pre>";
    // print_r($r);
    // echo "</pre>";
    // //die();
 ?>


<div class="container" >
        <div class="row" style="margin-top: 20px">
<table class="table table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã khách hàng </th>
      <th scope="col">Tên khách hàng </th>
      <th scope="col">Chọn</th>
      
    </tr>
  </thead>
  <tbody>
  	 <?php 
          $dem1 = 0;
          while ($rowlist = mysqli_fetch_array($querylist)) {
            $dem1 += 1;
        ?>
    <tr>
      <td><?php echo $dem1; ?></td>
      <td><?php echo $rowlist['id_khachhang']; ?></td>
      <td><?php echo $rowlist['ten_khachhang']; ?></td>
      <td><button type="button" class="btn btn-info"> <a  href="index.php?page=chitietkhdachamsoc&id=<?php echo $rowlist['id_khachhang'];?>">Xem</a> </button></td>
    </tr>
<?php } ?>
  </tbody>
</table>
</div>
</div>

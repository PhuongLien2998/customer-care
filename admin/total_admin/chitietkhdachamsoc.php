<?php  
    include_once 'config/myConfig.php';
  $id = $_GET['id'];
  $idnv = $_SESSION['id_nv1'];
  $sqllist =" SELECT
                  id_nhanvien,
                  ten_nhanvien
                  
              FROM
                    tbl_nhanvien
              WHERE
                  tbl_nhanvien.id_nhanvien = '$idnv'
                  ";// câu lệnh truy vấn
    $querylist = mysqli_query($conn, $sqllist); // câu lênh truy vấn
    $rowlist = mysqli_fetch_array($querylist);
  // số điện thoại muốn tìm
  $sql = "SELECT tbl_tientrinhcs.thoigiantuvan,tbl_tientrinhcs.id_nhanvien,tbl_nhanvien.ten_nhanvien,tbl_chinhanh.ten_chinhanh,tbl_tientrinhcs.noidungtuvan FROM tbl_tientrinhcs,tbl_nhanvien,tbl_chinhanh WHERE tbl_tientrinhcs.id_nhanvien=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_tientrinhcs.id_khachhang='$id'";
  $query = mysqli_query($conn, $sql);
  $sql1="SELECT tbl_khachhang.id_khachhang,tbl_khachhang.ten_khachhang,tbl_khachhang.diachi_khachhang,tbl_khachhang.sdt_khachhang,tbl_khachhang.trang_thai FROM tbl_khachhang,tbl_tientrinhcs WHERE tbl_tientrinhcs.id_khachhang=tbl_khachhang.id_khachhang AND tbl_tientrinhcs.id_khachhang='$id' ";
  $query1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($query1);
  $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
  if ($count > 0) {
    
?>
<div class="container" >
        <div class="row list-mota" style="margin-top: 20px">
          <div class="info col">
            <ul class="info-client">
                <li>Mã nhân viên: <?php echo $rowlist['id_nhanvien']; ?></li>
                <li>Tên nhân viên: <?php echo $rowlist['ten_nhanvien']; ?></li>     
            </ul>    
        </div>
            <div class="info col">
              <ul class="info-client">
                <li>Mã KH: <?php echo $row1['id_khachhang']; ?></li>
                <li>Tên KH: <?php echo $row1['ten_khachhang']; ?></li>
                <li>Địa chỉ: <?php echo $row1['diachi_khachhang']; ?> </li>
                <li>Số điện thoại: <?php echo $row1['sdt_khachhang']; ?></li>
        <li><?php if($row1['id_khachhang']==1)echo "Đang chăm sóc" ;
            else if($row1['id_khachhang']==2) echo "Đã mua";
            else if($row1['id_khachhang']==3) echo "Chăm sóc mới "; ?></li>
             
              </ul>

                
            </div>
        <table class="table table-striped table-responsive-xs">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">Thời gian</th>
                   
                    <th scope="col">Mã nhân viên </th>
                    <th scope="col">Tên nhân viên  </th>
                    <th scope="col"> Chi Nhánh</th>
                    <th scope="col">Nội dung chăm sóc</th>
                   
                  
                  </tr>
                </thead>
                <tbody>
          <?php 
          while ($row = mysqli_fetch_array($query)) {
          ?>
                  <tr>
          <td><?php echo $row['thoigiantuvan']; ?></td>
          <td><?php echo $row['id_nhanvien']; ?></td>
          <td><?php echo $row['ten_nhanvien']; ?></td>
          <td><?php echo $row['ten_chinhanh']; ?></td>
          <td><?php echo $row['noidungtuvan']; ?></td>
    
                   
                  </tr>
          <?php 
          }
        
          ?>
                  
                  
                </tbody>
              </table>
              <a href="index.php?page=move&id=<?php echo $row1['id_khachhang']; ?>"
                class="btn btn-info">Chuyển khách hàng</a>
              <?php 
           
          }
          else {
            echo "Không có bản ghi nào";
          }
   ?>
        </div>
      </div>
    </div>
       
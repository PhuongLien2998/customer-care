<?php  
 
include_once "config/myConfig.php";
$idcn = $_SESSION['chi_ql'] ;

$sql = "SELECT tbl_chinhanh.ten_chinhanh, tbl_nhanvien.id_nhanvien, tbl_nhanvien.ten_nhanvien, tbl_nhanvien.anh_nhanvien FROM tbl_chinhanh, tbl_nhanvien, tbl_taikhoan WHERE tbl_nhanvien.id_chinhanh = '$idcn' AND tbl_nhanvien.id_chinhanh = tbl_chinhanh.id_chinhanh AND tbl_nhanvien.id_nhanvien = tbl_taikhoan.id_nv AND tbl_taikhoan.status = 1 AND tbl_taikhoan.level = 2 LIMIT 10";
  $query = mysqli_query($conn, $sql); // câu lênh truy vấn
  $count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra

  if ($count > 0) {
    ?>
  <div class="container" >
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <div class="list-employee">
          <table class="table table-striped ">
            <thead class="table-primary">
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh </th>
                <th scope="col">Tên nhân viên</th>
                <th scope="col">Mã nhân viên  </th>
                <th scope="col">Chọn</th>

              </tr>
            </thead>
            <tbody id="myTable" >
              <?php 
              $dem1 = 0;
              while ($rowlist = mysqli_fetch_array($query)) {
                $dem1 += 1;
                ?>
                <tr>
                 <td><?php echo $dem1; ?></td>
                 <td><img style="width: 100px; height: 100px" src="../images/anhnv/<?php echo $rowlist['anh_nhanvien']; ?>" alt="<?php echo $rowlist['anh_nhanvien']; ?>"></td>
                 <td><?php echo $rowlist['ten_nhanvien']; ?></td>
                 <td><?php echo $rowlist['id_nhanvien']; ?></td> 
                 <td>
                  <a href="index.php?page=chonlichsuchamsoc&id=<?php echo $rowlist['id_nhanvien']; ?>">
                    <button class="btn btn-primary">xem</button>
                  </a>
                </td>
              </tr>
            <?php 
          } 

            ?>           
          </tbody>
        </table>
      </div>
    </div>
       <?php 
          } 

            ?>  
   

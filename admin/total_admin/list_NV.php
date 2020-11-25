<?php 


include_once "config/myConfig.php";
$value_cn = $_POST['value'];
$sqllist =" SELECT
id_nhanvien,
ten_nhanvien,
anh_nhanvien

FROM
tbl_nhanvien, tbl_taikhoan
WHERE
tbl_nhanvien.id_chinhanh = '$value_cn' AND tbl_taikhoan.level = 2 AND tbl_taikhoan.id_nv = tbl_nhanvien.id_nhanvien
                  ";// câu lệnh truy vấn
    $querylist = mysqli_query($conn, $sqllist); // câu lênh truy vấn
    ?>
  
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
              while ($rowlist = mysqli_fetch_array($querylist)) {
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
            <?php } 

            ?>           
          </tbody>
        </table>
      </div>
   

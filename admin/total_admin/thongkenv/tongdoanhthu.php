
<?php  
include 'Classes/PHPExcel.php';
		include_once '../config/myConfig.php';
    $id = $_POST['id'];
    $ngaybd = $_POST['ngaybd'];
    $ngaykt = $_POST['ngaykt'];
   
    $id1= trim($id);
	$sql = "SELECT tonghd.id_hoadon,tonghd.thoigianthanhtoan , tonghd.ten_nhanvien,tonghd.id_nhanvien ,SUM(tonghd.B) AS D,COUNT(tonghd.id_nhanvien)as sohoadon
  FROM
  (SELECT tbl_hoadon.id_hoadon, tbl_nhanvien.ten_nhanvien,tbl_nhanvien.id_nhanvien,tbl_hoadon.thoigianthanhtoan ,SUM(tongtien) AS B
      FROM tbl_hoadon, tbl_nhanvien, tbl_chinhanh,
          (SELECT tbl_hoadonchitiet.id_hdct, tbl_hoadonchitiet.id_hoadon ,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
                       FROM tbl_hoadonchitiet,tbl_dienthoai
                       WHERE tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai) AS KL
      WHERE tbl_hoadon.id_hoadon=KL.id_hoadon AND tbl_nhanvien.id_nhanvien=tbl_hoadon.id_nhanvienbh AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_chinhanh.id_chinhanh='$id1' AND tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt'
      GROUP BY KL.id_hoadon) as tonghd
  GROUP BY tonghd.id_nhanvien
  
  ";
   
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query); 

	

// Loại file cần ghi là file excel phiên bản 2007 trở đi
$fileType = 'Excel2007';
// Tên file cần ghi
$fileName = 'x.xlsx';
 
// Load file product_import.xlsx lên để tiến hành ghi file
$objPHPExcel = PHPExcel_IOFactory::load("x.xlsx");
 
// Giả sử chúng ta có mảng dữ liệu cần ghi như sau

    $objPHPExcel= new PHPExcel;
    $objPHPExcel = PHPExcel_IOFactory::load("x.xlsx");
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet=$objPHPExcel->getActiveSheet()->setTitle('nhanvien');
    $rowcout=1;
    $sheet  ->setCellValue('A'.$rowcout, "STT ");
  $sheet  ->setCellValue('B'.$rowcout, "Mã nhân viên ");
  $sheet ->setCellValue('C'.$rowcout, "Tên nhân viên ");
  $sheet ->setCellValue('D'.$rowcout, "Tổng doanh thu");
  $sheet ->setCellValue('E'.$rowcout, "Số hóa đơn ");
  $sheet ->setCellValue('F'.$rowcout, "Hoa hồng ");
  $dem = 0;
  while ($row = mysqli_fetch_array($query)) {
    $dem += 1;
    $rowcout++;
    $sheet ->setCellValue('A'.$rowcout, $dem);
    $sheet ->setCellValue('B'.$rowcout, $row['id_nhanvien']);
    $sheet  ->setCellValue('C'.$rowcout, $row['ten_nhanvien']);
    $sheet ->setCellValue('D'.$rowcout,  number_format($row['D']));
    $sheet ->setCellValue('E'.$rowcout, $row['sohoadon'] );
    $sheet ->setCellValue('F'.$rowcout, number_format($row['sohoadon']*100000)  );
  }
    
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
// Tiến hành ghi file
$objWriter->save($fileName);
?>
<a  style="margin-bottom:30px ;float:right" class="btn btn-info"href="thongkenv/x.xlsx">xuất ra excel</a>
  

<?php $sql1 = "SELECT tonghd.id_hoadon,tonghd.thoigianthanhtoan , tonghd.ten_nhanvien,tonghd.id_nhanvien ,SUM(tonghd.B) AS D,COUNT(tonghd.id_nhanvien)as sohoadon
  FROM
  (SELECT tbl_hoadon.id_hoadon, tbl_nhanvien.ten_nhanvien,tbl_nhanvien.id_nhanvien,tbl_hoadon.thoigianthanhtoan ,SUM(tongtien) AS B
      FROM tbl_hoadon, tbl_nhanvien, tbl_chinhanh,
          (SELECT tbl_hoadonchitiet.id_hdct, tbl_hoadonchitiet.id_hoadon ,(tbl_dienthoai.gia_dienthoai*tbl_hoadonchitiet.soluong)AS tongtien
                       FROM tbl_hoadonchitiet,tbl_dienthoai
                       WHERE tbl_hoadonchitiet.id_dienthoai=tbl_dienthoai.id_dienthoai) AS KL
      WHERE tbl_hoadon.id_hoadon=KL.id_hoadon AND tbl_nhanvien.id_nhanvien=tbl_hoadon.id_nhanvienbh AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_chinhanh.id_chinhanh='$id1' AND tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt'
      GROUP BY KL.id_hoadon) as tonghd
  GROUP BY tonghd.id_nhanvien
  
  ";
   $query1 = mysqli_query($conn, $sql1);?>

<div class="">
            <table class="table table-striped table-responsive-sm">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã nhân viên </th>
                    <th scope="col">Tên nhân viên </th>
                    <th scope="col">Tổng doanhthu </th>
                    <th scope="col">Số hóa đơn  </th>
                    <th scope="col">Hoa hồng   </th>
                    <th scope="col">Chọn</th>
                  
                  </tr>
                </thead>
                <tbody>
                <?php 
                
                  $dem = 0;
                  while ($row = mysqli_fetch_array($query1)) {
                    $dem += 1;
                  ?>
                  <tr>
                  <th scope="row"><?php echo $dem; ?></th>
                  <td><?php echo $row['id_nhanvien']  ?></td>
                  <td><?php echo $row['ten_nhanvien']  ?></td>
                  <td><?php echo number_format($row['D'])  ?></td>
                  <td><?php echo $row['sohoadon']  ?></td>
                  <td><?php echo number_format($row['sohoadon']*100000)    ?></td>
		
                    <td><button type="button" class="btn btn-info view_sohd" value="<?php echo $row['id_nhanvien'] ?>">  Xem</a></button></td>
                   
                  </tr>
                  <?php 
                      }
                    
                      
                    ?>
                 
                </tbody>
              </table>
              <?php 
           
          // }
          // else {
          //   echo "Không có bản ghi nào";
          // }
   ?>
        </div>
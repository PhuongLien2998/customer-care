
<?php  
include 'Classes/PHPExcel.php';
		include_once '../config/myConfig.php';
  $id = $_POST['id'];
  $id1= trim($id);
  $ngaybd = $_POST['ngaybd'];
  $ngaykt = $_POST['ngaykt'];
 
 
	$sql = "SELECT tbl_hoadon.id_hoadon,tbl_hoadon.id_nhanviencs,tbl_nhanvien.ten_nhanvien,COUNT(tbl_hoadon.id_nhanviencs) AS C
  FROM tbl_hoadon,tbl_nhanvien,tbl_chinhanh
  WHERE tbl_hoadon.id_nhanviencs=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_chinhanh.id_chinhanh='$id1' AND tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt'
  GROUP BY tbl_hoadon.id_nhanviencs
  ORDER BY C  DESC, tbl_nhanvien.ten_nhanvien ASC
  
  ";
  $query = mysqli_query($conn, $sql);
  // Loại file cần ghi là file excel phiên bản 2007 trở đi
$fileType = 'Excel2007';
// Tên file cần ghi
$fileName = 'dachamsoc.xlsx';
 
// Load file product_import.xlsx lên để tiến hành ghi file
$objPHPExcel = PHPExcel_IOFactory::load("dachamsoc.xlsx");
 
// Giả sử chúng ta có mảng dữ liệu cần ghi như sau

    $objPHPExcel= new PHPExcel;
    $objPHPExcel = PHPExcel_IOFactory::load("dachamsoc.xlsx");
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet=$objPHPExcel->getActiveSheet()->setTitle('dachamsoc');
    $rowcout=1;
    $sheet  ->setCellValue('A'.$rowcout, "STT ");
  $sheet  ->setCellValue('B'.$rowcout, "Mã nhân viên ");
  $sheet ->setCellValue('C'.$rowcout, "Tên nhân viên ");
  $sheet ->setCellValue('D'.$rowcout, "Số lượng khách hàng");
  $sheet ->setCellValue('E'.$rowcout, "Hoa hồng ");
  $dem = 0;
  while ($row = mysqli_fetch_array($query)) {
    $dem += 1;
    $rowcout++;
    $sheet ->setCellValue('A'.$rowcout, $dem);
    $sheet ->setCellValue('B'.$rowcout, $row['id_nhanviencs']);
    $sheet  ->setCellValue('C'.$rowcout, $row['ten_nhanvien']);
    $sheet ->setCellValue('D'.$rowcout,  number_format($row['C']));
    $sheet ->setCellValue('E'.$rowcout, number_format($row['C']*200000)  );
  }
    
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
// Tiến hành ghi file
$objWriter->save($fileName);
?>
<a  style="margin-bottom:30px ;float:right" class="btn btn-info"href="thongkenv/dachamsoc.xlsx">xuất ra excel</a>
  
  <?php 
  
	$sql1 = "SELECT tbl_hoadon.id_hoadon,tbl_hoadon.id_nhanviencs,tbl_nhanvien.ten_nhanvien,COUNT(tbl_hoadon.id_nhanviencs) AS C
  FROM tbl_hoadon,tbl_nhanvien,tbl_chinhanh
  WHERE tbl_hoadon.id_nhanviencs=tbl_nhanvien.id_nhanvien AND tbl_nhanvien.id_chinhanh=tbl_chinhanh.id_chinhanh AND tbl_chinhanh.id_chinhanh='$id1' AND tbl_hoadon.thoigianthanhtoan BETWEEN '$ngaybd' AND '$ngaykt'
  GROUP BY tbl_hoadon.id_nhanviencs
  ORDER BY C  DESC, tbl_nhanvien.ten_nhanvien ASC
  
  ";
  $query1 = mysqli_query($conn, $sql1);
  $count = mysqli_num_rows($query1); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {



	?>
	    
<div >
            <table class="table table-striped table-responsive-xs">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã nhân viên </th>
                    <th scope="col">Tên nhân viên </th>
                    <th scope="col">Số lượng khách hàng </th>
                    <th scope="col">Hoa hồng  </th>
                  
                  
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
                <td><?php echo $row['id_nhanviencs']  ?></td>
                <td><?php echo $row['ten_nhanvien']  ?></td>
                <td><?php echo $row['C']  ?></td>
                <td><?php echo number_format($row['C']*200000)?></td>
		
                  </tr>
                  <?php 
                      }
                    
                    ?>
                 
                </tbody>
              </table>
              <?php 
           
          }
          else {
            echo "Không có bản ghi nào";
          }
   ?>
        </div>
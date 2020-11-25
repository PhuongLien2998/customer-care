<?php 

   if (isset($_SESSION['chi_ql'])) {  $id_cn= $_SESSION['chi_ql']; 
   
   
   
  
 
 $date= getdate();
 $month=$date['mon']-1;
 $year=$date['year'];


$sql1="SELECT tbl_hoadon.thoigianthanhtoan,tbl_hoadon.id_nhanviencs, COUNT( DATE(tbl_hoadon.thoigianthanhtoan)) as c
FROM tbl_hoadon,tbl_nhanvien
WHERE tbl_hoadon.id_nhanviencs=tbl_nhanvien.id_nhanvien  AND tbl_nhanvien.id_chinhanh='cn01' AND MONTH(tbl_hoadon.thoigianthanhtoan)='$month'
GROUP BY DATE(tbl_hoadon.thoigianthanhtoan)";
$sql2="SELECT tbl_hoadon.thoigianthanhtoan,tbl_hoadon.id_nhanviencs, COUNT( DATE(tbl_hoadon.thoigianthanhtoan)) as c
FROM tbl_hoadon,tbl_nhanvien
WHERE tbl_hoadon.id_nhanviencs=tbl_nhanvien.id_nhanvien  AND tbl_nhanvien.id_chinhanh='cn02' AND MONTH(tbl_hoadon.thoigianthanhtoan)='$month'
GROUP BY DATE(tbl_hoadon.thoigianthanhtoan)";
$sql3="SELECT tbl_hoadon.thoigianthanhtoan,tbl_hoadon.id_nhanviencs, COUNT( DATE(tbl_hoadon.thoigianthanhtoan)) as c
FROM tbl_hoadon,tbl_nhanvien
WHERE tbl_hoadon.id_nhanviencs=tbl_nhanvien.id_nhanvien  AND tbl_nhanvien.id_chinhanh='cn03' AND MONTH(tbl_hoadon.thoigianthanhtoan)='$month'
GROUP BY DATE(tbl_hoadon.thoigianthanhtoan)";

$query1 = mysqli_query($conn, $sql1); // câu lênh truy vấn
$query2 = mysqli_query($conn, $sql2); // câu lênh truy vấn
$query3 = mysqli_query($conn, $sql3);
$count = mysqli_num_rows($query1); // đếm xem có bao nhiêu bản ghi trả ra
$sql4 = 'SELECT tbl_chinhanh.ten_chinhanh ,tbl_chinhanh.id_chinhanh FROM tbl_chinhanh ';

$query4 = mysqli_query($conn, $sql4);

?>
  <?php 
   $arr= array();
   $soluog=array();
   $sl=0;

      if($month==10 || $month==12 ||$month==1 ||$month==3 ||$month==5 ||$month==7 ||$month==8){
        $sl=31;
      }
      else if( $month==11 || $month==9 ||$month==6 ||$month==4){
        $sl=30;
      }
      else{
        if(($year % 4==0)&& ($year %100!=0) ||($year%400==0)){
          $sl=29;
        }
        else{
          $sl=28;
        }
        
      }


   //chi nhánh 1
  while ($row = mysqli_fetch_array($query1)) {
      $value= $row['c'];// số lượng 
      $giay=  strtotime($row['thoigianthanhtoan']);
      $date= getdate($giay);
      $day= $date['mday'];//ngày 1-31
      array_push($arr,$day);
      array_push($soluog,$value);
}

  $tmp = array();
  for ($i=1;$i<=$sl;$i++){
    $tam=0;//kt  ngay có hay chưa nếu có biến = vt +1;
    $tmpsl=0;//gt 
    $d=count($arr);
    for ($j=0; $j<$d; $j++) {
      if($arr[$j]==$i) {
        $tam=$j+1;
      }
    }
    if ($tam>0) {
      $tmpsl=$soluog[$tam-1];
    }
    array_push($tmp,$tmpsl);
  }
// chi nhánh 2
$arr2= array();
$soluog2=array();
while ($row1 = mysqli_fetch_array($query2)) {
  $value= $row1['c'];// số lượng 
  $giay=  strtotime($row1['thoigianthanhtoan']);
  $date= getdate($giay);
  $day= $date['mday'];//ngày 1-31
  array_push($arr2,$day);
  array_push($soluog2,$value);
}
$tmp2 = array();
  for ($i=1;$i<=$sl;$i++){
    $tam2=0;//kt  ngay có hay chưa nếu có biến = vt +1;
    $tmpsl2=0;//gt 
    $d=count($arr2);
    for ($j=0; $j<$d; $j++) {
      if($arr2[$j]==$i) {
        $tam2=$j+1;
      }
    }
    if ($tam2>0) {
      $tmpsl2=$soluog2[$tam2-1];
    }
    array_push($tmp2,$tmpsl2);
  }
  // chi nhánh 3
$arr3= array();
$soluog3=array();
while ($row3 = mysqli_fetch_array($query3)) {
  $value= $row3['c'];// số lượng 
  $giay=  strtotime($row3['thoigianthanhtoan']);
  $date= getdate($giay);
  $day= $date['mday'];//ngày 1-31
  array_push($arr3,$day);
  array_push($soluog3,$value);
}
$tmp3 = array();
  for ($i=1;$i<=$sl;$i++){
    $tam3=0;//kt  ngay có hay chưa nếu có biến = vt +1;
    $tmpsl3=0;//gt 
    $d=count($arr3);
    for ($j=0; $j<$d; $j++) {
      if($arr3[$j]==$i) {
        $tam3=$j+1;
      }
    }
    if ($tam3>0) {
      $tmpsl3=$soluog3[$tam3-1];
    }
    array_push($tmp3,$tmpsl3);
  }
   
?>
         <div class="container">
           <span id="idtest" data-id="<?php echo $id_cn ;?>"></span>
        <div class="search row">
            <div class="day col-md-5">
                <div class="form-group ">
                  <label for="">Ngày bắt đầu <span class="red">(*)</span></label><span class="error red" id="er_name" ></span>
                  <input class="inp-day" type="date" name="ngaykt" id="ngaybd" class="form-control" placeholder="" aria-describedby="helpId" onblur="checkNgaybd();">
                  
                </div>
            </div>
            <div class="day col-md-5">
                <div class="form-group ">
                    <label for="">Ngày kết thúc  <span class="red">(*)</span></label><span class="error red" id="er_day" ></span>
                    <input class="inp-day"  type="date" name="ngaykt" id="ngaykt" class="form-control" placeholder="" aria-describedby="helpId" onblur="checkNgaykt();">
                    
                  </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

            <button style="margin-top:20px" class="btn btn-info timkiem" onclick="checkRegis()">Tìm kiếm</button>
            </div>

        </div>
      
        <div class="bot" id="right">
        <div id="containe" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        
      
      </div>
      <script>
        var date = new Date();
        
        var month= date.getMonth();

       
    
         if( month==10 || month==12 ||month==1 ||month==3 ||month==5 ||month==7 ||month==8){
          var categoriesArray = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
         }
         else if(  month==11 || month==9 ||month==6 ||month==4 ){
          var categoriesArray = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];
         }
         else if( month==2) {
         if( ($year % 4==0)&& ($year %100!=0) ||($year%400==0)){
          var categoriesArray = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29'];
         }else{
          var categoriesArray = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28'];

         }
          
         }

         
         var  chart= Highcharts.chart('containe', {
        
        chart: {
            type: 'line'
        },
        title: {
            text: 'Số lượng chăm sóc thành công ở các chi nhánh '
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories:categoriesArray
        },
        yAxis: {
            title: {
            text: 'Số lượng chăm sóc thành công '
            }
        },
        plotOptions: {
            line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
            }
        },
        series: [{
            name: 'Hà Đông',
            data: [<?php foreach (  $tmp  as $key => $values){
  echo $values.",";
} ?>]
        }, {
            name: 'Hà Tây',
            data: [<?php foreach (  $tmp2  as $key => $values){
  echo $values.",";
} ?>]
        },{
          name: 'Cầu Giấy ',
                        data: [<?php foreach (  $tmp3  as $key => $values){
              echo $values.",";
            } ?>]

        }]
        });
          
    
          
        </script>
<?php } ?>
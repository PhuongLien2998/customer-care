<?php
   
if (session_id() == '') {
  # code...
  session_start();

}
if (!isset($_SESSION['id_ql'])) {
 header('Location: view/login_staff.php');
}
include_once "header/header.php" ; 
include_once 'config/myConfig.php'; 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }else{
        $page = 'thongketheokhachhang';
      }

      switch ($page) {
        case 'info_acount':
          include 'view/info_acount.php';
          break;
        case 'thongketheokhachhang':
          include 'thongketheokhachhang.php';
          break;
        case 'list_co':
        include_once "customer/list_co.php";
          break;
        case 'edit_co':
        include_once "customer/edit_co.php";
          break;

        case 'list_staff':
        include_once "view/list_staff.php";
          break;

        case 'info_staff':
          include_once "view/info_staff.php";
          break;
         case 'update_staff':
          include_once "view/update_staff.php";
          break;
        case 'info_co':
          include_once "customer/info_co.php";
          break;
        case 'chonchinhanh':
          include 'thongkenv/chonthongke.php';
          break;

        case 'xemlichsuchuyendoi':
          include 'xemlichsuchuyengiao.php';
          break;
        case 'tientrinhkhachhang':
          include 'tientrinhkhachhang.php';
          break;
        case 'xemlichsuchamsoc':
          include 'xemlichsuchamsoc.php';
          break;
        case 'chonlichsuchamsoc':
          include_once 'chonlichsuchamsoc.php';
          break;
        case 'chitietkhdachamsoc':
          include_once 'chitietkhdachamsoc.php';
          break;
        case 'chitietkhachhang':
          include 'chitietkhachhang.php';
          break;
        case 'search':
          include 'server/search.php';
          break;
        case 'add_staff':
          include_once 'view/addNV.php';
          break;
        case 'move':
          include_once 'customer_rotation.php';
          break;
        case 'del':
          include_once 'view/delete_nv.php';
          break;
        case 'list_staffblock':
          include_once 'view/list_staffblock.php';
          break;
        case 'open_block':
          include_once 'view/open_block.php';
          break;
        case 'themkhuyenmai':
          include_once 'themmoikm.php';
          break;
        case 'danhsachkhuyenmai':
          include_once 'list_km.php';
          break;
        case 'edit_km':
          include_once 'edit_km.php';
          break;
        case 'del_km':
          include_once 'del_km.php';
          break;
          case 'logout':
          include_once 'view/logout.php';
          break;
        default:
          echo "<h4 style='color: red;'>ERROR 404, trang không tồn tại <span><a href='index.php' style='color: blue;'>Quay lại</a></span></h4>";
          break;
      }
    ?>
     
            
        
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/myAjax.js"></script>
    <script src="js/main.js"></script>
   
    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
      $(document).ready
      $("#search_clientt").keyup(function(){

var key=$(this).val();
alert(key);

// var str_key = key.length;
// if (str_key > 5) {
// 	$.post('server/search.php', {key : key}, function(data){
// 		$("#content-info").html(data);
// 	});
// }else{
// 	return;
// }

});
    </script>
</body>
</html>
<?php
session_start();
include_once "config.php";

if (!isset($_SESSION['ten_nv'])){
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="shortcut icon" href="../images/logo/icon.png">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/noti.css">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
<?php
include_once "header/header.php";
?>
<!-- Phần nội dung trang WEb ---------------------------------->

<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "list-customer";
}

switch ($page) {
    case 'list-customer':
        include_once "view/list-customer.php";
        break;
    case 'list-need-care':
        include_once "view/list-customer-need-care.php";
        break;
    case 'list-customer_purchase':
        include_once "view/list_customer_purchase.php";
        break;
    case 'list-customer':
        include_once "view/list-customer.php";
        break;
    case 'add-customer':
        include_once "view/add-customer.php";
        break;
    case 'invoice':
        include_once "view/invoice.php";
        break;
    case 'show-detail':
        include_once "view/show-detail.php";
        break;
    case 'customer_rotation':
        include_once "view/customer_rotation.php";
        break;
    case 'info':
        include_once "view/info.php";
        break;
    case 'add-process':
        include_once "view/add-process.php";
        break;
    case 'add_process':
        include_once "view/add_process.php";
        break;
    case 'logout':
        include_once "view/logout.php";
        break;
    case 'chuyenchamsoc':
        include_once "view/chuyenchamsoc.php";
        break;
    case 'info_staff':
        include_once "view/info_staff.php";
        break;
    default:
        break;
}
?>

<!-- Kết thúc nội dung trang web Nội dung -->
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script src="js/notify.min.js"></script>
<script>
    $(document).ready(function () {
        $(".datetime").datetimepicker();
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

    })
</script>
<script src='js/info.js'></script>
<script src='js/detail.js'></script>
<script src="js/xuatban.js"></script>
</body>
</html>
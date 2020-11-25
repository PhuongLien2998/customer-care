<?php  
	$conn = mysqli_connect("localhost", "root", "", "chamsockh") or die("Can't connect database");
	if ($conn) {
		// echo "Kết nối database thành công!";
        mysqli_set_charset($conn, 'utf8');
     
    	}else{
		echo "Lỗi kết nối!";
	}
?>
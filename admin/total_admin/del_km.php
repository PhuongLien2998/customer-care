<?php 
	
	include_once "config/myConfig.php";

	if(isset($_GET['id_km'])){
		$id_km =$_GET['id_km'];
	 $sql= "DELETE FROM tbl_khuyenmai WHERE id_khuyenmai=$id_km ";
	 $q= mysqli_query($conn,$sql);
	 if($q!==false){
	 	$_SESSION['noty_del_km']=1;
			echo "<script>location.href='index.php?page=danhsachkhuyenmai';</script>";
	 }
}

else {
	echo "trang ko ton tai";
}
	 

 ?>
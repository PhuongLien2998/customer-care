
// ajax
// search khách hàng ở trang tiến trình 
$(document).ready(function(){

	$(".view_noti").delay(3000).slideUp();

	// xem theo khách hàng
	$(document).on('click', '.theokhachhang',function(){
	
		$.post("server/theokhachhang.php", {}, function(data){
			$("#right").html(data);
			
		});
	});
	//xem theo chi nhanh
	$(document).on('click', '.theochinhanh',function(){
	
		$.post("server/theochinhanh.php", {}, function(data){
			$("#right").html(data);
			
		});
	});
	// view theo khách hàng 
	$(document).on('keyup', "#search_member", function(){
		var key=$(this).val();
	
		var str_key = key.length;
		if (str_key > 5) {
			$.post('server/search.php', {key : key}, function(data){
				$("#content-info").html(data);
			});
		}else{
			return;
		}
		
	});
	//view theo chi nhánh 
	$(document).on('click', '.tim',function(){
		
		var chinhanh = $('.select').val();
		
			$.post("server/view_theochinhanh.php", {chinhanh:chinhanh}, function(data){
				$(".main-chinhanh").html(data);
			
				
			});
	});
	
	$(document).on('click', '#view_info',function(){
		var id = $(this).val();
	
		
	
			$.post("server/view_info.php", {id : id}, function(data){
				$("#content-info").html(data);
				
			});
	
		
		
		
	});
	
	$(document).on('click', '.timkiem',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		var idcn = $('#idtest').attr('data-id');
	
		

	
		if(checkNgaybd()&&checkNgaykt()){
		
			$.post("server/thongkekh.php", {ngaybd : ngaybd, ngaykt : ngaykt, idcn:idcn }, function(data){
				$("#right").html(data);
			
				
			});
	

		}
	
	});
	$(document).on('click', '#view_hd',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		var idcn = $('#idtest').attr('data-id');
		var id = $(this).val();
		
	
		
	
			$.post("server/view_hd.php", {id : id,ngaybd : ngaybd, ngaykt : ngaykt ,idcn:idcn}, function(data){
				$("#show-hd").html(data);
				
			});
	
		
		
		
	});
	$(document).on('click', '#view_hdct',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		var idcn = $('#idtest').attr('data-id');
		var id = $(this).val();
		
		
	
		
	
			$.post("server/view_hdct.php", {id : id,ngaybd : ngaybd, ngaykt : ngaykt ,idcn:idcn}, function(data){
				$("#show-hd").html(data);
				
			});
	
		
		
		
	});
	// view hóa đơn mở đầu 
	$(document).on('click', '#view_hdbd',function(){
		
		var id = $(this).val();
		
	
		
	
			$.post("server/view_hdbd.php", {id : id}, function(data){
				$("#right").html(data);
				
			});
	
		
		
		
	});
	// view hdct bandau
	$(document).on('click', '#view_hdctbd',function(){
		
		var id = $(this).val();
		
	
		
	
			$.post("server/view_hdctbd.php", {id : id}, function(data){
				$("#show-hd").html(data);
				
			});
	
		
		
		
	});
	// //thống kê theo nhân viên 
	// $(document).on('click', '.view_employ',function(){
	
	// 	var id = $(this).val();
	// 		$.post("thongkenv/chonthongke.php", {id : id}, function(data){
	// 			$("#show-tk").html(data);
				
	// 		});
	// });
	//đánh giá
	$(document).on('click', '.danhgia',function(){
	
		var id = $(this).val();
		
		
	
		
	
			$.post("thongkenv/danhgia.php", {id : id}, function(data){
				$("#right").html(data);
				
			});
	
		
		
		
	});
	//chon tongdoanhthu
	
	$(document).on('click', '.tongdoanhthu',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		var id = $(this).val();
		
		
	
		
		if(checkNgaybd()&&checkNgaykt()){
			$.post("thongkenv/tongdoanhthu.php", {id : id,ngaybd: ngaybd,ngaykt:ngaykt}, function(data){
				$("#right").html(data);
				
			});
		}
	
		
		
		
	});
		//chon tongdoanhthu-sohoadon
	$(document).on('click', '.view_sohd',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		
		var id = $(this).val();
		
		
	
		
	
			$.post("thongkenv/thongkesohoadon.php", {id : id,ngaybd: ngaybd,ngaykt:ngaykt}, function(data){
				$("#right").html(data);
				
			});
	
		
		
		
	});
	//hoadonchitietnv
	$(document).on('click', '#view_hdctbnv',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
	
		var id = $(this).val();
		
	
		
	
			$.post("thongkenv/view_hdctnv.php", {id : id,ngaybd : ngaybd, ngaykt : ngaykt }, function(data){
				$("#right").html(data);
				
			});
	
		
		
		
	});
		//so lượng khách hàng đã mua 
	$(document).on('click', '.soluongkhachhang',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		var id = $(this).val();
		
		
	
		if(checkNgaybd()&&checkNgaykt()){
	
			$.post("thongkenv/soluongkhachhang.php", {id : id,ngaybd: ngaybd,ngaykt:ngaykt}, function(data){
				$("#right").html(data);
				
			});
	
		}
		
		
	});
	//so lượng khách hàng đang chăm sóc
	$(document).on('click', '.soluongkhachhangdangcs',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
		var id = $(this).val();
		
		
	
		if(checkNgaybd()&&checkNgaykt()){
	
			$.post("thongkenv/soluongkhachhangdangchamsoc.php", {id : id,ngaybd: ngaybd,ngaykt:ngaykt}, function(data){
				$("#right").html(data);
				
			});
	
		}
		
		
	});

	// xem lich sử chuyển giao
	//1.chọn thoi gian
	$(document).on('click', '.thoigian',function(){
	
			$.post("chuyengiao/chonthoigian.php", {}, function(data){
				$("#right").html(data);
				
			});
	});
	//1.1 theothoigian
	$(document).on('click', '.timngay',function(){
		var ngaybd = $('#ngaybd').val();
		var ngaykt = $('#ngaykt').val();
	
		
			$.post("chuyengiao/xemchuyengiaotheothoigian.php", {ngaybd: ngaybd,ngaykt:ngaykt}, function(data){
				$(".hienthitheothoigian").html(data);
				
			});
	});
	//2.chọn nhanvien
	$(document).on('click', '.nhanvien',function(){
	
		$.post("chuyengiao/chonnhanvien.php", {}, function(data){
			$("#right").html(data);
			
		});
	});
	//2.1 theonhanvien
	$(document).on('click', '.timnhanvien',function(){
		var nvc = $('#nvc').val();
		var nvn = $('#nvn').val();
	
		
			$.post("chuyengiao/xemnhanvien.php", {nvc: nvc,nvn:nvn}, function(data){
				$(".hienthitheonhanvien").html(data);
				
			});
	});
	//3.chọn khachhang
	$(document).on('click', '.khachhang',function(){
	
		$.post("chuyengiao/chonkhachhang.php", {}, function(data){
			$("#right").html(data);
			
		});
	});
	//3.1 theokhachhang
	
	$(document).on('keyup', "#search_clientt", function(){
		var key=$(this).val();
		//alert(key);

		//
	//
			$.post('chuyengiao/xemkhachhang.php', {key : key}, function(data){
				$(".hienthitheokhachhang").html(data);
			});
		//}else{
			//return;
		//}
		
	});


	//search nhân viên ở trang lịch sử chăm sóc
	
	$(document).on('keyup', "#search_employ", function(){
	
		
		var key=$(this).val();
			$.post('view/search_employ.php', {key : key}, function(data){
				$(".main-list").html(data);
				console.log(data);
			});
		
		
	}) ;

	$(document).on('keyup', "#search_block", function(){
	
		
			var key=$(this).val();
			$.post('view/seach_block.php', {key : key}, function(data){
				$(".list_block").html(data);
				
			});
			
	}) ;

	 $(document).on( "keyup","#myInput", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    
      });
	 })


	//  $("#update_account").click(function(e) {
	// 	e.preventDefault(); // Tránh load lại form
	// 	var Name = $("#Name").val();
	// 	var Cmt= $("#Cmt").val();
	// 	var Birth= $("#Birth").val();
	// 	var Energy= $("#Energy").val();
	// 	var Email= $("#Email").val();
	// 	var Phone= $("#Phone").val();
	// 	var Address= $("#Address").val();

	// 	var Name_err="";
	// 	var Cmt_err="";
	// 	var Birth_err="";
	// 	var Email_err="";
	// 	var Phone_err="";
	// 	var Address_err="";
		
	// 	if(Name ==''){
	// 		Name_err="không được để trống";
	// 	}


	// 	 if(Cmt ==''){
	// 		Cmt_err="không được để trống";
	// 	}
	// 	if(Birth ==''){
	// 		Birth_err="không được để trống";
	// 	}
	// 	if(Email ==''){
	// 		Email_err="không được để trống";
	// 	}
	// 	if(Phone ==''){
	// 		Phone_err="không được để trống";
	// 	}
	// 	if(Address ==''){
	// 		Address_err="không được để trống";
	// 	}

	// 	if(Name_err!=""||Cmt_err!=""||Birth_err!=""||Email_err!=""||Phone_err!=""||Address_err!=""){
	// 		 $.post('view/update_acount.php', {Name_err: Name_err,Cmt_err:Cmt_err,Birth_err:Birth_err,Email_err:Email_err,Phone_err:Phone_err,Address_err:Address_err}, function(data) {
				
	// 			//$("#up_acount_form")[0].reset();
				
				 
	// 		 });
	// 		}
	// 		 else{
		



		
	// 		 $.post('view/update_acount.php', {Name: Name,Cmt:Cmt,Birth:Birth,Energy:Energy,Email:Email,Phone:Phone,Address:Address}, function(data) {
			
	// 			$("#up_acount_form")[0].reset();
	// 			$(".modal").modal('hide');
				 
	// 		 });

	// 		 }

		
			
		
	// });




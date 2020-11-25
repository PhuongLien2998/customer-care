$(document).ready(function(){
	$(".view_noti").delay(3000).slideUp();
	
	// modal quen mat khau
    $("#btn_sdt").click(function(e) {
		e.preventDefault(); // Tránh load lại form
		var phone = $("#help").val();
		if (phone != '') {
			if(phone.match(/[0-9]{10}/)){
				$.post('quenmatkhau.php', {phone: phone}, function(data) {
				$("#noti_check_md").text('');
				$("#re_password")[0].reset();
				$(".modal").modal('hide');
				$("#noti_phone").html(data);
			 });
			}
			else {
				$("#noti_check_md").css("color", "red");
			$("#noti_check_md").text('Số điện thoại yêu cầu đủ 10 số!');
			}
			 
		}else{
			$("#noti_check_md").css("color", "red");
			$("#noti_check_md").text('Vui lòng không để trống dữ liệu đầu vào!');
		}
			});
			
	

// đổi tên
	$("#btn_rename").click(function(e) {
		e.preventDefault(); // Tránh load lại form
		var name = $("#fname").val();
		if (name != '') {
			 $.post('doiten.php', {name: name}, function(data) {
				$("#noti_check_name").text('');
				$("#re_name")[0].reset();
				$(".modal").modal('hide');
				 $("#noti_name").text(data);
				 
			 });
		}else{
			$("#noti_check_name").css("color", "red");
			$("#noti_check_name").text('Vui lòng không để trống dữ liệu đầu vào!');
		}
	});
// Đổi địa chỉ
	$("#btn_readdr").click(function(e) {
		e.preventDefault(); // Tránh load lại form
		var addr = $("#faddr").val();
		if (addr != '') {
			 $.post('doidiachi.php', {addr: addr}, function(data) {
				$("#noti_check_addr").text('');
				$("#re_addr")[0].reset();
				$(".modal").modal('hide');
				 $("#noti_diachi").text(data);
				 
			 });
		}else{
			$("#noti_check_addr").css("color", "red");
			$("#noti_check_addr").text('Vui lòng không để trống dữ liệu đầu vào!');
		}
	});

})
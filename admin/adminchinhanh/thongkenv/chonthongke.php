<?php  

if (isset($_SESSION['chi_ql'])) {  $id= $_SESSION['chi_ql']; 

	?>
	     <div class="container">
      
            <div class="search row">
                <div class="day col-md-6">
                    <div class="form-group ">
                        <label for="">Ngày bắt đầu <span class="red">(*)</span></label><span class="error red" id="er_name" ></span>
                        <input class="inp-day" type="date" name="ngaykt" id="ngaybd" class="form-control" placeholder="" aria-describedby="helpId"  onblur="checkNgaybd();">
                        
                    </div>
                </div>
                <div class="day col-md-6">
                    <div class="form-group ">
                        <label for="">Ngày kết thúc <span class="red">(*)</span></label><span class="error red" id="er_day" ></span>
                        <input class="inp-day"  type="date" name="ngaykt" id="ngaykt" class="form-control" placeholder="" aria-describedby="helpId"  onblur="checkNgaykt();">
                        
                        </div>
                </div>

            </div>
            <div class="row">
            <div class="col-md-3 " name="left">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">Thống kê nhân viên </li>
                  
                    
                    <li class="list-group-item "> <button type="button" class="danhgia bt" value=" <?php echo $id ?>">Đánh giá</button> </li>
                    <li class="list-group-item "> <button type="button" class="tongdoanhthu bt" onclick="checkRegis()" value=" <?php echo $id ?>">Tổng doanh thu</button> </li>
                    <li class="list-group-item "> <button type="button" onclick="checkRegis()" class="soluongkhachhang bt" value=" <?php echo $id ?>">Số lượng khách hàng đã mua  </button> </li>
                    <li class="list-group-item "> <button type="button" onclick="checkRegis()" class="soluongkhachhangdangcs bt" value=" <?php echo $id ?>">Số lượng khách hàng đang chăm sóc   </button> </li>
                    
                  </ul>
            </div>
            <div class="col-md-9" id="right" >
          
            </div>
        </div>
         </div>
          
        
    </div>
</body>
</html>



       
<?php }?>
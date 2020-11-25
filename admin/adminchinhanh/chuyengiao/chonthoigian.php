<div class="search row">
                <div class="day col-md-5">
                    <div class="form-group ">
                        <label for="">Ngày bắt đầu <span class="red">(*)</span></label><span class="error red" id="er_name" ></span>
                        <input class="inp-day" type="date" name="ngaykt" id="ngaybd" class="form-control" placeholder="" aria-describedby="helpId" onblur="checkNgaybd();">
                        
                    </div>
                </div>
                <div class="day col-md-5">
                    <div class="form-group ">
                        <label for="">Ngày kết thúc <span class="red">(*)</span></label><span class="error red" id="er_day"  ></span>
                        <input class="inp-day"  type="date" name="ngaykt" id="ngaykt" class="form-control" onblur="checkNgaykt();" placeholder="" aria-describedby="helpId">
                        
                        </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info timngay" onclick="checkRegis()">Tìm</button>
                </div>
</div>
<div  class="hienthitheothoigian">
         
     </div>
           
          

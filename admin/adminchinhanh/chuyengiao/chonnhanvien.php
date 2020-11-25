<div class="search row">
                <div class="day col-md-5">
                    <div class="form-group ">
                    <label for="">Số điện thoại chuyển  <span class="red">(*)</span></label><span class="error red" id="er_name" ></span>
                        <input class="inp-day" type="tel" name="ngaykt" id="nvc" class="form-control" placeholder="số điện thoại nhân viên chuyển" aria-describedby="helpId" onblur="checksdt();">
                        
                    </div>
                </div>
                <div class="day col-md-5">
                    <div class="form-group ">
                    <label for="">Số điện thoại nhận  <span class="red">(*)</span></label> <span class="error red" id="er_day" ></span>
                        <input class="inp-day"  type="tel" name="ngaykt" id="nvn" class="form-control" placeholder="số điện thoại nhân viên nhận " aria-describedby="helpId" onblur="checksdt2();">
                        
                        </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info timnhanvien" onclick="checkRegis1()">Tìm</button>
                </div>
</div>
<div class="hienthitheonhanvien">

</div>
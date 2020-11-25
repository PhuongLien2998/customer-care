function checkNgaybd(){
 
    var name =document.getElementById("ngaybd").value;
    var er_name=document.getElementById("er_name");
  
    if(name ==""||name == null){
        $("#ngaybd").focus();
        er_name.innerHTML=" không được bỏ trống";
    }
    else{
        er_name.innerHTML="";
        return name;
    }
    

}
function checkNgaykt(){
 
    var name =document.getElementById("ngaykt").value;
    var er_name=document.getElementById("er_day");
  
    if(name ==""||name == null){
        $("#ngaykt").focus();
        er_name.innerHTML=" không được bỏ trống";
    }
    else{
        er_name.innerHTML="";
        return name;
    }
    

}
function checksdt(){
 
    var name =document.getElementById("nvc").value;
    var er_name=document.getElementById("er_name");
  
    if(name ==""||name == null){
        $("#nvc").focus();
        er_name.innerHTML=" không được bỏ trống";
    }
    else{
        er_name.innerHTML="";
        return name;
    }
    

}
function checksdt2(){
 
    var name =document.getElementById("nvn").value;
    var er_name=document.getElementById("er_day");
  
    if(name ==""||name == null){
        $("#nvn").focus();
        er_name.innerHTML=" không được bỏ trống";
    }
    else{
        er_name.innerHTML="";
        return name;
    }
    

}
function checkRegis1(){
    if(checksdt()&&checksdt1()){
     
    }
    else{
        alert("Vui lòng nhập đủ dữ liệu tìm ");
       
    }
}
function checkRegis(){
    if(checkNgaybd()&&checkNgaykt()){
     
    }
    else{
        alert("Vui lòng nhập đủ dữ liệu tìm ");
       
    }
}
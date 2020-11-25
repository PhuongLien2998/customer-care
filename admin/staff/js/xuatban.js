$(document).ready(function () {
    $(".xuat_ban").click(function (e) {
        var count_e = 0 ;
        e.preventDefault();
        var product = $("#sanpham").val() ;
        var customer = $(".customer").val() ;
        var number = $("#number").val() ;
        if (product == ""){
            $(".error_product").html("Bạn chưa nhập sản phẩm ") ;
            count_e++ ;
        }else{
            $(".error_product").html("") ;
        }
        if (customer == ""){
            $(".error_customer").html("Bạn chưa nhập khách hàng");
            count_e++ ;
        }else{
            $(".error_customer").html("");
        }
        if (number == ""){
            $(".error_number").html("Bạn chưa nhập số lượng");
            count_e++ ;
        }else{
            $(".error_number").html("") ;
        }
        //call AJAX
        if (count_e == 0){
            $.ajax({
                url: 'ajax/invoice.php',
                type: 'POST',
                data: {
                    product:product,
                    customer:customer,
                    number:number
                },
                success: function (data) {
                    $('.detail_invoice').html(data) ;
                    $(document).on('click' , ".xac_nhan" ,function () {
                        // Call ajax update to database
                        $.ajax({
                            url: 'ajax/update.php',
                            type: 'POST',
                            data: {
                                product:product,
                                customer:customer,
                                number:number
                            },
                            success: function (data) {
                                $.notify("Xuất bán thành công !", "success");
                            }
                        });
                    });
                }
            });

        }

    });
})
$(document).ready(function () {
    renumber() ;
    function  renumber() {
        var renum = 1;
        $("tr td strong").each(function() {
            $(this).text(renum);
            renum++;
        });
    }

    $(".delete").click(function () {
        var id_chamsoc = $(this).val();
        //alert(id_chamsoc) ;
        $.ajax({
            url: 'ajax/deltail.php',
            type: 'POST',
            data: {
                id: id_chamsoc
            },
            success: function (data) {

                $('.delete' + id_chamsoc).remove();
                $.notify("Đã xóa tiến trình thành công !", "success");
                renumber();
            }
        });
    });
    $(".delete_custumer").click(function(){


        if(confirm){
            var id = $(this).val() ;
            $.ajax({
                url: 'ajax/customer.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function (data) {
                    $.notify("Đã xóa khách hàng thành công !", "success");
                    $('.custumer' + data).remove();
                }
            });
        }
    }) ;
    $('.alert').delay(5000).slideUp();
})

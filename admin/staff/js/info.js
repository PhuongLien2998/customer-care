$(document).ready(function () {
    check_noti();
    setInterval(check_noti, 3000);
    function check_noti() {
        $.ajax({
            url: 'ajax/alert.php',
            type: 'POST',
            success: function (data) {
                $(".number_info").html(data);
                // console.log(data);
            }
        });
    }
    $(document).on('click', '.confirm', function () {
        var id = $(this).val();
        $.ajax({
            url: 'ajax/confirm.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                if (data == 1) {
                    $.notify("Đã nhận khách hàng thành công !", "success");
                } else {
                    $.notify("Nhận khách hàng không thành công!", "info");
                }
                $('.del' + id).remove();
            }
        });
    });

    $(document).on('click', '.cancel', function () {
        var id = $(this).val();
        $.ajax({
            url: 'ajax/cancel.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                if (data == 1) {
                    $.notify("Đã hủy nhận khách hàng thành công !", "success");
                } else {
                    $.notify("Hủy nhận khách hàng không thành công!", "info");
                }
                $('.del' + id).remove();
            }
        });

    })
    //load notify 
    $('.load_info').click(function () {
        load_info();
        setInterval(load_info, 4000);

        function load_info() {
            $.ajax({
                url: 'ajax/info.php',
                type: 'POST',
                success: function (data) {
                    $('.container').html(data);
                }
            });
        }

    });
});
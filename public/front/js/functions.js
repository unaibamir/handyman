/**
 * Created by Unaib on 12/6/2017.
 */

$(function () {
    /**
     *  Setting up Select2 Library
     * */
    $(".select2").select2();

    $(".show_filters").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("btn-active-green");
        $("#job-filters").slideToggle("fast");
    });

    $(".delete_user").on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var user_id = $(this).attr('id');
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: "Deleted!",
                    text: 'Delete operation has been completed!',
                    type: 'success',
                    showConfirmButton: false
                });
                setTimeout(function(){ window.location.replace(href); }, 1000);

            } else {
                swal("Cancelled", "Delete operation has been canceled!", "error");
            }
        });
    });


    $(".confirm_swal").on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var msg_top = $(this).data('msg-top');
        var msg_bottom = $(this).data('msg-bottom');
        var msg_type = $(this).data('msg-type');

        swal({
                title: msg_top,
                type: msg_type,
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: "Deleted!",
                        text: 'Delete operation has been completed!',
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function(){ window.location.replace(href); }, 1000);

                } else {
                    swal("Cancelled", "Delete operation has been canceled!", "error");
                }
            });

    });

});
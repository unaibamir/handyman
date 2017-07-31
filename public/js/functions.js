/**
 * Created by Unaib on 12/6/2017.
 */

$(function () {
    /**
     *  Setting up Select2 Library
     * */
    $(".select2").select2();

    /**
     *  Footable Library
     * */

    $('.footable').footable({ paginate:false });

    var url = window.location.href;
    $('#side-menu a').filter(function() {
        return this.href == url;
    }).parent('li').addClass('active');


    $('.delete_client').click(function (event) {
        event.preventDefault();
        var href = $(this).attr('href');
        var user_id = $(this).attr('id');
        var token = $(this).data('token');
        swal({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                showLoaderOnConfirm: true,
                closeOnConfirm: false
            },
            function(){

                $.ajax({
                    url: href,
                    type: 'post',
                    data: {_method: 'delete', _token :token, action: 'ajax'},
                    success: function(result) {
                        console.log(result);
                        if ( result.status == 202 ) {
                            swal({
                                title: "Deleted!",
                                text: result.data.msg,
                                showConfirmButton: false,
                                type:   'success'
                            });
                            setTimeout(function(){ window.location.replace(result.data.route); }, 1000);
                        }
                        else {
                            swal("Oops...", "Something went wrong!", "error");
                        }
                    }
                });

            });
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
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: "Deleted!",
                    text: 'User has been deleted!',
                    type: 'success',
                    showConfirmButton: false,
                });
                setTimeout(function(){ window.location.replace(href); }, 1000);

            } else {
                swal("Cancelled", "User deletion canceled!", "error");
            }
        });
    });


    $(".submit-user").on('click', function(e){
        e.preventDefault();
        $(".gllpSearchButton").click();
        $(this).closest('form').submit();
    });
});
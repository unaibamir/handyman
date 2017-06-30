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


    $('.delete_client').click(function (event) {
        event.preventDefault();
        var href = $(this).attr('href');
        var client_id = $(this).attr('id');
        var token = $(this).data('token');
        swal({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: href,
                    type: 'post',
                    data: {_method: 'delete', _token :token, action: 'ajax'},
                    success: function(result) {
                        if ( result.status == 202 ) {
                            swal({
                                title: "Deleted!",
                                text: result.data.msg,
                                showConfirmButton: false,
                                type:   'success'
                            });
                            setTimeout(function(){ window.location.replace(result.data.route); }, 1000);
                        }
                    }
                });

            });
    });
});
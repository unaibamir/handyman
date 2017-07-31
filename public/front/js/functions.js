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
        $(".job-filters").slideToggle("fast");
    });

});
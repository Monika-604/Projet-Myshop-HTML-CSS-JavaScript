$(document).ready(function () {
    $(".filter .ft").click(function () {
        $(this).children("div").slideToggle();
    });
    $('header .fa-navicon').click(function () {
        $('.mobile-menu').slideToggle();
    });
    $(".filter-box").click(function () {
        $('.filter-content').slideToggle();
    });
    /*-----------------------------------*/
});

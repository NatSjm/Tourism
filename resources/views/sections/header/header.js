if (!$("body").hasClass("index")){
    $('.header_top').addClass('mod_fixed');
    $('.header_bottom').addClass('mod_fixed');
}

//menu

var addition = $(".menu-mobile_wrapper");

    $(".hamburger").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("is-active");
        addition.slideToggle(500);
    });



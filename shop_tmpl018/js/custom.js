$(document).ready(function () {
// Search-Bar On Click
    $(".glyphicon-search").click(function () {
        $(".search_hold form").fadeIn();
        $("#mod_search_searchword").focus();
        $('.search_background').toggle();
//        $(this).hide();
    });
    $(".search_background").click(function () {
        $(".search_hold form").fadeOut();
        $(".search_background").hide();
        $(".glyphicon-search").removeClass("glyphicon_move");
        $(".glyphicon-search").fadeIn();
    });



//    $('.mod_specific .shop_products').owlCarousel({
//        loop: true,
//        margin: 30,
//        autoplay: true,
//        lazyload: true,
//        navText: false,
//        nav: false,
//        dots: true,
//
//        responsiveClass: true,
//        responsive: {
//            0: {
//                items: 1,
//                slideBy: 1,
//                nav: false,
//                loop: true
//            },
//            769: {
//                items: 1,
//                slideBy: 1,
//                nav: false,
//                loop: true
//            },
//            1000: {
//                items: 2,
//                slideBy: 2,
//                nav: false,
//                loop: true
//            }
//        }
//    });
    


    var sliderh = $('.gw_slide.actiuris img').height();
    $('.cool_images').css('height', sliderh + 'px');

    // Scroll Top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 700);
        return false;
    });


    $('.user_icon').click(function () {
        $(this).siblings('.logni_btns').slideToggle('fast');
    });


    var check = true;
    $('.shop_wish_list button').click(function () {
        if (check) {
            $(this).find('svg path').css({"fill": "#e65540", " stroke": "red"});
            check = false;
        } else {
            $(this).find('svg path').css({"fill": "none", " stroke": "#5C5C5C"});
            check = true;
        }
    });

//    search bar

    $('.activelang').prependTo('.lang_switcher_block');
    $('.activelang').click(function () {
        return false;
    });
    
//language on click

    $(".activelang").click(function () {

        $(".lang_switcher_block > a").toggleClass('clicked');

    });

    $('.videobg iframe').each(function () {
        var v = $(this).width();
        $(this).height(v / 16 * 9);
    });



    var spech = $('.mod_specific_big').height();
 if(spech>100){
      $('.spec_carousel_holder').css('max-height', spech + 'px');
 }
   






});



$(window).resize(function (event) {
    var sliderh = $('.gw_slide.actiuris img').height();
    $('.cool_images').css('height', sliderh + 'px');

});
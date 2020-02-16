
$(window).scroll(function (event) {

    // Parallax background effect
//    $('.free_content1').css({'background-position-Y': 0 + (window.pageYOffset * 0.02) + '%'});
});


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
    // Adding Owl-Carousel By Parent

//    $('.article_carousel').find('.modarticle-items').addClass('owl-carousel');

    var owl = $('.owl-carousel');
    $('#section2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        navText: false,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                slideBy: 1,
                nav: true,
                loop: true
            },
            500: {
                items: 3,
                slideBy: 3,
                nav: true,
                loop: true
            },
            769: {
                items: 3,
                slideBy: 3,
                nav: true,
                loop: true
            },
            1000: {
                items: 5,
                slideBy: 1,
                nav: true,
                loop: true
            }
        }
    });



    $('.singlearticles .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
//        autoplay: true,
        navText: false,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                slideBy: 1,
                nav: true,
                mouseDrag: false,
                touchDrag: true,
                loop: true
            },
            769: {
                items: 1,
                slideBy: 1,
                nav: true,
                mouseDrag: false,
                touchDrag: true,
                loop: true
            },
            1000: {
                items: 1,
                slideBy: 1,
                nav: true,
                loop: true
            }
        }
    });

    var sliderh = $('.gw_slide.actiuris img').height();
    $('.cool_images').css('height', sliderh + 'px');

// Scroll Top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 700);
        return false;
    });

// Scroll to element

//    var scrollLink = $('.scroll_down');
//
//    // Smooth scrolling
//    scrollLink.click(function (e) {
//        e.preventDefault();
//        $('body,html').animate({
//            scrollTop: $('#green_sector').offset().top
//        }, 1000);
//    }); 

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 280) {
            $(".header_bot").addClass("fixed");
        } else {
            $(".header_bot").removeClass("fixed");
        }
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

    $(".menu_button").click(function () {
        $("#supermenu").slideToggle();
        $(".menu_button_close").fadeToggle(0);
        $(this).fadeToggle(0);
    });
    $(".menu_button_close").click(function () {
        $("#supermenu").slideToggle();
        $(".menu_button").fadeToggle(0);
        $(this).fadeToggle(0);
    });


    //Filter button function
    $(".filter_button").click(function () {
        $(".filter").fadeToggle();
        $(".filter_before").fadeToggle();
    });
    $(".filter_before").click(function () {
        $(".filter").fadeToggle();
        $(".filter_before").fadeToggle();
    });

    $(".position1").click(function () {
        $(".position2_wrapper").slideToggle();
    });
    $(".position2 button").click(function () {
        $(".position2 button").fadeToggle();
        $(".position2 button").fadeToggle();
        $(".position2_wrapper").slideToggle();
    });
}
);

$(window).resize(function (event) {
    var sliderh = $('.gw_slide.actiuris img').height();
    $('.cool_images').css('height', sliderh + 'px');
});



$(document).ready(function () {
    $("a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        } // End if
    });
});
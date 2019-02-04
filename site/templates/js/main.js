$(document).ready(function () {


    $("#owl-demo").owlCarousel({
        nav: !0,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        loop: !0,
        slideSpeed: 500,
        paginationSpeed: 200,
        items: 1,
        animateOut: "fadeOut",
        startPosition: 0,
        itemsDesktop: 1,
        itemsDesktopSmall: 1
    });

    $(".right_panel span").click(function () {
        $(this).siblings("ul").toggleClass("active")
    });

    /////////////////////Menu open/////////

    $("header .burger").click(function () {
        $("#left_menu").addClass("open");
        $("header").addClass("off");
        $("#home_sld .owl-nav").fadeOut();
    })

    $("#left_menu .item .close_menu").click(function () {
        $("header").removeClass("off");
        $("#left_menu").removeClass("open");
        $("#home_sld .owl-nav").fadeIn();
    })

    $("#left_menu .item .menu .bot_panel span").click(function () {
        $(this).siblings("ul").slideToggle(400);
    })


    $("#gallery_sld.owl-carousel").owlCarousel({
        nav: !0,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        center: true,
        loop: true,
        items: 2,
        margin: 24,
        responsive: {
            0: {
                margin: 2,
                nav: !1,

            },
            320: {
                margin: 2,
                nav: !1,
            },
            767: {
                items: 2,

            },
        }
    });
////////////////////////////////////////////////

var $owl = $('#menu_sld');

$owl.children().each(function (index) {
    $(this).attr('data-position', index); // NB: .attr() instead of .data()
});

$owl.owlCarousel({
    center: true,
    loop: true,
    items: 4,
    margin: 20,
    responsive: {
        0: {
            items: 2
        },
        767: {
            items: 4
        },
    }
});
$("#menu_sld .menu_item").click(function () {
        $("#menu_sld").find(".active_").removeClass("active_")
        $(this).addClass("active_");
      });
$(document).on('click', '.owl-item>div', function () {
    $owl.trigger('to.owl.carousel', $(this).data('position'));
});

    $('.cal_date').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('.cal_time').datetimepicker({
        format: 'LT'
    });


    $('.serv_sld_pop').owlCarousel({
        center: true,
        items: 2,
        loop: true,
        margin: 20,
        responsive: {
            0: {
                items: 2
            },
            767: {
                items: 2
            },
        }
    });

    $("#services_page .serv_list .item.bday_").click(function () {
        $(".pop_up.bday").fadeIn(1000);
    })
    $("#services_page .serv_list .item.banquet_").click(function () {
        $(".pop_up.banquet").fadeIn(1000);
    })
    $(".pop_up .close_").click(function () {
        $(".pop_up").fadeOut(1000);
    })
    $(".thanks .bg .desc .close_ img").click(function () {
        $(".thanks").fadeOut(600);
    });



    $(document).ready(function () {
        $('.video').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true,
            gallery: {
				enabled: true
			}
        });
    });
    
    $(document).ready(function () {
        $('.image').magnificPopup({
            disableOn: 320,
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true,
            gallery: {
				enabled: true
			}
        });
    });


  
    // -----------custom

    $(document).ready(function() {

        $(".photo_btn").click(function(event) {
            event.preventDefault();

            $(".more_photos").show()

        });
    });




    $(".numeric").on("keypress keyup blur", function(event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });


    $(".s").click(function(event) {
        var service = $(this).data("service");
        $('.service_input').val(service);
      

    });

    // -----------custom




})
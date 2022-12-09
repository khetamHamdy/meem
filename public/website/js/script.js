$(document).ready(function(){
    
    var rtl = false;
    
    if($("html").attr("lang") == 'ar'){
         rtl = true;
    }
    
    /*header-fixed*/
    $(window).scroll(function(){
            
        if ($(window).scrollTop() >= 100) {
            $('#header').addClass('fixed-header');
        }
        else {
            $('#header').removeClass('fixed-header');
        }
              
    });
    $('.scroll, .mmenu a').on('click', function () {
        $('html, body').animate({

            scrollTop: $('#' + $(this).data('value')).offset().top

        }, 1000);

        $("body,html").removeClass('menu-toggle');

        $(".hamburger").removeClass('active');
    });
    /*open menu*/
    
    $(".hamburger").click(function(){
        
        $(".main_menu").slideToggle();
        if($(this).hasClass('is-closed')) {
            $(this).removeClass('is-closed');
        }else{
            $('.hamburger').addClass('is-closed');
        }
    });
    $(".is-closed").click(function(){
        $(this).removeClass('is-closed');
    });
   
    $(".btnSt").click(function(e) {
        e.preventDefault();
    });
    /*page-scroll*/
    
    
    $('#slide-home').owlCarousel({
        loop: true,
        rtl: rtl,
        responsiveClass: true,
        items: 1,
        dots: true,
        nav: false,
        autoplay: false,
//        navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
    });
    
    $(".coloum4").owlCarousel({
        loop: true,
        margin: 15,
        responsiveClass: true,
        singleItem:true,
        center: false,
        startPosition: 1,
        responsive: {
            0: {
                items: 1,
            },
            992: {
                items: 5,
            },
            1199: {
                items: 5,
            }
        },
        dots: false,
        nav: true,
        rtl: rtl,
        autoplay: false,
        navText:['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>']
    });
    
    
    
    /**============FOCUS CONTACT============**/
    $(".form-contact .form-group .form-control").focus(function(){

             $(this).parent().addClass('hasValue');

        });
        $(".form-contact .form-group .form-control").focusout(function(){

            var val = $(this).val();

            if(val === ''){

                 $(this).parent().removeClass('hasValue');

            } else{

                $(this).removeClass('hasError');

            }

    })

})
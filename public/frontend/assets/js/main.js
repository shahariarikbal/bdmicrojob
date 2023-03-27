$(document).ready(function() {
    // Navbar Toggle Button For Mini Device
    $('.nav-toggle-btn').click(function() {
        $('.nav-main').toggleClass('menu-visible');
        $('body').toggleClass('body-overflow');
    });

    // fixed header
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop >= 100) {
            $('body').addClass('fixed-header');
        } else {
            $('body').removeClass('fixed-header');
        }
    });

    //active
    $(".nav-item-main-link").click(function() {
        $(".nav-item-main-link").removeClass("active");
        $(this).addClass("active");
    });

    //Greetings
    $('.input-firstname').keyup(function() {
        var getText = $(this).val();
        console.log(getText);
        $('.greetings-name').html(getText);
    });

    $('.input-lastname').keyup(function() {
        var getText = $(this).val();
        console.log(getText);
        $('.greetings-surname').html(getText);
    });
});
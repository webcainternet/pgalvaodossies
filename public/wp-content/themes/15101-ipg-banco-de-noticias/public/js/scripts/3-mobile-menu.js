$('.navigation--mobile-right').insertBefore('.main-content');

$('.js-highlight-nav-summ-mobile').click(function(e){
    e.preventDefault();

    if ($('.mobile-menu').hasClass('mobile-menu--active')) {
        $('.mobile-menu').removeClass('mobile-menu--active');
    } else {
        $('.mobile-menu').addClass('mobile-menu--active');
    }

    if ($('.main-content').hasClass('main-content--active')) {
        $('.main-content').removeClass('main-content--active');
    } else {
        $('.main-content').addClass('main-content--active');
    }

    if ($('body').hasClass('body--active')) {
        $('body').removeClass('body--active');
    } else {
        $('body').addClass('body--active');
    }
});

var scrollToPointMobile = function(top) {
    $('html, body').animate({
        scrollTop: top
    }, 300);
};

$('.js-mobile-menu__link').click(function(e){
    e.preventDefault();

    var $this = $(this);

    var target = $this.attr('href');

    var mainTop = parseInt($('.js-highlight-nav').outerHeight(true)) * 2;

    var top = $(target).offset().top - 60;

    $('.mobile-menu').toggleClass('mobile-menu--active');
    $('.main-content').toggleClass('main-content--active');
    $('body').toggleClass('body--active');

    scrollToPointMobile(top);
});

/* globals phpVars, swal, FB */

var $window = $(window);

function openShareWindow(url, title, width, height) {
    var leftposition, topposition;
    leftposition = (window.screen.width / 2) - ((width / 2) + 10);
    topposition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowfeatures = [
        'status=no,height=' + height,
        ',width=' + width,
        ',resizable=yes,left=' + leftposition,
        ',top=' + topposition,
        ',screenx=' + leftposition,
        ',screeny=' + topposition,
        ',toolbar=no,menubar=no',
        ',scrollbars=no,location=no',
        ',directories=no'
    ].join('');
    window.open(url, title, windowfeatures);
    return false;
}

function setIntroHeight() {
    var windowHeight = $(window).outerHeight();
    var headerHeight = $('.header').outerHeight();
    var footerHeight = $('.footer').outerHeight();


        $('.js-full-page').css({
            height: windowHeight
        });
        $('.js-margin-top').css({
            marginTop: headerHeight
        });
        if ($(window).width() >= 1099) {
            $('.js-full-page-no-header').css({
                height: windowHeight - headerHeight - footerHeight
            });
        } else if ($(window).width() < 1099) {
            $('.js-full-page-no-header').css({
                height: 'auto'
            });
        }
}

function toggleSearch() {
    $('.js-toggle-search').click(function(e){
        e.preventDefault();

        var $cover = $('.header__cover');
        var $coverActive = 'header__cover--active';
        var $body = $('body');
        var $bodyActive = 'body--active';
        var $brand = $('.header__brand');
        var $brandActive = 'header__brand--active';
        var $search = $('.header__search');
        var $searchActive = 'header__search--active';

        if ($cover.hasClass($coverActive)) {
            $cover.removeClass($coverActive);
            $body.removeClass($bodyActive);
            $brand.removeClass($brandActive);
            $search.removeClass($searchActive);
        } else {
            $cover.addClass($coverActive);
            $body.addClass($bodyActive);
            $brand.addClass($brandActive);
            $search.addClass($searchActive);
        }
    });
}

function toggleDropdown() {
    $('.js-toggle-menu').click(function(e){
        e.preventDefault();

        var $this = $(this);
        var key = $this.data('key');
        var $menu = $('.header__menu[data-key="' + key + '"]');

        if (!$menu.hasClass('header__menu--active')) {
            $('.header__menu').slideUp(250, function() {
                $('.header__menu').removeClass('header__menu--active');
            });

            $menu.slideDown(250, function() {
                $menu.addClass('header__menu--active');
            });
        } else {
            $('.header__menu').slideUp(250, function() {
                $('.header__menu').removeClass('header__menu--active');
            });
        }
    });
}

setIntroHeight();
$(window).resize(setIntroHeight);

toggleSearch();

toggleDropdown();

if ($(window).outerWidth() < 1099) {
    $('.filters__select').selectize({
        sortField: 'text'
    });
} else {
    $('.filters__select').chosen();
}

$('select[name="ies"]').on('change', function(e) {
    e.preventDefault();

    var $this = $(this);
    var state = $this.val();

    $.ajax({
        method: 'GET',
        url: phpVars.ajaxUrl,
        data: {
            action: 'return_city',
            state_slug: state
        }
    }).done(function(data) {
        state = state.toUpperCase();
        $('select[name="ici"]').html('<option value="-">Todas as cidades de ' + state + '</option>');

        if ($this.val() !== '-') {
            var json = data,
            obj = JSON.parse(json);

            $.each(obj, function( index, value ) {
                $('select[name="ici"]')
                    .append($('<option></option>')
                    .val(value.slug)
                    .html(value.name));
            });

            $('select[name="ici"]').trigger('chosen:updated');
        }
    })
    .fail(function(msg) {
        alert('Erro ao buscar as Cidades. Por favor, contate o administrador!');
    });
});

$(document).bind('keydown',function(e){
    if ( e.which !== 27 ) { return; }

    if ($('.header__cover--active').length > 0) {
        $('.js-toggle-search').click();
    }
});

var $single = $('.single .main-content');

var $page = $('.page .main-content');

$single.find('p').selectionSharer();
$single.find('h1').selectionSharer();
$page.find('p').selectionSharer();
$page.find('h1').selectionSharer();


$('body').on('click', '.js-gplus-share', function(e) {
    e.preventDefault();
    var $this = $(this).parents('.js-shared-container');
    var shareUrl = $this.attr('data-url');
    var url = 'https://plus.google.com/share?url=' + encodeURIComponent(shareUrl);
    openShareWindow(url, 'Google Plus', 600, 600);
});

$('body').on('click', '.js-fb-share', function(e){
    e.preventDefault();
    var $this = $(this).parents('.js-shared-container');
    var shareUrl = $this.attr('data-url');
    var title = $this.attr('data-title');
    var pic = $this.attr('data-picture');
    var caption = $this.attr('data-caption');
    var description = $this.attr('data-description');

    FB.ui(
        {
            method: 'feed',
            name: title,
            link: shareUrl,
            picture: pic,
            caption: caption,
            description: description
        },
        function(response) {
            if (response && response.post_id) {
                swal('Post publicado com sucesso', '', 'success');
            } else {
                swal('Erro ao publicar post', '', 'warning');
            }
        }
    );
});

$('body').on('click', '.js-twitter-share', function(e){
    e.preventDefault();
    var $this = $(this).parents('.js-shared-container');
    var shareUrl = $this.attr('data-url');
    var title = $this.attr('data-title');
    var message = title + ' ' + shareUrl;
    var url = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(message);
    openShareWindow(url, 'TTR', 600, 600);
});

var highlightNav = function($) {
    var prefix = 'js-highlight-nav';
    var cPrefix = '.' + prefix;
    var timing = {
        fast: 150,
        slow: 300
    };

    var itemActual = 0;

    var $container = $(cPrefix);
    var $content;
    var contentMs;
    var map = false;

    var setVars = function() {
        $content = $(cPrefix + '-sections');
        var mainTop = parseInt($('.js-highlight-nav').parent().outerHeight()) * 2;
        contentMs = {
            top: $content.offset().top,
            height: $content.outerHeight(true)
        };
        map = {};

        var $section = $(cPrefix + '-section');
        $section.each(function() {
            var $this = $(this);
            var index = $this.attr('data-index');
            var top = $this.offset().top;
            map[index] = top;
        });
    };

    var scrollToPoint = function(top) {
        $('html, body').animate({
            scrollTop: top
        }, timing.fast);
    };

    var goToBinding = function(e) {
        e.preventDefault();

        var mainTop = parseInt($('.js-highlight-nav').outerHeight(true)) * 2;
        var $this = $(this);
        var target = $this.attr('href');

        if (typeof target === 'undefined') {
            target = '#' + $this.attr('data-anchor');
        }

        var top = $(target).offset().top - mainTop;

        scrollToPoint(top);

        var actClass = 'navigation__summary--active';
        var $tgt = $('.navigation__summary');

        if ($tgt.hasClass(actClass)) {
            $tgt.slideUp(250, function() {
                $tgt.removeClass(actClass);
            });
        }
    };

    var goToTopBinding = function(e) {
        e.preventDefault();
        scrollToPoint(0);
    };

    var fillProgressBar = function(pos) {
        if (!map) { return; }

        pos = parseInt($(document).scrollTop(), 10);
        var targetIndex = 0;

        for (var index in map) {
            var top = parseInt(map[index], 10);
            if (top > pos) { continue; }
            index = parseInt(index, 10);
            if (targetIndex < index) { targetIndex = index; }
        }

        var perc = 0;
        var $section = null;
        var style = null;

        for (var i = 0; i < targetIndex; i++) {
            $section = $(cPrefix + '-dash[data-index=' + i + ']');
            style = $section.attr('style');
            style = style.match(/([0-9]{1,3})/gi, '\1')[0];
            style = parseInt(style, 10);
            perc += style;
        }

        $section = $(cPrefix + '-section[data-index=' + targetIndex + ']');
        var $sectionNav = $(cPrefix + '-dash[data-index=' + targetIndex + ']');
        style = $sectionNav.attr('style');
        style = style.match(/([0-9]{1,3})/gi, '\1')[0];
        style = parseInt(style, 10);

        var partialPercUpper = pos - $section.offset().top;

        if (targetIndex === $(cPrefix + '-section').length - 1) {
            // FIXME: Make it smarter
            // Number taken from margin-bottom
            // Strange bug, caused by lack of comprehension
            partialPercUpper += 380;
        }

        var partialPerc = partialPercUpper / $section.outerHeight(true);
        partialPerc = parseInt(partialPerc * 100, 10);
        partialPerc = (style * partialPerc) / 100;

        perc += partialPerc;

        $(cPrefix + '-fill-bar').css({
            width: perc + '%'
        });
    };

    var setDashesWidth = function() {
        var $section = $(cPrefix + '-section');
        var total = $section.length;
        var count = 0;
        var totalPerc = 0;

        $section.each(function() {
            var $this = $(this);
            var index = $this.attr('data-index');
            var height = $this.outerHeight(true);
            var perc = height / contentMs.height;
            perc = Math.floor(perc * 100, 10);
            $(cPrefix + '-dash[data-index=' + index + ']').css({
                width: perc + '%'
            });

            totalPerc += perc;
            count++;

            if (count !== total) { return; }
            if (totalPerc > 99) { return; }

            var rmd = 100 - totalPerc;
            perc += rmd;
            $(cPrefix + '-dash[data-index=' + index + ']').css({
                width: perc + '%'
            });
        });
    };

    var setCurrent = function() {
        if (!map) { return; }

        var pos = parseInt($(document).scrollTop());
        var targetIndex = 0;

        for (var index in map) {
            var top = parseInt(map[index], 10);

            if (top > pos) { continue; }
            index = parseInt(index, 10);
            if (targetIndex < index) { targetIndex = index; }
        }

        var $section = $(cPrefix + '-section[data-index=' + targetIndex + ']');
        var $title = $section.find(cPrefix + '-checkpoint');
        var title = $title.text();

        $content.attr('data-current', targetIndex);

        $(cPrefix + '-title').html(title);
    };

    var scrollBinding = function(e) {
        setVars();
        var pos = $(document).scrollTop();
        var activeClass = 'navigation--active';
        var active = $container.hasClass(activeClass);

        if (pos <= contentMs.top) {
            if (active) { $container.removeClass(activeClass); }
            return;
        }

        if (!active) { $container.addClass(activeClass); }

        var teste = $('.js-highlight-nav-sections').scrollTop();

        fillProgressBar(pos);
        setCurrent();
    };

    var resizeBinding = function(e) {
        setVars();
        setDashesWidth();
        var pos = $(document).scrollTop();
        fillProgressBar(pos);
        setCurrent();
    };

    var highlightsNavSum = function(e) {
        e.preventDefault();
        var actClass = 'navigation__summary--active';
        var $tgt = $('.navigation__summary');

        if ($tgt.hasClass(actClass)) {
            $tgt.slideUp(250, function() {
                $tgt.removeClass(actClass);
            });
            return false;
        }

        $tgt.slideDown(250, function() {
            $tgt.addClass(actClass);
        });
    };

    var nextSection = function(e) {
        e.preventDefault();

        var itemSection = parseInt($('.js-highlight-nav-sections').attr('data-current'));

        itemSection = itemSection + 1;

        var $section = $('.js-highlight-nav-section[data-index="' + itemSection + '"]');

        scrollToPoint($section.offset().top);

        itemActual = itemSection;
    };

    var previousSection = function(e) {
        e.preventDefault();

        var itemSection = parseInt($('.js-highlight-nav-sections').attr('data-current'));

        if (itemActual <= itemSection) {
            itemSection = itemSection - 1;
        } else {
            itemSection = itemSection;
        }

        var $section = $('.js-highlight-nav-section[data-index="' + itemSection + '"]');

        scrollToPoint($section.offset().top);

        itemActual = itemSection;
    };

    var initialize = function() {
        $('body').find('.js-go-to-top').click(goToTopBinding);
        if ($container.length < 1) { return; }

        setVars();

        $(cPrefix + '-goto').click(goToBinding);

        $container.find('.js-highlight-nav-summ').click(highlightsNavSum);

        $container.find('.js-highlight-nav-previous').click(previousSection);
        $container.find('.js-highlight-nav-next').click(nextSection);

        var $window = $(window);

        $window.scroll(scrollBinding);
        $window.resize(resizeBinding);
        setDashesWidth();
        setCurrent();
    };

    return {
        initialize: initialize
    };
};

highlightNav(jQuery).initialize();

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

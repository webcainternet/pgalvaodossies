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

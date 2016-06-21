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

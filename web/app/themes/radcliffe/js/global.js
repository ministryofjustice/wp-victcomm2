jQuery(document).ready(function($) {


    // toggle blog-menu
    $(".nav-toggle").on("click", function() {
        $(this).toggleClass("active");
        $(".mobile-menu-container").slideToggle();
    });


    // Toggle search form
    $(".search-toggle").on("click", function() {
        $(this).toggleClass("active");
        $(".header-search-block").slideToggle(500, function() {
            $(".header-search-block #s").focus();
        });
        return false;
    });


    // Hide mobile-menu > 1000
    $(window).resize(function() {
        if ($(window).width() > 1000) {
            $(".nav-toggle").removeClass("active");
            $(".mobile-menu-container").hide();
        }
    });


    // Hide header search block at < 1000
    $(window).resize(function() {
        if ($(window).width() < 1000) {
            $(".search-toggle").removeClass("active");
            $(".header-search-block").hide();
        }
    });


    // Smooth scroll to the top
    $('.tothetop').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });


    // resize videos after container
    var vidSelector = ".post iframe, .post object, .post video, .widget-content iframe, .widget-content object, .widget-content iframe";
    var resizeVideo = function(sSel) {
        $(sSel).each(function() {
            var $video = $(this),
                $container = $video.parent(),
                iTargetWidth = $container.width();

            if (!$video.attr("data-origwidth")) {
                $video.attr("data-origwidth", $video.attr("width"));
                $video.attr("data-origheight", $video.attr("height"));
            }

            var ratio = iTargetWidth / $video.attr("data-origwidth");

            $video.css("width", iTargetWidth + "px");
            $video.css("height", ($video.attr("data-origheight") * ratio) + "px");
        });
    };

    resizeVideo(vidSelector);

    $(window).resize(function() {
        resizeVideo(vidSelector);
    });

    $(".header-inner a").on('focus', function(event) {

        // first deactivate any open sub menus
        var subMenu = $('.main-menu .show-sub-menu');
        subMenu.first().removeClass('show-sub-menu');

        // change z-index of li elements in sub-menus
        var li = $('.main-menu li.child-has-focus');
        li.first().removeClass('child-has-focus');

    });

    $(".sub-menu a").on('focus', function(event) {

        // activate the submenu of the current menu item
        var subMenu = $(event.target).closest('.sub-menu');
        subMenu.first().addClass('show-sub-menu');

        // increase the z-index of the current menu item
        var li = $(event.target).closest('li');
        li.first().addClass('child-has-focus');

    });

    // accordion
    $(".accordion-with-icons__item-summary").click(function(el) {
        $(el.currentTarget)
            .closest('.accordion-with-icons__item')
            .toggleClass('accordion-with-icons__item--expanded');
        if ($(el.currentTarget).attr('aria-expanded') === 'true') {
            $(this).attr('aria-expanded', 'false');
        } else {
            $(this).attr('aria-expanded', 'true');
        }
    });

});
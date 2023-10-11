(function ($) {
    $(document).ready(function () {

        // slideout Navigation
        var slideoutNav = $('.slideout-nav'),
            slideoutNavicon = $('.slideout-navicon'),
            naviconClose = $('.navicon-close'),
            body = $('body'),
            site = $('.site');

        slideoutNavicon.on("click", handleSlideoutNav);
        naviconClose.on("click", handleSlideoutNav);

        site.on('click', function (e) {
            handlePageOnNavSlide(slideoutNav, e, handleSlideoutNav);
        });

        function handleSlideoutNav() {
            slideoutNav.toggleClass('slideout-nav--open');
            body.toggleClass('body--overflow-hide');
        }

        function handlePageOnNavSlide(slideoutNav, e, handleSlideoutNav) {
            if (slideoutNav.hasClass('slideout-nav--open')) {
                e.preventDefault();
                handleSlideoutNav();
            }
        }

        // Show mobile sub menu on first click if the top-level menu items have child pages
        $('.mobile-navigation .menu > .menu-item-has-children > a').one('click', false);
        $('.mobile-navigation .menu > .menu-item-has-children > a').click(function() {
            $(this).next('.sub-menu').show();
        });

        // notice bar close functionality
        $('.notice-bar button').click( function() {
            $('.notice-bar').slideUp('normal');
        });
        
    });
})(jQuery);
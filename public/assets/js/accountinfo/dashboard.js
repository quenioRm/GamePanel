window._abyss=window._abyss||{},window._abyss.dashboard=function(a,o){a.init=function(){s()};var s=function(){1<o(".js-playingBdo").length?o(".js-bdoSliderWrap").owlCarousel({loop:!0,nav:!0,dots:!1,margin:10,items:1}):o(".js-bdoSliderWrap").addClass("no_slide"),0<o(".js-playingBox").length&&1<o(".js-reSliderItem").length?o(".js-reSliderWrap").owlCarousel({loop:!0,nav:!0,dots:!1,margin:10,items:1,autoplay:!0,autoplayTimeout:7e3,autoplayHoverPause:!0}):o(".js-reSliderWrap").addClass("no_slide")};return a}(window._abyss.dashboard||{},jQuery);
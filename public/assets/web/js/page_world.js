$(function() {
    $('.slider-races').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        // centerMode: true,
        // variableWidth: false,
        // infinite: true,
        infinite: false,
        cssEase: 'linear',
        variableWidth: true,
        prevArrow: '<button class="btn-prev slick-arrow"><span class="icon-prev"></span></button>',
        nextArrow: '<button class="btn-next slick-arrow"><span class="icon-next"></span></button>',
        dots:false,
        arrows : false,
        responsive: [
            {
              breakpoint: 1900,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 800,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 400,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows : true,
              }
            }
        ]
    });
    //click on races list
    $('.races-list a').on('click', function(elem) {
        var slide = $(this).attr('data-slide');
        $('.slider-races').slick('slickGoTo', parseInt(slide));
        elem.preventDefault();
    })
    //slider change and change active race
    $('.slider-races').on('beforeChange', function(event, { slideCount: count }, currentSlide, nextSlide){
        $('.races-list').find('li').removeClass('active');
        $(".races-list").find(`[data-slide='${nextSlide}']`).closest('li').addClass('active');
    })
    //popup for skills
    $('.popup-with-skills').magnificPopup({
      type: 'inline',

      fixedContentPos: true,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in',
      callbacks: {
        elementParse: function(item) {
          $(item.src).find('.wrapper').html(
            $(item.el).closest('.races-descr').find('.race-skills').clone()
          );
        },
      }
    })
})

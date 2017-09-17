/**
 * @file
 *  All Configuration for department.
 */
(function($) {
  Drupal.behaviors.clients_slick_config = {
    attach: function (context, settings) {
      $(".fullpage > section:not(:last-child)").append("<div class='scroll-down'></div>");

      $(".fullpage").fullpage({
        // navigation: true,
        // navigationPosition: 'right',
        slidesNavigation: true,
        // slidesNavPosition: 'top',
        scrollBar: true,
        sectionSelector: 'section',
        verticalCentered: true,
        fitToSection: false,
        afterLoad: function(anchorLink, index){
          $(".scroll-down").on("click", function(e){
            var e = $.Event('keydown' );
            e.which = 40;
            $(document).trigger(e);
          });
        },
      });

      $("#block-bean-clients .field-name-field-multi-images > .field-items").slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        draggable: false,
        swipe: false,
        responsive: [
        {
          breakpoint: 1080,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            arrows: false,
            dots: true
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true
          }
        }
      ]
      });
    }
  }
})(jQuery);

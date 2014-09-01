(function($) {

//----------------------------------------------------------
// TOGGLES
//----------------------------------------------------------
// Main navigation - Toggle
//--------------------------------------
Drupal.behaviors.mainNav = {
  attach: function(context, settings) {
    $('.l-navigation .nav-main h2').click(function() {
      $('.l-navigation .nav-main ul').slideToggle();
    });
  }
};


//----------------------------------------------------------
// WAYPOINTS
//----------------------------------------------------------
// Sharing buttons - Stick to top
//--------------------------------------
Drupal.behaviors.stickyShare = {
  attach: function(context, settings) {
    $('.block-class').waypoint('sticky', {});
  }
};


//----------------------------------------------------------
// BACK TO TOP BUTTON
//----------------------------------------------------------
Drupal.behaviors.backToTop = {
  attach: function(context, settings) {

  $(window).scroll(function(){
    if ($(this).backToTop() > 400) {
      $('.backToTop').fadeIn();
    } else {
      $('.backToTop').fadeOut();
    }
  });

  $('.backToTop').click(function(){
    $('html, body').animate({backToTop: 0},800);
    return false;
  });

  }
};


//----------------------------------------------------------
// EQUAL HEIGHTS
//----------------------------------------------------------
window.equalHeight = function(element, context) {
  jQuery(context).each(function() {
    var tallest = 0;
    jQuery(element, this).each(function() {
      jQuery(this).css('height', 'auto');
      if (jQuery(this).outerHeight() > tallest) {
        tallest = jQuery(this).outerHeight();
      }
    });
    jQuery(element, this).each(function() {
      jQuery(this).css('height', tallest + 'px');
    });
  })
}
window.applyEqualHeight = function(element, context) {
  jQuery(window).load(function() {
    equalHeight(element, context);
  })
  jQuery(window).resize(function() {
    equalHeight(element, context);
  })
}

Drupal.behaviors.equalHeights = {
  attach: function(context, settings) {
    applyEqualHeight('.views-row', '.block-class');
  }
};


//----------------------------------------------------------
// SLICK CAROUSEL
//----------------------------------------------------------
Drupal.behaviors.carouselLogos = {
  attach: function(context, settings) {
  $('.view-class .view-content').slick({
    autoplay: true,
    autoplaySpeed: 7000,
    speed: 1200,
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 6,
    arrows: false,
    responsive: [
      {
        breakpoint: 960,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }
    ]
  });
  }
};



})(jQuery);

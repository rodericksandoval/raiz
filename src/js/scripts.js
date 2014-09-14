(function($) {

//----------------------------------------------------------
// TOGGLES
//----------------------------------------------------------

// Main navigation - Toggle
//--------------------------------------
Drupal.behaviors.navMain = {
  attach: function(context, settings) {
    $('.l-navigation h2').click(function() {
      $('.l-navigation ul.menu').slideToggle();
    });
    // $('.l-navigation li.expanded') .hover(function() {
    //   $(this).parent().find('ul').slideToggle();
    // });
  }
};

})(jQuery);

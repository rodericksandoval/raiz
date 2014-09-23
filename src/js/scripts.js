(function($) {

//----------------------------------------------------------
// TOGGLES
//----------------------------------------------------------

// Main navigation - Toggle
//--------------------------------------
Drupal.behaviors.mainNavToggle = {
  attach: function(context, settings) {
    $(".l-navigation h2").click(function() {
      $(".l-navigation ul.menu").slideToggle();
    });
    // $(".l-navigation li.expanded") .hover(function() {
    //   $(this).parent().find("ul").slideToggle();
    // });
  }
};


//----------------------------------------------------------
// SEARCH BLOCK MODAL
//----------------------------------------------------------

Drupal.behaviors.searchBlockToggle = {
  attach: function(context, settings) {
    $(".l-navigation .search-toggle").click(function(e) {
      e.preventDefault();
      $(".modal").toggleClass("modal-show");
    });
    $(".overlay").click(function() {
      $(".modal").toggleClass("modal-show");
    });
  }
};

})(jQuery);

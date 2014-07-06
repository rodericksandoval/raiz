(function ($) {

  $(function() {

    $('.l-navigation h2') .click(function() {
      $('.l-navigation ul').slideToggle();
      // $('.l-navigation ul ul').toggle();
    });

    $('.l-navigation li.expanded') .click(function() {
      $(this).parent().find('ul').slideToggle();
    });

  });


/**
 * Prueba Colorbox
 **************************************/

  // $(function() {
  //   $('.flexslider li img').colorbox();
  // });


/**
 * Prueba Slimbox
 **************************************/

// $(function() {
//    $('#flexslider-1 .slides a').attr('rel', 'lightbox');
// });


/**
 * Prueba Flexslider
 **************************************/

  // $(function() {
  //   $('.flexslider').flexslider({
  //     animation: "slide"
  //   });
  // });

  // $(function() {
  //   $('.field-name-field-img-principal').addClass('flexslider');
  //   $('.field-name-field-img-principal .flexslider').flexslider({
  //     animation: "slide"
  //   });
  // });

  // $(function() {
  //   if( $('.field-name-field-img-principal').length){
  //     $('.field-name-field-img-principal').flexslider({
  //       animation: "slide"
  //     });
  //   }
  // });

}) (jQuery);

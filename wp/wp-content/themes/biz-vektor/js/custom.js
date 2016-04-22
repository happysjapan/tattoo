jQuery( document ).ready(function() {
  var template = jQuery('#logo').attr('data-template');
  var width = jQuery( window ).width();

  if( width > 1000 ) {
    jQuery('#logo').attr('src', template + '/images/logo.png');
  }

  jQuery( window ).resize(function() {
    var width = jQuery( window ).width();

    if( width > 1000 ) {
      jQuery('#logo').attr('src', template + '/images/logo.png');
    }
    else {
      jQuery('#logo').attr('src', template + '/images/logo-mobile.png');
    }
  });

});

jQuery( document ).ready(function() {
  if ( window.matchMedia( '( min-width: 768px )' ).matches ) {
    jQuery( '#navigation__list' ).removeClass( 'navigation__hidden' );
  }
  jQuery( '#hamburger, .navigation__list li a' ).click( function() {
    if ( window.matchMedia( '( min-width: 768px )' ).matches ) {
    }
    else {
      jQuery( '#navigation' ).fadeToggle( 600 );
    }
  });
});

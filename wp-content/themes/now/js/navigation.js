jQuery( document ).ready(function( $ ) {
  $('#menu-header').before("<div class='close-nav'></div>");

  $('.menu-1 .menu-toggle').click( function(){
    $( '.menu-1 .menu-header-container' ).toggleClass( 'visible' );
    return false;
  });
  $('.horisontal-navigation .menu-header-container .close-nav').click( function(){
    $( '.menu-1 .menu-header-container' ).toggleClass( 'visible' );
    return false;
  });
  

	// $('.nav-horizontal li').bind('mouseover', meditation_openSubMenu);
    var is_scroll = false;
    
    $('.scrollup').click( function(){
		$('html, body').animate({scrollTop : 0}, 1000);
		return false;
	});
});
jQuery( document ).ready(function( $ ) {

    $('.menu-1 .menu-toggle').click( function(){
		$( '.menu-1 ul.nav-horizontal, .menu-1 div.nav-horizontal > ul' ).toggleClass( 'visible' );
		$( '.menu-toggle' ).toggleClass( 'nav-active' );
		return false;
    });
    
    var navHeight = document.getElementById('masthead').offsetHeight;
    console.log('Navbar height : '+navHeight+'px');
    var navItem = $('.horisontal-navigation .nav-horizontal');
    navItem[0].style.setProperty('--headerHeight', navHeight+'px');


	// $('.nav-horizontal li').bind('mouseover', meditation_openSubMenu);
    var is_scroll = false;
    
    $('.scrollup').click( function(){
		$('html, body').animate({scrollTop : 0}, 1000);
		return false;
	});
});
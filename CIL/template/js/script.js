/**
 * Script file to execute all dynamic page actions
 *
 * @author D. Tiems (dennis-at-bigbase-dot-nl)
 * @version 2.1 - March 2nd 2017
 */

$( document ).ready( function(){

	// Show a message
	// console.log( 'All script will be executed now' );

	// Run the slideshows on the page
	if( $( '.nivoslider' ).length ) $( '.nivoslider' ).nivoSlider();

	// Hover images with their lowsrc attr
	$( 'img[data-hover]' ).on( 'mouseenter mouseleave' , function(){
		var tmp = $(this).attr( 'src' );
		$(this).attr( 'src' , $(this).attr( 'data-hover' ) );
		$(this).attr( 'data-hover' , tmp );
	})

	// Apply the lightbox feature on images
	if( $( '.colorbox' ).length ) $( '.colorbox' ).colorbox();

	// Correct tab switching to also change tab (not only content)
	$( 'button[data-toggle="tab"]' ).on( 'shown' , function (e) {

		// Get new tab to activate, and the full container of tabs
		var tmp = $( e.target ).attr( 'data-target' );
		var tab = $( '.nav-tabs a[href="' + tmp + '"]' );
		var container = tab.closest( '.nav-tabs' );

		// De-active other tabs and activate new tab
		$( '.active' , container ).removeClass( 'active' );
		tab.closest( 'li' ).addClass( 'active' );
	})

	// Show google map
	if( $( '#googlemap1' ).length ) {
		var mapcfg = {
			zoom: 8,
			center: new google.maps.LatLng( -34.397 , 150.644 ),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map( document.getElementById( 'googlemap1' ) , mapcfg );
	}

});
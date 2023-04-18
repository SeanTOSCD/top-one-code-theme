// Get the height of the site header in vanilla javascript
const siteHeader = document.querySelector( '.site-header' );

// Find .hero-cover on the page and set its min-height to 100vh minus the height of the site header
const heroCover = document.querySelector( '.hero-cover' );
heroCover.style.minHeight = 'calc(100vh - ' + siteHeader.offsetHeight + 'px)';

// Find the .focus-scroll button
const focusScroll = document.querySelector( '.focus-scroll' );

// When clicked, scroll to the #focus section but do not add #focus to the URL
focusScroll.addEventListener( 'click', function( event ) {
	event.preventDefault();
	document.querySelector( '#focus' ).scrollIntoView( {
		behavior: 'smooth',
	} );
}, false );
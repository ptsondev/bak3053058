jQuery(document).ready(function($) {
	// Hand Scroll 
     var bw = $( window ).width(); // browser width
    if(bw>600){
        $(window).bind('scroll', function() {
            parallax();
        });	
    }
});

function parallax() {
    var scrollPos = $(window).scrollTop();	
    
     if($('#our-clients').length){ // page index        	
         // Section 1
         console.log(scrollPos);
        $('#our-clients').css('backgroundPosition', "50% " + Math.round(($('#our-clients').offset().top - scrollPos) * 0.2) + "px");
     }
    /*
     if ($("#sub-header").length) {
        $('#sub-header').css('backgroundPosition', "50% " + Math.round((scrollPos - $('#sub-header').offset().top) * 1.1) + "px");
    }
    if ($("#sub-footer").length) {
        $('#sub-footer').css('backgroundPosition', "50% " + Math.round((scrollPos - $('#sub-footer').offset().top) * 1.1) + "px");
    }
    */
    if (scrollPos > 500) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();	
        }

		
  
}
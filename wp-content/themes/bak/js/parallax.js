jQuery(document).ready(function($) {
	// Hand Scroll 
	$(window).bind('scroll', function() {
		parallax();
	});	
	
});

function parallax() {
    var scrollPos = $(window).scrollTop();	
    
    // header
	if(scrollPos >230){
        $('#main-header').removeClass('unactive');
		$('#main-header').addClass('active');    
	}else{
		$('#main-header').removeClass('active');
		$('#main-header').addClass('unactive');
	}
    
    
     if($('#our-clients').length){ // page index        	
         // Section 1
         console.log(scrollPos);
        $('#our-clients').css('backgroundPosition', "50% " + Math.round(($('#our-clients').offset().top - scrollPos) * 0.2) + "px");
     }
  
}
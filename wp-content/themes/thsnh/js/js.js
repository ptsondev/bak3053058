jQuery(document).ready(function($){	
	var w =  $( window ).width() ;
	var h =  $( window ).height() ;
	if(w<=768){
		$('#mmenu').mmenu();
	}
		
	$( window ).resize(function() {
		var w =  $( window ).width() ;
		if(w<=768){
			$('#mmenu').mmenu();
		}
	});	
	
	var active=1;
	setInterval(function() {
        $('#wslide .slide').removeClass('active');
		active++;
		if(active>4)
			active=1;
		$('#wslide .slide-'+active).addClass('active');
    }, 5000);
    
	
	/* index 2*/
	$('#index2 #box').height(h);
	// 2s la bat den
	setTimeout(function() {        
		$('#index2 #light').addClass('on');
		$('#index2 #box').addClass('on');		
    }, 2000);
	setTimeout(function() {        
		$('#index2 #g-content').addClass('on');
	}, 3000);
	
	/* index 3*/
	$('#index3 #box').height(h);
	// 2s la bat den
	setTimeout(function() {        
		$('#index3 #light').addClass('on');
		$('#index3 #box').addClass('on');		
    }, 2000);
	setTimeout(function() {        
		$('#index3 #g-content').addClass('on');
	}, 3000);
    
    
    //setTimeout(function() {        
	//	$('#showPopup').colorbox();
    //    $('#showPopup').trigger('click');
    //}, 1000);    
});


jQuery(window).load(function($) {
	var w =  jQuery(window).width() ;
	var h =  jQuery(window).height() ;
	if(w<=768){
		jQuery('#mmenu').mmenu();
	}
});

// home 
jQuery(document).ready(function($) {	
/*	if ($("#site-brochure-ad").length) {			
		top_site_brochure_ad = $("#site-brochure-ad").offset().top;		
		left_site_brochure_ad = $("#site-brochure-ad").offset().left;		
		width_site_brochure_ad = $("#site-brochure-ad").width();
		
		$("#site-brochure-ad").width(width_site_brochure_ad);
		$("#site-brochure-ad").css({left: left_site_brochure_ad});
	
	}
*/	
	var w =  $( window ).width() ;
	// Hand Scroll 
	$(window).bind('scroll', function() {		
		var scrollPos = $(window).scrollTop();		
		//console.log(scrollPos);
		if(scrollPos > 500){
			$('#feature').addClass('active');
		}
		if(scrollPos > 1000){
			$('#process').addClass('active');
		}
		if ($("#sub-header").length) {
			$('#sub-header').css('backgroundPosition', "50% " + Math.round((scrollPos - $('#sub-header').offset().top	) * 1.1) + "px");
		}
		if ($("#sub-footer").length) {
			$('#sub-footer').css('backgroundPosition', "50% " + Math.round((scrollPos - $('#sub-footer').offset().top	) * 1.1) + "px");
		}
		
		if (scrollPos > 500) {
            $('.scroll-to-top').fadeIn();
			if(w>768){ 
				$('#main-header').addClass('small');
				$('#mmenu ul ul').addClass('small');
			}
        } else {
            $('.scroll-to-top').fadeOut();
			if(w>768){
				$('#main-header').removeClass('small');
				$('#mmenu ul ul').removeClass('small');
			}
        }
		
		/*
		if ($("#site-brochure-ad").length) {		
			if (scrollPos > top_site_brochure_ad) {
				$("#site-brochure-ad").addClass('stand-sticky');
				
			}else{
				$("#site-brochure-ad").removeClass('stand-sticky');
			}
		}
		*/
	});	
	
	$('.scroll-to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	
	setTimeout(function(){ 
		$('.contact-snh').fadeIn();
	}, 10000);
	
        var front_width = $('.flipper .front').width();
        $('.flipper .front, .flipper .back').height(front_width);
		
	
});

jQuery(document).ready(function($){var bw=$(window).width();if(bw>600){$(window).bind('scroll',function(){parallax();});}});function parallax(){var scrollPos=$(window).scrollTop();if($('#our-clients').length){console.log(scrollPos);$('#our-clients').css('backgroundPosition',"50% "+Math.round(($('#our-clients').offset().top-scrollPos)*0.2)+"px");}
if(scrollPos>500){$('.scroll-to-top').fadeIn();}else{$('.scroll-to-top').fadeOut();}};
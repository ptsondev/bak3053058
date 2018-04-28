jQuery(document).ready(function($){	
    
        if($('#slider1_container').length){
           var options = {
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $ChanceToShow: 2
                }
            };                          
            var jssor_slider1 = new $JssorSlider$('slider1_container', options);
        }
        //responsive code begin
        //remove responsive code if you don't want the slider scales
        //while window resizing
        function ScaleSlider() {
            var parentWidth = $('#slider1_container').parent().width();
            if (parentWidth) {
                jssor_slider1.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        //Scale slider after document ready
        ScaleSlider();
                                        
        //Scale slider while window load/resize/orientationchange.
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    
    $('#btnShowMenu').click(function(){
        $('#main-menu').toggle(); 
    });
    
	$(".rslides").responsiveSlides({
        nav: true,
        prevText: "<div id='btn-slide-prev' class='btn-slide-controls'> < </div>",
        nextText: "<div id='btn-slide-next' class='btn-slide-controls'> > </div>",  
    });
    

    $('#our-clients').hover(function(){
        if(!$(this).hasClass('showed')){
            $(this).addClass('showed');    
            $('.count').each(function () {
                $(this).prop('Counter',0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 1500,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                });
            });                        
        }
    });    
    
    /*$('#product-category li a').click(function(){
        if($(this).parent().hasClass('active')){
            $(this).parent().removeClass('active');
        }else{    
            $('#product-category li').removeClass('active');
            $(this).parent().toggleClass('active');             
        }
        return false;
    });
    */
    
    $('.pro-thumb img').bighover({width:800});
    
    $("#slider-range").slider({
        range: true,
        min: 5000000,
        max: 50000000, 
        values: [9000000, 30000000],
        slide: function (event, ui) {
            $("#amount").val(formatNumber(ui.values[0]) + " - " + formatNumber(ui.values[1]));
        }
    });
    $("#amount").val(formatNumber($("#slider-range").slider("values", 0)) + " - " + formatNumber($("#slider-range").slider("values", 1)));
    
    $('#btnSearch').click(function(){
        var brand=$('#slBrand').val();
        var key=$('#txtKey').val();
        var numCook=$('#slNumCook').val();
        var min = $("#slider-range").slider("values", 0);
        var max = $("#slider-range").slider("values", 1);        
        $.ajax({
            url: ajaxurl,
            data: {
                action:'searchProduct',
                brand:brand,
                key:key,
                numCook:numCook,
                min:min,
                max:max
            },
            async: false,
            success:function(data) {
                $('#list-product-area').html(data);
                $(window).scrollTop(200);
            }
        });          
    });

    
});

function formatNumber (num) {
    num = num.toString();
    num = num.replace(/\,/g, '');
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function removeFormatNumber(num){
    if(!num){
        return 0;
    }
    return parseInt(num.replace(/\,/g, ''));
}
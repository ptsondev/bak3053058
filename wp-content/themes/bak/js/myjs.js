jQuery(document).ready(function($){	
    var bw = $( window ).width(); // browser width
    if(bw<600){
        $('body').addClass('mobile');
        $('body').addClass('mobile');
    }
    
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
    
    $('#main-menu .lev-0').click(function(e){
        var showwing = $(this).find('ul').is(":visible");
        $('#main-menu .sub-menu').hide();
        if(showwing){
            $(this).find('ul').hide();
        }else{
            $(this).find('ul').show();
        }
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
    
    $('.pro-thumb img').bighover({width:700});
    $('#footer-certification img, #footer-customers img').bighover({width:400, position:"top"});
    
    var price_start = $('#price_start').val();
    var price_end = $('#price_end').val();
    $("#slider-range").slider({
        range: true,
        min: 5000000,
        max: 50000000, 
        values: [price_start, price_end],
        slide: function (event, ui) {
            $("#amount").val(formatNumber(ui.values[0]) + " - " + formatNumber(ui.values[1]));
        }
    });
    $("#amount").val(formatNumber($("#slider-range").slider("values", 0)) + " - " + formatNumber($("#slider-range").slider("values", 1)));
        

    $('#btnAddToCart').click(function(){
        var pid = $(this).data('pid');
        $.ajax({
            url: ajaxurl,
            data: {
                action:'addToCart',
                pid:pid
            },
            async: false,
            success:function(data) {
                if(data=="0"){
                    $('#cartStatus').html('<span style="color:#23527c;">Đã thêm sản phẩm này vào giỏ hàng</span>');
                    $('#btnAddToCart').addClass('added');
                     var numCart = parseInt($('#numCart').text());
                    numCart+=1;
                    $('#numCart').text(numCart);
                }else{
                    $('#cartStatus').html('<span style="color:red;">Sản phẩm này đã có trong giỏ hàng</span>');                    
                }                 
            }
        });              
    });
    
    $('.btnRemoveItem').click(function(){
        var pid = $(this).data('pid');        
        $.ajax({
            url: ajaxurl,
            data: {
                action:'removeFromCart',
                pid:pid
            },
            async: false,
            success:function(data) {                
            }
        });  
        $(this).parents('.item').remove();
        var total = 0;
        $('.txtPrice').each(function(){
            total += parseInt($(this).val());
        })
        $('#order-products .total-price').text(formatNumber(total));
        var numCart = parseInt($('#numCart').text());
        numCart-=1;
        $('#numCart').text(numCart);
        if(numCart==0){
            $('#order-products .block').html('Bạn hiện chưa chọn mua sản phẩm nào, xin tham khảo qua các dòng <a href="/san-pham">sản phẩm</a> trước khi đặt hàng nhé');
        }
    });
   
    $('#order-form form').on('submit', function(e){       
        text ='';
        $('#order-products .item').each(function(){
            text += $(this).find('.title').text()+' --- '+$(this).find('.price').text()+'\r\n'; 
        });
        text += $('#order-products .total .btitle').text()+' --- '+$('#order-products .total .total-price').text();
        $('#order-form textarea[name=detail]').val(text);
        //e.preventdefault; return false;
        $.ajax({
            url: ajaxurl,
            data: {
                action:'emptyCart',                
            },
            async: false,
            success:function(data) {
                
            }
        });
        window.location.href = "http://bepankhang.com";
        return false;
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

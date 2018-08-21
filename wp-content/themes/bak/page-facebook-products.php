<?php
/*
  Template Name: Fb - Products
 */
?>
<html style="margin-top:0!important;" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700&amp;subset=vietnamese" rel="stylesheet">-->
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/Font-Awesome-master/web-fonts-with-css/css/fontawesome-all.min.css">    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts/fonts.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.css">    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/bep-an-khang.ico"/>
    <!--Jquery-->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jssor.slider.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bighover.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/myjs.js"></script>

    <?php wp_head(); ?>
 
    
</head>
<body>

   
    <div id="main-body">
    <div class="container main-wrapper">
        <?php //get_template_part('search-area'); ?>
        <div class="row main-p-products">            
            <div class="col-sm-12 col-xs-12">
           
                
               <div id="ctkm">
                     <h3>Tri ân khách hàng - Ngập tràn quà tặng</h3>

                    
           <b>Những model bếp từ cao cấp chính hãng đang được khuyến mãi với giá cực shock tại showroom Bếp An Khang. Sau đây là nội dung chương trình khuyến mãi. </b><br />
                
                <div id="ctkm">
                     
                    <div id="ctkm-des" >
                        ✅ Mua Bếp Từ TẶNG Bộ Nồi 5 Món <br/>
                        ✅ Mua Bếp từ TẶNG Hút Mùi + Bộ Nồi 5 Món <br/>
                        ✅ Mua Bếp từ TẶNG Lò Nướng + Tặng Hút Mùi + Bộ Nồi 5 Món <br/>
                        ✅ Mua Chậu tặng Vòi <br/>
                        ✅ Đóng Tủ Bếp Tặng Vòi + Chậu <br/> 
                                       
                        <img src="<?php echo PATH_TO_IMAGES; ?>khuyen-mai-mua-bep-tang-hut-noi.png" alt="khuyen mai mua bep tu tang hut mui va noi" />
                        <h3>Những tính năng ưu việt của bếp từ</h3>
                        ✅ An toàn & dễ sử dụng. <br/>
                        ✅ Tiết kiệm điện năng & thời gian. <br/>
                        ✅ Thẩm mỹ & dễ dàng vệ sinh. <br/>
                        <i>Xem thêm <a target="_blank" href="https://bepankhang.com/qna/uu-diem-cua-bep-dien-tu/">những ưu điểm khác của bếp từ</a></i><br /><br />                                          
                    </div>
            
                     
        
        
        <div class="km-brand">
            <h4>Bếp từ Bosch cao cấp</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(1334);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-bosch/">
                     bếp từ Bosch
                </a>
            </div>                
        </div>
        
        <div class="km-brand">
            <h4>Bếp từ Cata</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(62);
                    display_product_item($product);
                    $product = get_post(81);
                    display_product_item($product);
                    $product = get_post(212);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-cata/">
                     bếp từ Cata
                </a>
            </div>    
            </div>                
        </div>
        <img src="<?php echo PATH_TO_IMAGES; ?>mua-bep-tu-cata-tang-bo-noi.jpg" alt="mua bep tu Cata tang bo noi" /><br />
                    
        <div class="km-brand">
            <h4>Bếp từ Chefs</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(39);
                    display_product_item($product);
                    $product = get_post(58);
                    display_product_item($product);
                    $product = get_post(231);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-chefs/">
                     bếp từ Chefs
                </a>
            </div>    
            </div>                
        </div>
        
        <div class="km-brand">
            <h4>Bếp từ Teka</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(158);
                    display_product_item($product);
                    $product = get_post(1346);
                    display_product_item($product);
                    $product = get_post(169);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-teka/">
                     bếp từ Teka
                </a>
            </div>    
            </div>                
        </div>
        
        <div class="km-brand">
            <h4>Bếp từ Electrolux</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(1207);
                    display_product_item($product);
                    $product = get_post(1211);
                    display_product_item($product);
                    $product = get_post(1201);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-electrolux/">
                     bếp từ Electrolux
                </a>
            </div>    
            </div>                
        </div>
        
        
        <div class="km-brand">
            <h4>Bếp từ Canzy</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(138);
                    display_product_item($product);
                    $product = get_post(1278);
                    display_product_item($product);
                    $product = get_post(1468);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-canzy/">
                     bếp từ Canzy
                </a>
            </div>    
            </div>                
        </div>
                    <br/><br/>
                     [Nếu bạn không tìm thấy sản phẩm đang cần mua, vui lòng liên hệ Hotline của bếp An Khang để được tư vấn và báo giá: <a href="tel:0963391379">0963 39 1379</a>]
                    <br/>
                    <img src="<?php echo PATH_TO_IMAGES;?>/cac-thuong-hieu-bep-tu-chat-luong.png" alt="cac thuong hieu bep tu chat luong"/>
                    <br/><br/>
        
        <div class="important">
            ✅ Tặng ngay voucher giảm giá 500.000đ khi đến xem và mua hàng trực tiếp tại showroom bếp An Khang 151 Tô Hiến Thành, Phường 13, Quận 10, TP HCM </br >
            ✅ Miễn phí giao hàng và lắp đặt đối với tất cả các sản phẩm trên.</br >
            ✅ Cần tư vấn thêm thông tin về bếp từ, vui lòng liên hệ hot line: <a href="tel:0963391379">0963 39 1379</a>
        </div>
        
            <div id="register-sale">
<h3>Bạn cũng có thể để lại thông tin để chúng tôi có thể tư vấn rõ hơn về đợt khuyến mãi</h3>
<?php echo do_shortcode('[contact-form-7 id="1548" title="Xin báo giá"]'); ?>

</div>
           
        </div>
    </div>
</div>

    
</body>
</html>
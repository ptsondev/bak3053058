<?php
/*
  Template Name: KM
 */
?>
<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <?php //get_template_part('search-area'); ?>
        <div class="row main-p-products">            
            <div class="col-sm-9 col-xs-12">
                <h1><?php the_title(); ?></h1>
           
                
                <div id="ctkm">
                     <h3>Tri ân khách hàng - Ngập tràn quà tặng</h3>

                    <div id="ctkm-des">
                         ✅ Bếp là nơi mọi thành viên quay quần lại với nhau sau một ngày làm việc, học tập mệt mỏi. Mỗi người ai cũng đều có nhu cầu trang trí, sắm sửa sao cho căn bếp của mình trông thật tiện nghi và hiện đại. </br>
                         ✅ Hiểu được điều này, bếp An Khang - chuyên cung cấp bếp từ và các thiết bị nhà bếp - cho ra chương trình khuyến mãi lớn nhất từ trước tới nay với mong muốn đem đến không gian bếp ấm áp cho các hộ gia đình.</br>

                         ✅ Các model bếp từ chính hãng, bếp từ đôi, bếp 3 từ, 4 từ,... từ bếp cao cấp đến tầm trung, giá rẻ... Mọi sản phẩm sẽ được bán với giá cực hot vào đợt khuyến mãi này.</br>
                    </div>
        
        
        <div class="km-brand">
            <h4>Bếp từ Bosch cao cấp</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(186);
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
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(186);
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
        
        <div class="km-brand">
            <h4>Bếp từ Chefs</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(186);
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
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(186);
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
            <h4>Bếp từ Arber</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(186);
                    display_product_item($product);
                ?>
            </div>
            <div class="show-more">
                <div class="show-more">
                Xem thêm các model khác của
                <a href="https://bepankhang.com/sp/bep-tu/bep-tu-arber/">
                     bếp từ Arber
                </a>
            </div>    
            </div>                
        </div>
        
        
        <div class="km-brand">
            <h4>Bếp từ Canzy</h4>
            <div class="list-products row">
                <?php 
                    $product = get_post(78);
                    display_product_item($product);
                    $product = get_post(221);
                    display_product_item($product);
                    $product = get_post(186);
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
        
        <div class="important">
            ✅ Tặng ngay bộ nồi từ cao cấp khi đến xem và mua hàng trực tiếp tại showroom bếp An Khang 151 Tô Hiến Thành, Phường 13, Quận 10, TP HCM </br >
            ✅ Miễn phí giao hàng và lắp đặt đối với tất cả các sản phẩm trên.</br >
            ✅ Cần tư vấn thêm thông tin về bếp từ, vui lòng liên hệ hot line: <a href="tel:0963391379">0963 39 1379</a>
        </div>
        
            </div>
            </div>

            <div class="col-sm-3 col-xs-12" id="main-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
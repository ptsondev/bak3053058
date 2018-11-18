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
                    
                    <h3>THÁNG TEKA - MUA HÀNG THẢ GA</h3>                                         
                        ✅   Sale <b>30%</b> toàn bộ sản phẩm từ 15/11 - 30/11 <br />
                         ✅ Nhiều phần quà hấp dẫn <br />
                        ✅ Tặng ngay phiếu voucher <b>1.000.000</b><br />
                         ✅ Chiết khấu cực cao khi mua combo<br />
                         ✅ Made in Spain<br />
                         ✅ Cam kết chính hãng 100% <br />
                         ✅ Bảo hành 24 tháng             <br />                                               
                    <div class="km-brand">
                        <div class="list-products row">
                            <?php 
                                $product = get_post(158);
                                display_product_item($product);
                                $product = get_post(1792);
                                display_product_item($product);
                                $product = get_post(1346);
                                display_product_item($product);
                            ?>
                        </div>
                    </div>
                    
                    
                    <h3>CÙNG BOSCH - DÙNG HÀNG THƯƠNG HIỆU</h3>                                         
                        ✅   Sale <b>30%</b> Deal giá ngập tràn <br />
                         ✅ Nhiều phần quà hấp dẫn <br />
                         ✅ Made in Germany<br />
                         ✅ Cam kết chính hãng 100% <br />
                         ✅ Bảo hành 24 tháng             <br />                                               
                    <div class="km-brand">
                        <div class="list-products row">
                            <?php 
                                $product = get_post(221);
                                display_product_item($product);
                                $product = get_post(1520);
                                display_product_item($product);
                                $product = get_post(78);
                                display_product_item($product);
                            ?>
                        </div>
                    </div>
                    
                    
                    
                    
                    <h3>Dmestik - Mua bếp tặng hút mùi</h3>                                         
                        ✅ Áp dụng cho tất cả các model bếp từ & bếp điện <br />
                         ✅ Cam kết chính hãng 100% <br />
                         ✅ Bảo hành 24 tháng <br />                                               
                    <div class="km-brand">
                        <div class="list-products row">
                            <?php 
                                $product = get_post(1306);
                                display_product_item($product);
                                $product = get_post(1699);
                                display_product_item($product);
                                $product = get_post(1705);
                                display_product_item($product);
                            ?>
                        </div>
                    </div>
                    
                    
                    
                    <h3>CANZY - MADE IN ITALY</h3>                                         
                        ✅   Tân trang nhà cửa - Giá chỉ 1 nửa <br />
                        ✅ Tặng ngay phiếu voucher <b>1.000.000</b><br />
                         ✅ Chiết khấu cực cao khi mua combo<br />
                         ✅ Cam kết chính hãng 100% <br />
                         ✅ Bảo hành 24 tháng             <br />                                               
                    <div class="km-brand">
                        <div class="list-products row">
                            <?php 
                                $product = get_post(1794);
                                display_product_item($product);
                                $product = get_post(1509);
                                display_product_item($product);
                                $product = get_post(2340);
                                display_product_item($product);
                            ?>
                        </div>
                    </div>
                    
                    
                    
                  
        
       
                    <br/><br/>
                      [Cùng vô số sản phẩm khác đang khuyến mãi với mức ưu đãi khủng, vui lòng liên hệ Bếp An Khang để được tư vấn và báo giá: <a href="tel:0963391379">0963 39 1379</a>]
                    <br/>
                    <img src="<?php echo PATH_TO_IMAGES;?>/cac-thuong-hieu-bep-tu-chat-luong.png" alt="cac thuong hieu bep tu chat luong"/>
                    <br/><br/>
        
        <div class="important">
            ✅ Cam kết hàng chính hãng và các chế độ bảo hành.<br />
            ✅ Miễn phí giao hàng và lắp đặt đối với tất cả các sản phẩm trên.<br />
            ✅ Bạn cần được tư vấn chi tiết và rõ ràng hơn? vui lòng liên hệ hot line: <a href="tel:0963391379">0963 39 1379</a>
        </div>
        
            <div id="register-sale">
<h3>Bạn cũng có thể để lại thông tin để chúng tôi chủ động liên hệ lại</h3>
<?php echo do_shortcode('[contact-form-7 id="1592" title="Nhận coupon giảm giá" html_id="sform-coupon"]'); ?>

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
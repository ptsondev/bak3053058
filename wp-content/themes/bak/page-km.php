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
                    
                    <h3>Mừng xuân mới - rinh bếp mới về nhà</h3>                                         
                        ✅  Nhiều combo bếp & thiết bị nhà bếp cao cấp<br />
                        ✅  Khuyến mãi cực shock<br />
                     ✅  Nhiều quà tặng hấp dẫn<br />
                     ✅  Chương trình kéo dài đến hết 30/1/2019<br />
                        
                  <img src="<?php echo PATH_TO_IMAGES; ?>b9-01.png" /><br /><br />
                    <img src="<?php echo PATH_TO_IMAGES; ?>b9-02.png" /><br /><br />
                    <img src="<?php echo PATH_TO_IMAGES; ?>b9-03.png" /><br /><br />
                    <img src="<?php echo PATH_TO_IMAGES; ?>b9-04.png" /><br /><br />
                    <img src="<?php echo PATH_TO_IMAGES; ?>b9-05.png" /><br /><br />
                    
        
       
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
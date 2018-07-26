<?php
/*
  Template Name: Contact
 */
?>
<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row">
            <div id="gmap" class="col-sm-7 col-xs-12">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=19t5FVYaVcwLA556bcrL32i1bKvxJv7j9&z=15" width="320" height="240"></iframe>
            </div>
            <div class="col-sm-5 col-xs-12">
                <div id="contact-info">
                    
                        <div itemscope="" itemtype="http://schema.org/Organization">
                            <h4 itemprop="name">Bếp An Khang</h4>
                            <div class="item address" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><i class="fa fa-home"></i> 151 Tô Hiến Thành, Phường 13, Quận 10, TP HCM</div>
                            <div class="item phone" itemprop="telephone"><i class="fa fa-phone"></i> <a href="tel:<?php echo AK_HOTLINE;?>"><?php echo AK_HOTLINE_SHOW ?></a></div>
                            <div class="item email" itemprop="email"><i class="fas fa-envelope-open"></i> 
                                <a href="mailto:info.bepankhang@gmail.com">info.bepankhang@gmail.com</a></div>
                        </div>
                    
                    <div id="contact-form-area">
                        <h3>Gửi yêu cầu cho chúng tôi</h3>
                        <?php echo do_shortcode('[contact-form-7 id="77" title="Contact form 1"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
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
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=19t5FVYaVcwLA556bcrL32i1bKvxJv7j9&z=15" width="640" height="480"></iframe>
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

<div id="about-us">
    <div class="container">      
        <h1>Liên Hệ Bếp An Khang</h1>        
        <div class="row">
            <div class="col-sm-3 col-xs-12"><img src="<?php echo PATH_TO_IMAGES; ?>/logo.png" /></div>
            <div class="des col-sm-9 col-xs-12">
                <i class="fas fa-quote-left"></i>
                Với mong muốn tạo ra 1 không gian bếp tuyệt hảo trong chính ngôi nhà của bạn - nơi gắn kết yêu thương và mang lại sự đầm ấm trong mỗi gia đình, Bếp An Khang muốn đem đến cho các bạn những sản phẩm cao cấp về bếp điện từ và các phụ kiện đi kèm khác. Tất cả nhằm tạo ra sự thoải mái và tiện lợi hơn trong việc nấu ăn.<br/>
                Bên cạnh các tiện ích như dễ sử dụng, an toàn và tiết kiệm thời gian & nhiên liệu,<br/> các dòng sản phẩm ngoại nhập này cũng sẽ làm tăng thêm tính thẩm mỹ trong căn bếp nhà bạn.<br /><br />
                Chúng tôi <b>cam kết bán hàng chính hãng</b>, hàng có nguồn gốc xuất sứ rõ ràng, cũng như đảm bảo các chế độ bảo hành<i class="fas fa-quote-right"></i>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
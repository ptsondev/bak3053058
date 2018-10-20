<div id="about-us-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <img class="logo" src="<?php echo PATH_TO_IMAGES; ?>logo.png" />
                    <i class="fas fa-quote-left"></i>
                    Với mong muốn tạo ra 1 không gian bếp tuyệt hảo trong chính ngôi nhà của bạn - nơi gắn kết yêu thương và mang lại sự đầm ấm trong mỗi gia đình, Bếp An Khang muốn đem đến cho các bạn những sản phẩm cao cấp về bếp điện từ và các phụ kiện đi kèm khác. Tất cả nhằm tạo ra sự thoải mái và tiện lợi hơn trong việc nấu ăn.<br/>
                    Bên cạnh các tiện ích như dễ sử dụng, an toàn và tiết kiệm, các dòng sản phẩm ngoại nhập này cũng sẽ làm tăng thêm tính thẩm mỹ trong căn bếp nhà bạn.<i class="fas fa-quote-right"></i><br /><br />
                    <div class="important">Bếp An Khang <b>cam kết bán hàng chính hãng</b>, hàng có nguồn gốc xuất xứ rõ ràng, cũng như đảm bảo thực hiện đúng các chế độ bảo hành.</div>
            </div>
            <div class="col-sm-3 col-xs-12">                
                <img src="<?php echo PATH_TO_IMAGES; ?>bep-an-khang-showroom.jpg" />
                <div itemscope="" itemtype="http://schema.org/Organization">
                            <h4 itemprop="name">Bếp An Khang</h4>
                            <div class="item address" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><i class="fa fa-home"></i> 151 Tô Hiến Thành, Phường 13, Quận 10, TP HCM</div>
                            <div class="item phone" itemprop="telephone"><i class="fa fa-phone"></i> <a href="tel:0963391379">0963 39 1379</a></div>
                            <div class="item email" itemprop="email"><i class="fas fa-envelope-open"></i> 
                                <a href="mailto:info.bepankhang@gmail.com">info.bepankhang@gmail.com</a></div>
                </div>
                
                <script type="application/ld+json">
                    {
                      "@context": "http://schema.org",
                      "@type": "Organization",
                      "url": "https://bepankhang.com",
                      "logo": "https://bepankhang.com/wp-content/themes/bak/images/logo.png",
                      "contactPoint": [{
                        "@type": "ContactPoint",
                        "telephone": "+84 963 391379",
                        "contactType": "customer service"
                      }]
                    }
                </script>
                
            </div>
            
            <div id="footer-terms" class="col-sm-3 col-xs-12">
                <h3>Chính sách - Hướng dẫn</h3>
                <?php 
                    $posts = get_posts(array(
                        'post_type' => 'post',
                        'numberposts' => -1,
                        'order' => 'DESC',
                        'tax_query' => array(
                                            array(
                                              'taxonomy' => 'post_tag',
                                              'field' => 'slug',
                                              'terms' => 'chinh-sach'                                              
                                            )
                                          )
                    ));   
                
                    foreach($posts as $post){
                        //var_dump($post);die;
                        echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
                    }
                    echo '<li><a href="/qna">Câu hỏi thường gặp</a></li>';        
                    echo '<li><a href="/lien-he">Liên hệ</a></li>';        
                
                ?>
                          
            </div>
        </div>
         <div class="row">
            <div id="footer-certification" class="col-sm-6 col-xs-12">
                <h3>Certification</h3>
                <img alt="chuyen bep tu chinh hang" src="<?php echo PATH_TO_IMAGES; ?>chuyen-bep-tu-chinh-hang.jpg" />
                <img alt="ban bep tu uy tin" src="<?php echo PATH_TO_IMAGES; ?>ban-bep-tu-uy-tin.jpg" />
                <img alt="mua bep tu o dau" src="<?php echo PATH_TO_IMAGES; ?>mua-bep-tu-o-dau.jpg" />
                <img alt="ban bep tu chinh hang tai Bep An Khang" src="<?php echo PATH_TO_IMAGES; ?>ban-bep-tu-bep-an-khang.jpg" />                
                <img alt="giay chung nhan Bep An Khang" src="<?php echo PATH_TO_IMAGES; ?>chung-nhan-bep-an-khang.jpg" />
            </div>
            
            <div id="footer-customers" class="col-sm-6 col-xs-12">
                <h3>Hình Ảnh</h3>
                <img alt="Nơi bán bếp từ uy tín" src="<?php echo PATH_TO_IMAGES; ?>bep-tu-uy-tin.jpg" />                
                <img alt="Bếp An Khang lắp đặt tận tình" src="<?php echo PATH_TO_IMAGES; ?>bep-an-khang-lap-dat.jpg" />
                <img alt="Bếp An Khang giao hàng cẩn thận" src="<?php echo PATH_TO_IMAGES; ?>bep-an-khang-giao-hang.jpg" />
                
            </div>
        </div>
        
    </div>
</div>

<div id="home-slogan">Bếp An Khang - Nâng Tầm Bếp Việt</div>   
<div id="main-footer">
            <div class="container main-wrapper">
                <div id="footer-info">                                            
                        Bếp An Khang © Privacy Policy
                </div>
            </div>    
        </div>


<?php wp_footer(); ?>

  <!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4119412,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4119412&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->
    
                <!--<script type="text/javascript" src="https://tracking.autoads.asia/js/tracking.js"></script>
            <script type="text/javascript">novaon_behavior.init(14093);</script>-->
        
</body>
</html>

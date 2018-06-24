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
                <img src="<?php echo PATH_TO_IMAGES; ?>c1.jpg" />
                <img src="<?php echo PATH_TO_IMAGES; ?>c2.jpg" />
                <img src="<?php echo PATH_TO_IMAGES; ?>c3.jpg" />
                <img src="<?php echo PATH_TO_IMAGES; ?>c4.jpg" />
                <img src="<?php echo PATH_TO_IMAGES; ?>c5.jpg" />
            </div>
            
            <div id="footer-customers" class="col-sm-6 col-xs-12">
                <h3>Hình Ảnh</h3>
                <img src="<?php echo PATH_TO_IMAGES; ?>kh1.jpg" />
                <img src="<?php echo PATH_TO_IMAGES; ?>kh2.jpg" />
                <img src="<?php echo PATH_TO_IMAGES; ?>kh3.jpg" />                
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

</body>
</html>

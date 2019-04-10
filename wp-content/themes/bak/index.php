<?php get_header(); ?>
 
        
        <div id="main-body">
            <div class="container main-wrapper">
                <div id="home-products">
                    <?php 
                    $arr_tid = array(7,8,17,18,19,20);
                    foreach($arr_tid as $tid){
                        $term = get_term($tid);
                        ?>
                    
                    
                     <div class="home-group">
                    <a href="<?php echo get_term_link($term);?>"><h3><?php echo $term->name; ?></h3></a>
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel" data-jcarousel="true">
                                    <ul style="left: 0px; top: 0px;">
                                        <?php 
                                            $products = get_posts(array(
                                                'post_type' => 'product',        
                                                'numberposts' => 20,
                                                'order' =>'ASC',
                                                'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'product-category',
                                                    'field' => 'term_id',
                                                    'terms' => $tid,
                                                    'include_children' => true,
                                                    )
                                                ),
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'wpcf-show',
                                                        'value' => 'a:0:{}',
                                                        'compare' => '!=',
                                                    )
                                                ) 
                                            ));     
                                            foreach($products as $product){
                                                $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
                                                $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
                                                $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                                                echo '<li>';
                                                    echo '<div class="pr">';

                                                    echo '<div class="thumb"><a href="'.get_permalink($product->ID).'">';
                                                        echo '<img src="'.bak_get_thumbnail($product->ID, 400, 300).'" />';
                                                    echo '</a></div>';
                                                    echo '<div class="info">';
                                                        echo '<div class="title">'.$product->post_title.'</div>';
                                                            $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
                                                            $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
                                                            $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                                                        echo '<div class="price">';
                                                            echo '<div class="v_d_price">'.bak_display_money($d_price).'</div>';
                                                            echo '<div class="v_s_price">'.$giaSell.'</div>';
                                                        echo '</div>';                            
                                                    echo '</div>';    
                                                    echo '</div>';    
                                                echo '</li>';
                                                
                                            }
                                        ?>
                                        
                                    </ul>
                                </div>

                                <div class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</div>
                                <div class="jcarousel-control-next" data-jcarouselcontrol="true">›</div>


                            </div>
                    </div>
                    
                    <?php
                    } // end foreach
                    ?>
                    
                   
                    
                   
                    

                </div>        
                <h2 id="h2-intro">...Và còn rất nhiều thiết bị nhà bếp cao cấp khác tại Bếp An Khang <br />
                Bạn đã sẵn sàng nâng tầm không gian bếp cho gia đình mình chưa?</h2>
            </div>    
        </div>



        <div id="our-clients">
            <div class="container main-wrapper">
                <div class="des">Cảm ơn những khách hàng đã tin tưởng và sẽ luôn đồng hành cùng Bếp An Khang.</div>
                <div class="small-hr"></div>
                <div class="number-clients"><span class="count">4613</span> khách hàng đã mua và hài lòng về sản phẩm.</div>
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="customer">
                            <div class="picture"><img src="<?php echo PATH_TO_IMAGES; ?>hinhkhach1.jpg" /></div>
                            <div class="name">Diệu Vân</div>
                            <div class="comment">Cảm ơn Bếp An Khang đã cho gia đình tôi 1 không gian bếp đầm ấm.</div>
                        </div>    
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="customer">
                            <div class="picture"><img src="<?php echo PATH_TO_IMAGES; ?>hinhkhach2.jpg" /></div>
                            <div class="name">Tiến Hoàng</div>
                            <div class="comment">Tư vấn rõ ràng, nhiệt tình. Đã mua bếp và sẽ giới thiệu thêm cho người thân.</div>
                        </div>    
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="customer">
                            <div class="picture"><img src="<?php echo PATH_TO_IMAGES; ?>hinhkhach3.jpg" /></div>
                            <div class="name">Anh Dũng</div>
                            <div class="comment">+ 1 like cho doanh nghiệp bán đúng giá - đúng chất lượng cam kết.</div>
                        </div>    
                    </div>
                </div>
            </div>                
        </div>

<?php get_footer(); ?>

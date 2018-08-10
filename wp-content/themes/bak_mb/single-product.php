<?php get_header(); ?>


<div id="main-body">
    <div class="container main-wrapper">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <div id="list-product-area" class="list-products row"></div>
                
                <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    
                        <?php 
                        
                            echo '<div itemscope itemtype="http://schema.org/Product">';
                            echo '<h1 itemprop="name">'.get_the_title().'</h1>';
                            
                        ?>
                        
                    
                    <div class="pro-head row">
                        <div class="pro-thumb col-sm-5 col-xs-12">
                            <?php 
                            echo '<img itemprop="image" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" />';                                
                            ?>
                        </div>
                        <div class="pro-info col-sm-7 col-xs-12">                            
                            <?php 
                                echo bak_social_share();
                                    
                            $pid = get_the_ID();
                            
                                $des = get_post_meta($pid, '_yoast_wpseo_metadesc', true);
                                
                                echo '<meta itemprop="description" content="'.$des.'" />';
                                    
                                                       
                                    
                                    $brands = get_the_terms(get_the_ID(), 'product-category');
                                    if(is_array($brands)){
                                        $brand = array_shift($brands);                                        
                                        echo '<div><b>Hãng sản xuất: </b><span class="v_brand" itemprop="brand"><a href="'.get_term_link($brand).'">'.$brand->name.'</a></span></div>';
                                    }
                                    $d_price = get_post_meta(get_the_ID(), 'wpcf-product_display_price', true);
                                    $s_price = get_post_meta(get_the_ID(), 'wpcf-product_sell_price', true);
                                    $code = get_post_meta(get_the_ID(), 'wpcf-product_code', true);
                                    $promotion = get_post_meta(get_the_ID(), 'wpcf-product_promotion', true);
                                    $guarantee = get_post_meta(get_the_ID(), 'wpcf-product_guarantee', true);
                                                                                      
                            
                                    echo '<div><b>Tên sản phẩm: </b><a itemprop="url" href="'. get_permalink().'">'.get_the_title().'</a></div>';
                            
                                    echo '<link itemprop="url" href="<?php echo get_permalink(); ?>" rel="author"/>';
                            
                                    if($d_price){
                                        echo '<div><b>Giá chính hãng: </b><span class="v_d_price">'.bak_display_money($d_price).'</span></div>';
                                    }
                                    $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                                    echo '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer"><div><b>Giá bán: </b>    <meta itemprop="priceCurrency" content="VND" /><span class="v_s_price" itemprop="price" content="'. $s_price.'">'.$giaSell.'</span> </div>';
                                    echo '<div><b>Giá cho nhà thầu: </b>Liên hệ</div>';
                                    echo '<div><b>Tình Trạng: </b> <span > <link itemprop="availability" href="http://schema.org/InStock" />Còn hàng</span</div></div>';
                                    echo '<div><b>Khuyến mãi: </b><span class="v_promotion">'.$promotion.'</span></div>';
                                    echo '<div><b>Bảo hành: </b><span class="v_guarantee">'.$guarantee.'</span></div>';    
                                   
                            
                                echo '</div>';
                          
                                
                                    // check already in cart
                            $existed = false;
                            if(isset($_SESSION['cart'])){
                                $cart = $_SESSION['cart'];
                                if(in_array($pid, $cart)){
                                    $existed = true;                                   
                                }
                            }
                            
                            if($existed){
                                echo '<div id="btnAddToCart" class="added" data-pid="'.get_the_ID().'"><i class="fas fa-cart-arrow-down"></i> Đã vào giỏ hàng</div>';       
                            }else{
                                    echo '<div id="btnAddToCart" data-pid="'.get_the_ID().'"><i class="fas fa-cart-arrow-down"></i> Cho vào giỏ hàng</div>';       
                            }
                            
                                ?>
                            <div id="directCall"><a href="tel:0963391379"><i class="fa fa-phone" aria-hidden="true"></i> Hotline:  0963 39 1379</a></div>
                            <div id="cartStatus"></div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <?php 
                            $is_bep = check_is_bep_tu($brand->term_id);
                        
                            if($is_bep){
                        ?>
                        <div id="show-other">                            
                            <p>Dòng bếp từ này chưa phù hợp với bạn? Xem thêm các model bếp từ khác:</p> 
                            <a href="/tim-kiem/?slBrand=7&amount=1+-+10000000"><i class="far fa-circle"></i> Giá < 10.000.000₫</a>
                            <a href="/tim-kiem/?slBrand=7&amount=10000000+-+20000000"><i class="far fa-circle"></i> Giá 10.000.000₫ <i class="fas fa-arrow-right"></i> 20.000.000đ</a>
                            <a href="/tim-kiem/?slBrand=7&amount=20000000+-+80000000"><i class="far fa-circle"></i> Giá > 20.000.000₫</a>
                        </div>
                        <?php }// end is bep ?>
                        
                        <div class="pro-main col-xs-12">
                            <?php 
                                the_content();
                                if(function_exists("kk_star_ratings")){ 
                                        echo '<div class="row pull-right">'.kk_star_ratings($pid).'</div>'; 
                                    } 
                            ?>
                                                       
                        </div>
                        
                         <div class="fb-comments" data-href="<?php echo get_permalink();?>" data-numposts="5"></div>
                        <div class="col-xs-12" id="related-product">
                            <?php
                                    $curID = get_the_ID();                                                                    
                                    $products = get_posts(array(
                                      'post_type' => 'product',
                                      'post__not_in' => array($curID),
                                      'numberposts' => -1,
                                      'tax_query' => array(
                                        array(
                                          'taxonomy' => 'product-category',
                                          'field' => 'id',
                                          'terms' => $brand->term_id,
                                          'include_children' => false
                                        )
                                      )
                                    ));                                    
                                ?>
                                                         
                            
                                <h2>Sản phẩm cùng thương hiệu</h2>
                                <div class="list-products row">
                                    <?php 
                                    foreach ($products as $product){ 
                                        display_product_item($product);                                        
                                    }
                                    ?>
                                </div>
                        </div>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>

            <div class="col-sm-3 col-xs-12" id="main-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
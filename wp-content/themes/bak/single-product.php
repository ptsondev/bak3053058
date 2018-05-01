<?php get_header(); ?>


<div id="main-body">
    <div class="container main-wrapper">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <div id="list-product-area" class="list-products row"></div>
                
                <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <div class="pro-head row">
                        <div class="pro-thumb col-sm-5 col-xs-12">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="pro-info col-sm-7 col-xs-12">                            
                            <?php 
                                    echo bak_social_share();
                                                       
                                    $pid = get_the_ID();
                                    $brands = get_the_terms(get_the_ID(), 'brand');
                                    if(is_array($brands)){
                                        $brand = array_shift($brands);                                        
                                        echo '<div><b>Hãng sản xuất: </b><span class="v_brand"><a href="'.get_term_link($brand).'">'.$brand->name.'</a></span></div>';
                                    }
                                    $d_price = get_post_meta(get_the_ID(), 'wpcf-product_display_price', true);
                                    $s_price = get_post_meta(get_the_ID(), 'wpcf-product_sell_price', true);
                                    $code = get_post_meta(get_the_ID(), 'wpcf-product_code', true);
                                    $promotion = get_post_meta(get_the_ID(), 'wpcf-product_promotion', true);
                                    $guarantee = get_post_meta(get_the_ID(), 'wpcf-product_guarantee', true);
                            
                                    
                                    echo '<div><b>Model: </b><span class="v_code">'.$code.'</span></div>';
                                    if($d_price){
                                        echo '<div><b>Giá: </b><span class="v_d_price">'.bak_display_money($d_price).'</span></div>';
                                    }
                                    $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                                    echo '<div><b>Giá sale: </b><span class="v_s_price">'.$giaSell.'</span></div>';
                                    echo '<div><b>Khuyến mãi: </b><span class="v_promotion">'.$promotion.'</span></div>';
                                    echo '<div><b>Bảo hành: </b><span class="v_guarantee">'.$guarantee.'</span></div>';     
                                
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
                            echo '<div id="cartStatus"></div>';
                                ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="pro-main col-xs-12">
                            <?php the_content();?>
                            
                              <div id="product-schema">
                                <?php $des = get_post_meta($pid, '_yoast_wpseo_metadesc', true); ?>
                                <div itemscope itemtype="http://schema.org/Product">
                                        <meta itemprop="description" content="<?php echo $des; ?>">
                                    <link itemprop="url" href="<?php echo get_permalink(); ?>" rel="author"/>
                                    <a itemprop="url" href="<?php echo get_permalink(); ?>"><span itemprop="name"><strong><?php the_title(); ?></strong></span></a>
                                    <span itemscope itemtype="http://schema.org/Brand" ><span itemprop="name"><?php echo $brand->name; ?></span></span>
                                    <span>Model: <span itemprop="model"><?php echo $code; ?></span></span>
                                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <span itemprop="price"><?php echo $giaSell; ?></span>                                        
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                         <div class="fb-comments" data-href="<?php echo get_permalink();?>" data-numposts="5"></div>
                        <div class="col-xs-12" id="related-products">
                            <?php
                                    $curID = get_the_ID();                                                                    
                                    $products = get_posts(array(
                                      'post_type' => 'product',
                                      'post__not_in' => array($curID),
                                      'numberposts' => -1,
                                      'tax_query' => array(
                                        array(
                                          'taxonomy' => 'brand',
                                          'field' => 'id',
                                          'terms' => $brand->term_id,
                                          'include_children' => false
                                        )
                                      )
                                    ));                                    
                                ?>
                                                         
                            
                                <h2>Sản phẩm cùng thương hiệu</h2>
                                <div class="row">
                                    <?php 
                                    foreach ($products as $product){ 
                                        echo '<div class="col-sm-4 col-xs-12">';
                                            echo '<div class="thumb"><a href="'.get_permalink($product->ID).'">';
                                                echo '<img src="'.bak_get_thumbnail($product->ID, 400, 300).'" />';
                                                echo '<div class="info">';
                                                    echo '<div class="title">'.$product->post_title.'</div>';
                                                    $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
                                                    $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
                                                    $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                                        
                                                    echo '<div class="v_d_price">'.bak_display_money($d_price).'</div>';
                                                    echo '<div class="v_s_price">'.$giaSell.'</div>';
                                                echo '</div>';
                                            echo'</a></div>';
                                            //echo '<div class="title"><a href="'.get_permalink($product->ID).'">';
                                            //    echo $product->post_title;
                                            //echo '</a></div>';
                                        echo '</div>';
                                    } //end foreach 
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
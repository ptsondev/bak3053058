<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row main-p-products">
            <div class="col-sm-9 col-xs-12">
                <div id="list-product-area" class="list-products row"></div>
                    
                <?php 
                    $term =get_queried_object();
                    echo '<h1>'.$term->name.'</h1>';    
                    echo '<div class="term-des">'.$term->description.'</div>';
                ?>
                <div class="list-products row">
            <?php
                $products = get_posts(array(
                    'post_type' => 'product',
                    'numberposts' => -1,
                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'brand',
                                          'field' => 'term_name',
                                          'terms' => $term,
                                          'include_children' => false
                                        )
                                      )
                ));    
                
               foreach ($products as $product){ 
                    echo '<div class="col-sm-4 col-xs-12">';
                    echo '<div class="prod">';
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
                   echo '</div>';
               } //end foreach                                       
            ?>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12" id="main-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
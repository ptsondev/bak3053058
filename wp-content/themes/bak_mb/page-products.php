<?php
/*
  Template Name: Products
 */
?>
<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <?php //get_template_part('search-area'); ?>
        <div class="row main-p-products">            
            <div class="col-sm-9 col-xs-12">
                <h1>Sản phẩm</h1>
                <div id="list-product-area" class="list-products row">
            <?php
                    
                    //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

                    //var_dump($paged);
                     $args = array(
                            'numberposts' => -1,
                            'post_type' => 'product' ,
                            'order' =>'ASC'
                        );
                    
               
                $wp_query = new WP_Query($args);
                    
               while ($wp_query->have_posts()){ 
                   $wp_query->the_post();
                    echo '<div class="col-sm-4 col-xs-12">';
                   $product = get_post(get_the_ID());
                    $show = get_post_meta($product->ID, 'wpcf-show', true);
                    
                    echo '<div class="prod">';
                       if(is_array($show) && count($show)>0){
                            echo '<div class="best-seller"></div>';
                        }
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
               } //end while                                     
            ?>
                </div>
                
                <div id="page-paginate">
                        <?php if(function_exists('wp_simple_pagination')) {                
                        //    echo wp_simple_pagination();
                        } 
                        wp_reset_query();
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
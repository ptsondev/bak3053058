<!--<div id="product-category" class="block">
    <h3>Thương hiệu</h3>
    <?php 
        $terms = get_terms( 'brand', array(
            'hide_empty'=>0
        ));                                    
                                        
        foreach($terms as $term){
            echo '<li class="c1">';
                echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
                /*
                $products = get_posts(array(
                    'post_type' => 'product',
                    'numberposts' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'brand',
                            'field' => 'term_name',
                            'terms' => $term,
                            'include_children' => true
                        )
                    )
                ));    
                if(is_array($products) && !empty($products)){
                    echo '<ul class="su-menu su-menu-2">';
                    foreach ($products as $product){                             
                        echo '<li><a href="'.get_permalink($product->ID).'">'.$product->post_title.'</a></li>';
                    }
                    echo '</ul>';
                }
               */
            echo '</li>';
        }
                   
    ?>   
</div>-->

<?php     
    if(isset($_SESSION['active']) && $_SESSION['active']=='san-pham'){
        // nhung trang ve bep tu thi hien khung search san pham
        get_template_part('search-area'); 
    }
    
?>


<div id="best-sell-products">
    <h3 class="block-title">Bán chạy nhất</h3>
<?php 
    $products = get_posts(array(
        'post_type' => 'product',        
        'numberposts' => 5,
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
        
        echo '<div class="row product">';
            echo '<div class="col-sm-5 col-xs-12"><a href="'.get_permalink($product->ID).'"><img src="'.bak_get_thumbnail($product->ID, 400, 300).'" /></a></div>';
            echo '<div class="right col-sm-7 col-xs-12">';
                echo '<a href="'.get_permalink($product->ID).'">'.$product->post_title.'</a>';
                echo '<div class="price">';
                    echo '<div class="v_d_price">'.bak_display_money($d_price).'</div>';
                    echo '<div class="v_s_price">'.$giaSell.'</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';       
    }
?>
</div>
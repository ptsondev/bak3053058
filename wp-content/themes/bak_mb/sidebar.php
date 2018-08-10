<?php   
    $queried_object = get_queried_object();
    $parent_tax = $cur_tax = 0;
    if(isset($queried_object->post_type) && $queried_object->post_type=='product'){
        $cats = get_the_terms($queried_object->ID, 'product-category');
        if(is_array($cats)){
            $cur_tax = array_shift($cats);   
            if($cur_tax->parent!=0){
                $parent_tax = get_term($cur_tax->parent);
            }else{
                $parent_tax = $cur_tax;
            }
        }        
    }

    if($queried_object->taxonomy=='product-category'){
        if($queried_object->parent!=0){
            $parent_tax=get_term($queried_object->parent);
        }else{
            $parent_tax = $queried_object;
        }
        $cur_tax=$queried_object;
    }


    echo '<div id="sidebar-sub-cat" class="block">';
        echo '<h3 class="block-title">Các hãng '.$parent_tax->name.'</h2>';
        echo '<div class="block-content">';
        $children = get_terms( 'product-category', array(
            'hide_empty'=>0,
            'parent'=>$parent_tax->term_id
        )); 
        if(!empty($children)){
            foreach($children as $child){
                $active = ($cur_tax->term_id==$child->term_id)?'active':'';
                echo '<li class="lev-1 '.$active.'"><a '.$nofollow.' href="'.get_term_link($child).'"><i class="fas fa-plus-square"></i> '.$child->name.'</a></li>';
            }
        }
        echo '</div>';
    echo '</div>';

    //if(isset($queried_object->ID) && $queried_object->ID==297){
        // hien o trang tim kiem san pham
    //    get_template_part('search-area'); 
    //}
    
?>

<div id="best-sell-products">
    <h3 class="block-title"><?php echo $parent_tax->name;?> bán chạy</h3>
<?php 
    $products = get_posts(array(
        'post_type' => 'product',        
        'numberposts' => 5,
        'order' =>'ASC',
        'tax_query' => array(
        array(
            'taxonomy' => 'product-category',
            'field' => 'term_id',
            'terms' => $parent_tax->term_id,
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

<div id="knowledges">
    <h3 class="block-title">Câu hỏi thường gặp</h3>
    <?php 
        $qnas = get_posts(array(
                    'post_type' => 'qna',                    
                    'numberposts' => -1,                    
                ));    
                //var_dump($articles);
                foreach($qnas as $qna){
                        
                            echo '<div class="title"><a href="'.get_permalink($qna->ID).'">'.$qna->post_title.'</a></div>';
                            
                    
                }
    ?>
</div>

<div id="ads">
    <a href="/khuyen-mai-cuc-shock-khi-mua-bep-tu/"><img src="<?php echo PATH_TO_IMAGES; ?>/khuyen-mai-mua-bep-tang-hut-noi.png" alt="Khuyến mãi mua bếp từ tặng hút mùi"/></a>
</div>

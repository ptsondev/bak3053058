<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row main-p-products">
            <div class="col-sm-9 col-xs-12">
                <div id="list-product-area" class="list-products row"></div>
                 <?php 
                    $term =get_queried_object();
                    $include_children = ($term->parent==0)?true:false;
                //var_dump($term);
                    echo '<h1>'.$term->name.'</h1>';
                    echo '<div class="term-des">'.$term->description.'</div>';
                ?>
                
                  
            <?php
                $arr =array(
                    'post_type' => 'product',
                    'numberposts' => -1,
                    'order' => 'ASC',
                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'product-category',
                                          'field' => 'term_id',
                                          'terms' => $term->term_id,
                                          'include_children' => true,
                                        )
                                      )
                );    
           

                    
                    //var_dump($term);
                    if(check_is_bep_tu($term->term_id)){
                        echo '<div id="filterCook">';
                        echo '<a href="'.get_term_link($term).'?numCook=2" class="filterNumCook">Bếp 2 vùng nấu</a>';    
                        echo '<a href="'.get_term_link($term).'?numCook=3" class="filterNumCook">Bếp 3 vùng nấu</a>';    
                        echo '<a href="'.get_term_link($term).'?numCook=4" class="filterNumCook">Bếp >= 4 vùng nấu</a>';  
                        echo '</div>';
                        echo '<div class="clearfix"></div>';
                        if(isset($_REQUEST['numCook'])){
                            $numCook = htmlspecialchars($_REQUEST['numCook']);    
                            $compare = ($numCook == 4)? '>=':'=';
                            $arr['meta_query'][]=array(
                                    'key' => 'wpcf-num_cook',
                                    'value' => $numCook,        
                                    'compare' => $compare
                            );                            
                        }
                    }
                
                 if(check_is_hut_mui($term->term_id)){
                        echo '<div id="filterCook">';
                        $tmp = array(76, 77, 78, 79, 80);
                        foreach($tmp as $k){
                            $tag = get_tag($k);
                            echo '<a href="'.get_term_link($term).'?tag_id='.$k.'" class="filterNumCook">'.$tag->name.'</a>';        
                        }                       
                        echo '</div>';
                        echo '<div class="clearfix"></div>';
                        if(isset($_REQUEST['tag_id'])){
                            $tag_id = htmlspecialchars($_REQUEST['tag_id']);    
                            $arr['tag_id']=$tag_id;
                        }
                    }
                
    
                    $products = get_posts($arr);

            $script = '<script type="application/ld+json">
{ "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[';
    
                echo '<div class="list-products row">';
                    $i=1;
               foreach ($products as $product){ 
                   display_product_item($product); 
                   $script .= '
                    {
      "@type":"ListItem",
      "position":'.$i++.',
      "url":"'.get_permalink($product->ID).'"
    },';
               } //end foreach      
                    
                    $script = rtrim($script,',');

                    $script.= ']}</script>';
                    echo $script;
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
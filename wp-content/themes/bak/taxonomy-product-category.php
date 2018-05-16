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
                <div class="list-products row">
            <?php
                $products = get_posts(array(
                    'post_type' => 'product',
                    'numberposts' => -1,
                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'product-category',
                                          'field' => 'term_name',
                                          'terms' => $term,
                                          'include_children' => $include_children,
                                        )
                                      )
                ));    
           

    

            $script = '<script type="application/ld+json">
{ "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[';
    
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
<?php get_template_part('sherhead'); 
        $queried_object = get_queried_object();
        //var_dump($queried_object);  die;
                                            ?>
<div id="main-area">		
	<div class="container wrapper">		
            <div id="main-content" class="col-sm-12 col-xs-12 page-service-cat" role="main">
                <?php echo get_template_part('breadcrumb'); ?>
                <h1><?php echo $queried_object->name; ?></h1>            
                <div id="term-des"><?php echo $queried_object->description; ?></div>
                
                <div class="col-sm-9 col-xs-12">                    
                    <div class="row">
                    <?php
                        $args = array(
                            'showposts' => 20,
                            'post_type' => 'service',                            
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service-category', 
                                    'terms'    => $queried_object->term_id
                                )
                            ),
							'orderby' => 'post_date',
							'order'   => 'ASC',
                        );

                        $wp_query = new WP_Query($args);
                        if ($wp_query->have_posts()) {            
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                                echo '<div class="col-sm-4 col-xs-12 article-item">';     
                                    echo '<div class="title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></div>';
                                    $thumb = snh_get_thumbnail(get_the_ID(), 300, 300);                                
                                ?>
                    
                    
                                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                        <div class="flipper">
                                                <div class="front">
                                                    <?php    echo '<div class="thumb"><a href="'.get_permalink(get_the_ID()).'"><img src="'.$thumb.'" alt="'.get_the_title().'"/></a></div>'; ?>
                                                </div>
                                                <div class="back">
                                                        <?php echo '<div class="des">'.snh_get_description(get_the_ID()).'<div class="more"><a href="'.  get_permalink(get_the_ID()).'">Xem Thêm</a></div></div>'; ?>
                                                </div>
                                        </div>
                                </div>
                    
                    
                                <?php                                   
                                echo '</div>';
                            endwhile;                       
                        }                        
                    ?>
                    
                    <div id="page-paginate">
                        <?php if(function_exists('wp_simple_pagination')) {                
                            echo wp_simple_pagination();
                        } 
                        wp_reset_query();
                        ?> 
                    </div>
		</div>
                    </div>
		
                <div class="col-sm-3 col-xs-12" id="sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            
        </div>        
        
</div>



<?php get_footer(); ?>

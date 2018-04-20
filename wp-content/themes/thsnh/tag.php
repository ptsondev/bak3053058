<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php get_template_part('sherhead'); ?>


<div id="main-area">		
	<div class="container wrapper">		
            <div id="main-content" class="col-sm-12 col-xs-12 page-service-cat" role="main">
                <?php echo get_template_part('breadcrumb'); ?>
				<?php if ( have_posts() ) : ?>
                <h1><?php printf( __( 'Tag: %s', 'twentythirteen' ), single_tag_title( '', false ) ); ?></h1>  
				
				<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
				<?php endif; ?>
				
				<div class="row">
                <div class="col-sm-9 col-xs-12">
                    <?php while ( have_posts() ) : the_post(); 
						
						 echo '<div class="col-sm-4 col-xs-12 article-item">';     
                                    echo '<div class="title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></div>';
                                    $thumb = snh_get_thumbnail(get_the_ID(), 400, 400);                                
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
							endwhile; ?>
                        
                    <div id="page-paginate">
                        <?php if(function_exists('wp_simple_pagination')) {                
                            echo wp_simple_pagination();
                        } 
                        wp_reset_query();
                        ?> 
                    </div>
		</div>
		
                <div class="col-sm-3 col-xs-12" id="sidebar">
                    <?php get_sidebar(2); ?>
                </div>
				</div>
				
				<?php endif; ?>
				
            </div>
            
        </div>        
        
</div>

	
<?php get_footer(); ?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_template_part('sherhead'); ?>

<div id="main-area">		
	<div class="container wrapper">		
		<?php $has_sidebar = is_active_sidebar('left-sidebar'); ?>
		<div id="main-content" class="col-sm-9 col-xs-12" role="main">
			<?php get_template_part('breadcrumb');?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article itemscope itemtype="http://schema.org/CreativeWork" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title" itemprop="about"><?php the_title(); ?></h1>
					
					<div  class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
					<div class="vcard author post-author" itemprop="author">Posted by <a href="http://snh.vn/cong-ty-thiet-ke-quang-cao-snh/">Công ty thiết kế quảng cáo SNH</a></div>
					<span class="updated" itemprop="datePublished"><?php echo get_the_date('d/m/Y', get_the_ID());?></span>
					<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>					
				</article>

				<?php // comments_template(); ?>
			<?php endwhile; ?>
			
		</div>
		
		<div id="sidebar" class="col-sm-3 col-xs-12">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>
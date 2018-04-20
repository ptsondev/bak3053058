<?php get_template_part('sherhead'); ?>

<div id="main-area">		
	<div class="container wrapper">		
		<?php $has_sidebar = true;
			$col = 'col-sm-9';
			/*if(get_the_ID()==559 || get_the_ID()==137 || get_the_ID()==588){ 
				$has_sidebar = false;
				$col = 'col-sm-12';
			}*/
		?>
		<div id="main-content" class="<?php echo $col; ?> col-xs-12" role="main">
			<?php get_template_part('breadcrumb');?>
			<?php while ( have_posts() ) : the_post(); ?>

			<article itemscope itemtype="http://schema.org/NewsArticle" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>					
					<h1 class="entry-title"  itemprop="headline"><?php the_title(); ?></h1>
                                        <div id="article-social">
                                            <span class="post-date"><span class="author" itemprop="author" ><span itemprop="name">Thiết kế quảng cáo SNH</span></span> - <span class="updated" itemprop="datePublished"><?php echo get_the_date('d/m/Y', get_the_ID());?></span></span>
											<meta itemprop="dateModified" content="<?php  the_modified_date('d/m/Y'); ?>" />
                                            <?php echo theme_social_share(); ?>
                                        </div>
					<?php 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'thumbnail_size' );
						$url = $thumb['0']; 
						if($thumb && !empty($thumb)){
							echo' <div class="s-hidden" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<img src="'.$thumb[0].'"/>
								<meta itemprop="url" content="'.$thumb[0].'">
								<meta itemprop="width" content="'.$thumb[1].'">
								<meta itemprop="height" content="'.$thumb[2].'">
							</div>';
						}
  
					?>
					
					<div class="entry-content" itemprop="articleBody">
						<?php the_content(); ?>
					</div>
					 
						<a href="http://snh.vn/dich-vu/thiet-ke-catalogue/">Thiết kế catalogue chuyên nghiệp</a> 
						<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
							<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"> 
							  <img src="http://snh.vn/wp-content/themes/thsnh/images/snhlogo3.jpg"/>
							  <meta itemprop="url" content="http://snh.vn/wp-content/themes/thsnh/images/snhlogo3.jpg">
							  <meta itemprop="width" content="233">
							  <meta itemprop="height" content="233">
							</div>
							<meta itemprop="name" content="Công ty Thiết Kế Quảng Cáo SNH">
						</div>
					
					<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>					
				</article>				
				<?php // comments_template(); ?>
			<?php endwhile; ?>
			
			<div class="row">
					<h3>Liên hệ với SNH để đặt hàng/ yêu cầu:</h3>  
				<?php echo do_shortcode('[contact-form-7 id="578" title="Liên hệ đặt in"]'); ?>
			</div>
				
		</div>
		
		<?php 
			if($has_sidebar){
		?>
		<div id="sidebar" class="col-sm-3 col-xs-12">
			<?php get_sidebar(); ?>
		</div>
		<?php } ?>
		
	</div>
</div>
<?php get_footer(); ?>
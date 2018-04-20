<?php get_template_part('sherhead'); ?>

<div id="main-area">		
	<div class="container wrapper">		
		<?php $has_sidebar = is_active_sidebar('left-sidebar'); ?>
		<div id="main-content" class="col-sm-9 col-xs-12" role="main">
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
	
	
				<?php 
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
							echo '<div class="block" style="margin-top:40px; border-top:1px dotted #ccc; padding-top:10px;">';
							echo '<h2 class="block-title" id="related-block">Bài viết liên quan</h2>';
							$first_tag = $tags[0]->term_id;
							$args=array(
								'showposts' => 5,
								'post_type' => 'article',         
								'tag__in' => array($first_tag),
								'post__not_in' => array($post->ID),						
								'orderby' => 'post_date',
								'order'   => 'ASC',
								'caller_get_posts'=>1
							);
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
							while ($my_query->have_posts()) : $my_query->the_post();  ?>
								<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
							<?php 
							endwhile;
							}
							wp_reset_query();
							echo '</div>';
						}
						
			?>
			
			
				<div id="google-comment">
					 <div id="google_comments"><img src="/images/loading8.gif" alt="loading" /> Đang tải...</div>
					 <script src="https://apis.google.com/js/plusone.js" type="text/javascript">{lang: 'vi'}</script>
					 <script>gapi.comments.render('google_comments',{href:window.location.href,width: 680,height:200,first_party_property: 'BLOGGER',view_type: 'FILTERED_POSTMOD'});
						   function fix_google()
						   {
							  if($("#google_comments").length>0) $("#google_comments").css({"width":"100%"});							  
						   }
					</script>
				</div>
			
		
			<?php endwhile; ?>
						
			
		</div>
		
		<div id="sidebar" class="col-sm-3 col-xs-12">
			<?php get_sidebar(2); ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>
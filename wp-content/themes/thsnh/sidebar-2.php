<div class="block" id="google-search-block">
Tìm kiến thức liên quan
<script>
  (function() {
    var cx = '016301898695124702019:mbyl9aho2o8';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
</div>

<div class="block" id="sticky-article">
	<h2 class="block-title">Nên tham khảo</h2>
	<?php 
	$args = array(
		'showposts' => 10,		
		'post_type' => 'article',
		'meta_query' => array(
			array(
				'key'     => 'wpcf-sticky',
                'value'   => 1,                                    
            )                            
        ),
	);

	$wp_query = new WP_Query($args);
	if ($wp_query->have_posts()) {            
		while ($wp_query->have_posts()) : $wp_query->the_post();
			$thumb = snh_get_thumbnail(get_the_ID(), 100, 100);
			echo '<li>';
				//echo '<div class="col-sm-12 col-xs-12"><a href="'.get_permalink(get_the_ID()).'"><img src="'.$thumb.'" alt="'.get_the_title().'"/></a></div>';
				echo '<div class="col-sm-12 col-xs-12">';
					echo '<a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a>';
				//	echo '<div class="posted">'.get_the_date('d/m/Y', get_the_ID()).'</div>';
				echo '</div>';				
			echo '</li>';
		endwhile;                       
	}
	?>
	<div class="btn-all-articles"><i class="fa fa-info-circle"></i> <a href="http://snh.vn/kien-thuc/"> Xem tất cả kiến thức về thiết kế quảng cáo </a><i class="fa fa-info-circle"></i></div>
</div>


					
<div class="block">
<h2 class="block-title">Thiết kế quảng cáo</h2>
<?php display_list_child_service(TID_DESIGN); ?>
</div>
<div class="block">
<h2 class="block-title">Giải pháp Online</h2>
<?php display_list_child_service(TID_ONLINE); ?>
</div>
<div class="block">
<h2 class="block-title">Media</h2>
<?php display_list_child_service(TID_MEDIA); ?>
</div>

<div class="block" id="support-online">
	<h2 class="block-title">Tư vấn trực tuyến</h2>	
	<div class="col-sm-12 supporter">
		<div><i class="fa fa-user-plus"></i> <?php echo get_theme_mod('name1'); ?></div>
		<div><i class="fa fa-skype"></i> <a href="skype:<?php echo get_theme_mod('skype1'); ?>?chat"><?php echo get_theme_mod('skype1'); ?></a> </div>
		<div><i class="fa fa-phone"></i> <?php echo get_theme_mod('phone1'); ?></div>
	</div>
	<div class="col-sm-12" supporter>
		<div><i class="fa fa-user-plus"></i> <?php echo get_theme_mod('name2'); ?></div>
		<div><i class="fa fa-skype"></i> <a href="skype:<?php echo get_theme_mod('skype2'); ?>?chat"><?php echo get_theme_mod('skype2'); ?></a> </div>
		<div><i class="fa fa-phone"></i> <?php echo get_theme_mod('phone2'); ?></div>
	</div>
	
</div>

<div class="block">
	<div class="fb-page" data-href="https://www.facebook.com/ThietKeQuangCaoSNH" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ThietKeQuangCaoSNH"><a href="https://www.facebook.com/ThietKeQuangCaoSNH">Công Ty Thiết Kế Quảng Cáo SNH</a></blockquote></div></div>
</div>


<div class="block" id="site-brochure-ad">
<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="site stats" ><script  type="text/javascript" >
try {Histats.start(1,2672318,4,15,170,40,"00011001");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2672318&101" alt="site stats" border="0"></a></noscript>
<!-- Histats.com  END  -->
<a href="http://snh.vn/dich-vu/thiet-ke-brochure/">Thiết kế brochure chuyên nghiệp</a>
<div><a href="http://snh.vn/dich-vu/thiet-ke-brochure/"><img src="<?php echo IMG_PATH;?>dich-vu-thiet-ke-brochure-snh.png" alt="Dich vu thiet ke brochure"/></a></div>
</div>

<!--
<div class="block" id="mail-sub">
<b>Làm thế nào để trở thành 1 người sếp tốt? <br />
Làm thế nào để công ty phát triển vững mạnh hơn? <br /></b>
Đăng ký nhận <b>miễn phí</b> kiến thức về xây dựng và phát triển thương hiệu tại đây
<?php //echo do_shortcode('[sibwp_form]'); ?>
</div>-->
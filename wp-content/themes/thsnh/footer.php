<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<?php 
	$queried_object = get_queried_object();             
	if($queried_object->ID != PID_HOME){		
		echo '<div id="sub-footer"></div>';			
	}
?>
	
<footer id="main-footer">				
	<div class="container">
		<div class="col-sm-6 col-xs-12">
			<div itemscope itemtype="http://schema.org/Organization">
                            <h4 itemprop="name">Công ty thiết kế quảng cáo SNH</h4>
                            <div class="item status"><i class="fa fa-quote-left"></i> Đưa nghệ thuật vào từng thương hiệu <i class="fa fa-quote-right"></i></div>			
                            <div class="item address"  itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><i class="fa fa-home"></i> Địa chỉ: <?php echo get_theme_mod('o_address'); ?></div>
                            <div class="item phone" itemprop="telephone"><i class="fa fa-phone"></i> Điện thoại: <?php echo get_theme_mod('o_phone'); ?></div>
                            <div class="item email"  itemprop="email"><i class="fa fa-envelope-o"></i> Email: <?php echo get_theme_mod('o_email'); ?></div>
                        </div>
			<div class="social">
				<a class="facebook" rel="nofollow" href="https://www.facebook.com/ThietKeQuangCaoSNH"></a>
				<!--<a class="twitter" rel="nofollow"  href="<?php echo get_theme_mod('o_twitter'); ?>"></a>-->
				<!--<a class="linkhay" rel="nofollow"  href="<?php echo get_theme_mod('o_linkhay'); ?>"></a>-->
				<a class="youtube" rel="nofollow"  href="https://www.youtube.com/channel/UC_9ng7HZ_LKbUULI-ZxSkTQ"></a>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<h4>Kiến thức về thiết kế quảng cáo</h4>			
			<?php 
                        $args = array(
                            'showposts' => 5,
                            'post_type' => 'article',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'article-category',                                    
                                    'terms'    => 9
                                )
                            )
                        );

                        $wp_query = new WP_Query($args);
                        if ($wp_query->have_posts()) {            
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                                echo '<li><a href="'.  get_permalink().'"><i class="fa fa-dot-circle-o"></i> '.get_the_title().'</a></li>';
                            endwhile;                       
                        }
                        ?>
		</div>
	</div>
	<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div>
	<div class="contact-snh"><a rel="nofollow" href="http://snh.vn/lien-he"><img src="<?php echo IMG_PATH; ?>contact-snh.png" /></a></div>	
</footer>
<div id="copy-right"><a href="<?php echo get_permalink(PID_HOME); ?>">SNH</a> © 2014 PRIVACY POLICY</div>

<a href="http://snh.vn/wp-content/themes/thsnh/images/banner_2017.jpg" id="showPopup"></a>

	<?php wp_footer(); ?>
	
	</div> <!-- for END mmenu wrapper -->
</body>

<?php 
// deny copy content
if(!is_user_logged_in()){
?>
<script>
function click() {
if (event.button==2) 
{
	alert('Vui lòng không copy nội dung từ website này'); }
}
//document.onmousedown=click;

/*function reEnable(){
return true;
}
document.onselectstart=new Function ("return false");
if (window.sidebar){
document.onmousedown=click;
document.onclick=reEnable;
}*/

function addLink() {
 if (
window.getSelection().containsNode(
document.getElementsByClassName('entry-content')[0], true)) {
 var body_element = document.getElementsByTagName('body')[0];
 var selection;
 selection = window.getSelection();
 var oldselection = selection
 var pagelink = "<br /><br /> Xem thêm: <a href='<?php get_permalink();?>'><?php get_the_title(); ?></a> tại <a href='http://snh.vn'>SNH</a>"; //Change this if you like
 var copy_text = selection + pagelink;
 var new_div = document.createElement('div');
 new_div.style.left='-99999px';
 new_div.style.position='absolute';
 
body_element.appendChild(new_div );
 new_div.innerHTML = copy_text ;
 selection.selectAllChildren(new_div );
 window.setTimeout(function() {
 body_element.removeChild(new_div );
 },0);
}
}
document.oncopy = addLink;

</script>
<?php } ?>

</html>
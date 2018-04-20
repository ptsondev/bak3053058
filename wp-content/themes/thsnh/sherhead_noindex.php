<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!doctype html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html amp>
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title( '|', true, 'right' ); ?></title>	
    <meta name="robots"  CONTENT="NOINDEX, NOFOLLOW">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="YotaIaOvuQa95NuQ3O85bTVXxUYKh3iNc6nv7fCZL5o" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">	

        <?php wp_head(); ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo IMG_PATH; ?>snhlogo2.ico"/>
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-49884691-1', 'auto');
		  ga('send', 'pageview');

		</script>
		
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','//connect.facebook.net/en_US/fbevents.js');
		// Insert Your Facebook Pixel ID below. 
		fbq('init', '816612945137949');
		fbq('track', 'PageView');
		</script>
		<!-- Insert Your Facebook Pixel ID below. --> 
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=FB_PIXEL_ID&amp;ev=PageView&amp;noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?4FcoWKpL8pcHLx5N6F1yToq89faLFpyn";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->	


</head>

<body <?php body_class(); ?>>
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


	<div><!-- for mmenu wrapper -->
		
	<header id="main-header">				
		<div class="container">
			<div id="logo" class=""><a href="<?php echo get_home_url();?>"><img src="<?php echo IMG_PATH;?>snhlogo2.jpg" alt="Cong ty thiet ke quang cao SNH"/></a></div>
			<div id="menu-region" class="">
				<div id="p-hotline"><?php echo get_theme_mod('o_hotline'); ?></div>
				<a id="btn-show-menu" href="#mmenu"></a>			
				<nav id="mmenu">
					<?php 
						/*wp_nav_menu( array(
							'container'       => false,
							'container_class' => 'xxxvawevawewaewae',
							'menu_id' => 'main-menu'
						));*/ 
					?>
					<ul id="main-menu">
                                                <?php 
                                                    $queried_object = get_queried_object();
                                                    $cPID = $queried_object->ID;                                                    
                                                ?>
						<li <?php if($cPID==PID_HOME) echo 'class="active"'; ?>><a href="<?php echo get_permalink(PID_HOME);?>">Trang Chủ</a></li>
						<li <?php if($cPID==PID_ABOUT) echo 'class="active"'; ?>><a href="<?php echo get_permalink(PID_ABOUT);?>"><?php pll_e('Giới Thiệu'); ?></a></li>
						<li <?php if($cPID==PID_SERVICES) echo 'class="active"'; ?>><a href="<?php echo get_permalink(PID_SERVICES);?>">Dịch Vụ</a>
							<ul>
                                                            <li><a href="<?php echo get_term_link(TID_DESIGN, 'service-category'); ?>">Thiết Kế Quảng Cáo</a></li>
                                                            <li><a href="<?php echo get_term_link(TID_ONLINE, 'service-category'); ?>">Giải Pháp Online</a></li>
                                                            <li><a href="<?php echo get_term_link(TID_MEDIA, 'service-category'); ?>">Media</a></li>
                                                        </ul>
						</li>
						<li <?php if($cPID==PID_ARTICLES) echo 'class="active"'; ?>><a href="<?php echo get_permalink(PID_ARTICLES);?>">Kiến Thức</a></li>
						<li <?php if($cPID==PID_CONTACT) echo 'class="active"'; ?>><a href="<?php echo get_permalink(PID_CONTACT);?>">Liên Hệ</a></li>
						
						<li><a href="http://snh.vn/portfolio">Portfolio</a></li>
					</ul>
				</nav>
			</div>				   
		</div>	
	</header>
	
	<?php 
                $queried_object = get_queried_object();             
		if($queried_object->ID != PID_HOME){			
			echo '<div id="sub-header"></div>';			
		}
	?>
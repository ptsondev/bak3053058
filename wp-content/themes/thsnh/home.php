<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>	
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
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
		
</head>

<body id="index3">
	<div id="box">
		<div id="light"></div>
		<div id="g-content">
			<h1 id="snh-name"><a href="<?php echo get_permalink(PID_HOME); ?>">SNH</a><span id="cursor"></span></h1>
			<div id="snh-des">
				<div class="des des-1">Thiết kế quảng cáo</div>
				<div class="des des-2">Xây dựng thương hiệu</div>			
			</div>
			<!--<div id="home-product"><img src="images/home-product.png" alt="okie" /></div>-->
		</div>
	</div>

</body>

<script>
jQuery(document).ready(function($){	
	setTimeout(function(){ window.location = 'http://snh.vn/home/'; }, 8000);
}); 
</script>


</html>
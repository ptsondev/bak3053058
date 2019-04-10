<?php

    $ip= $_SERVER['REMOTE_ADDR'];
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $google_ad = 0;
    //gclid
    if(strpos($url, 'gclid')!=FALSE){
        $google_ad = 1;
    }
    if($google_ad){
        $db = connect_db();
        $db->queryNoResult('INSERT INTO k_visit(IP, url, time, google_ad) VALUES("'.$ip.'", "'.$url.'", "'.time().'", '.$google_ad.')');
        detect_click_tac($ip);
    }

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/bep-an-khang.ico"/>
   
    <?php wp_head(); ?>
    <?php
         echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
        ?>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49884691-5"></script>    
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-49884691-5');
</script>
    
    <?php 
        $obj = get_queried_object();
        if(isset($obj->post_type) && $obj->post_type=='product'){
        ?>
        <script>
          gtag('event', 'page_view', {
            'send_to': 'UA-49884691-5',
            'ecomm_pagetype': 'pdetail',
            'ecomm_prodid': '<?php echo $obj->ID;?>'
          });
        </script>
    <?php
        }
        
    ?>
    


    <script type="text/javascript">
    window.addEventListener('load',function(){
        jQuery("[href^='tel:']").click(function(){
            gtag('event', 'click', {  'event_category': 'button', 'event_label': 'hotline' });
        });
        
        jQuery("input.wpcf7-submit").click(function(){
            gtag('event', 'click', {  'event_category': 'button', 'event_label': 'submitform' }); 
        });
    });
</script>
</head>

<body <?php body_class($res_class); ?>>
    <div id="fb-root"></div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '996859750375075');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=996859750375075&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


    <?php 
        $active = '';
        $breadcrumb = check_current_page($active);     
        $_SESSION['active']=$active;
    
    ?>
    
    <div id="main-header">

        <div class="row-1">
            <div class="container main-wrapper">
                <div class="row">
                    <span class="col-sm-7 col-xs-6" id="primary-menu">
                        <li><a href="/">Trang Chủ</a></li>
                        <li><a href="/loi-ngo">Lời Ngỏ</a></li>
                        <li><a href="/bep-tu-khuyen-mai/">Khuyến Mãi</a></li>
                        
                        <li><a href="/dieu-khoan">Điều khoản</a></li>
                        <li><a href="/lien-he">Liên hệ</a></li>
                    </span>
                    <span class="hotline col-sm-5 col-xs-6"><i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo AK_DT_BAN; ?>"><?php echo AK_DT_BAN_SHOW; ?></a> | 
                        <a href="tel:<?php echo AK_HOTLINE; ?>"><?php echo AK_HOTLINE_SHOW; ?></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="row-2">
            <div class="container main-wrapper">
                <div class="row">
                    <div id="site-logo" class="col-sm-3 col-xs-12">
                        <a href="https://bepankhang.com"><img src="<?php echo PATH_TO_IMAGES; ?>logo.png" alt="Bếp An Khang" /></a>
                        <!--<did id="site-name">Bếp An Khang</did>
                        <div id="site-slogan">Nâng Tầm Bếp Việt</div>-->
                        <a href="tel:0963391379" id="subCall"><i class="fa fa-phone" aria-hidden="true"></i> 0963 39 1379</a>
                        <div id="btnShowMenu"><i class="fas fa-bars"></i></div>
                    </div>
                    <div id="menu-region" class="col-sm-9 col-xs-12">
                        <div id="header-search">
                            <form action="/tim-kiem" method="get">
                                <input type="text" id="hKey" name="key" placeholder="Tìm sản phẩm theo tên hoặc model" />
                                <input type="submit" id="hSubmit" name="hSubmit" value="" />
                            </form>
                        </div>
                        <a href="/gio-hang"><div id="cart">
                            <?php if(isset($_SESSION['cart'])){ echo '(<span id="numCart">'.count($_SESSION['cart']).'</span>)'; }?>
                        </div></a>
                        <div id="main-menu">
                            
                                    <?php 
                                        $terms = get_terms( 'product-category', array(
                                            'hide_empty'=>0,
                                            'parent'=>0
                                        )); 
                                        foreach($terms as $term){
                                            $class = ($active==$term->slug)?'active':'';
                                            echo '<li class="lev-0 '.$class.'">';
                                                //echo $term->name;
                                                echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
                                            
                                            /*    $children = get_terms( 'product-category', array(
                                                    'hide_empty'=>0,
                                                    'parent'=>$term->term_id
                                                )); 
                                                if(!empty($children)){
                                                    $nofollow = ($term->term_id!=7)?'rel="nofollow"':'';
                                                    echo '<ul class="sub-menu sub-menu-1">';
                                                        foreach($children as $child){
                                                            echo '<li class="lev-1"><a '.$nofollow.' href="'.get_term_link($child).'">'.$child->name.'</a></li>';
                                                        }
                                                    echo '</ul>';
                                                }*/
                                            echo '</li>';                                            
                                        }                                        
                                    ?>
                                                                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div id="slider-wrapper">
                <div id="slide-region">                  
                    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 1200px; height: 400px;">
                            <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1200px; height: 400px;">
        <div><a href="/bep-tu-khuyen-mai/"><img u="image" src="<?php echo PATH_TO_IMAGES; ?>ts3.png" /></a></div>        
        <div><a href="/bep-tu-khuyen-mai/"><img u="image" src="<?php echo PATH_TO_IMAGES; ?>1-doi-1.jpg" /></a></div>        
        
    </div>
    
                        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
        <style>
            .jssora082 {display:block;position:absolute;cursor:pointer;}
            .jssora082 .c {fill:#fff;fill-opacity:.5;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:0.3;}
            .jssora082 .a {fill:#000;opacity:.8;}
            .jssora082:hover .c {fill-opacity:.3;}
            .jssora082:hover .a {opacity:1;}
            .jssora082.jssora082dn {opacity:.5;}
            .jssora082.jssora082ds {opacity:.3;pointer-events:none;}
        </style>
        <div data-u="arrowleft" class="jssora082" style="width:30px;height:40px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="c" d="M4800,14080h6400c528,0,960-432,960-960V2880c0-528-432-960-960-960H4800c-528,0-960,432-960,960 v10240C3840,13648,4272,14080,4800,14080z"></path>
                <path class="a" d="M6860.8,8102.7l1693.9,1693.9c28.9,28.9,63.2,43.4,102.7,43.4s73.8-14.5,102.7-43.4l379-379 c28.9-28.9,43.4-63.2,43.4-102.7c0-39.6-14.5-73.8-43.4-102.7L7926.9,8000l1212.2-1212.2c28.9-28.9,43.4-63.2,43.4-102.7 c0-39.6-14.5-73.8-43.4-102.7l-379-379c-28.9-28.9-63.2-43.4-102.7-43.4s-73.8,14.5-102.7,43.4L6860.8,7897.3 c-28.9,28.9-43.4,63.2-43.4,102.7S6831.9,8073.8,6860.8,8102.7L6860.8,8102.7z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora082" style="width:30px;height:40px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="c" d="M11200,14080H4800c-528,0-960-432-960-960V2880c0-528,432-960,960-960h6400 c528,0,960,432,960,960v10240C12160,13648,11728,14080,11200,14080z"></path>
                <path class="a" d="M9139.2,8102.7L7445.3,9796.6c-28.9,28.9-63.2,43.4-102.7,43.4c-39.6,0-73.8-14.5-102.7-43.4 l-379-379c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7L8073.1,8000L6860.8,6787.8 c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7l379-379c28.9-28.9,63.2-43.4,102.7-43.4 c39.6,0,73.8,14.5,102.7,43.4l1693.9,1693.9c28.9,28.9,43.4,63.2,43.4,102.7S9168.1,8073.8,9139.2,8102.7L9139.2,8102.7z"></path>
            </svg>
        </div>
        <!--#endregion Arrow Navigator Skin End -->
                        
</div>
                    
                    
                </div>
                <!--<div id="slide-des">
                    <h2>Bếp An Khang</h2>
                    <h4>Trải nghiệm 1 phong cách nấu nướng hoàn toàn mới.</h4>
                    <h4>Tận hưởng cảm giác relax ngay trong nhà bếp của bạn.</h4>
                    <h4>Với những thiết bị nhà bếp cao cấp</h4>
                </div>-->
             <div id="slide-hide"></div>
</div>

    
    
<?php if(!is_home()){ 
    //echo do_shortcode('[sg_popup id="1554"]'); // popup hiện 1 lần ở các trang
    ?>    
    
    <!--<a href="/bep-tu-khuyen-mai/"><div id="sub-header"></div></a>-->
    
    <div id="breadcrumb">
        <div class="container">
            <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <?php 
                    $i=1;
                    $count = count($breadcrumb);            
                    foreach($breadcrumb as $k => $v){
                        echo '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
                            echo '<a href="'.$k.'" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">';
                                echo '<span itemprop="name">'.$v.'</span>';                    
                            echo '</a>';
                            if($i<$count){
                                echo ' ›  ';
                            }
                            echo '<meta itemprop="position" content="'.$i.'">';
                        echo '</li>';
                        $i++;
                    }
                ?>            
            </ol>
        </div>
    </div>
<?php }else{
    
    //echo do_shortcode('[sg_popup id="1559"]'); // popup hiện 3 lần ở trang home
}?>
    
    
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "https://bepankhang.com/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://bepankhang.com/tim-kiem/?key={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>    
    

    

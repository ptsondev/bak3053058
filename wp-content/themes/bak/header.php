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

    <!-- Global site tag (gtag.js) - AdWords: 968191709 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-968191709"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-968191709');
</script>

    <script type="text/javascript">
    window.addEventListener('load',function(){
        jQuery("[href^='tel:']").click(function(){
            gtag('event', 'click', {  'event_category': 'button', 'event_label': 'hotline' });
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

<!-- Your customer chat code 
<div class="fb-customerchat"
  attribution="setup_tool"
  page_id="272758219930982"
  logged_in_greeting="Xin chào. Bếp An Khang đã sẵn sàng để phục vụ quý khách."
  logged_out_greeting="Xin chào. Bếp An Khang hân hạnh phục vụ quý khách.">
</div>-->
    
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
                        <!--<li><a href="/bep-an-khang">Bếp An Khang</a></li>-->
                        <li><a href="/khuyen-mai-cuc-shock-khi-mua-bep-tu/">Khuyến Mãi</a></li>
                        <li><a href="/qna">Câu hỏi thường gặp</a></li>
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
    
    
<?php if(!is_home()){ 
    //echo do_shortcode('[sg_popup id="1554"]'); // popup hiện 1 lần ở các trang
    ?>    
    
    <div id="sub-header"></div>
    
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
    


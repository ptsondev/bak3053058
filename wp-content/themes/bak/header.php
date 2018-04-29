<!DOCTYPE html>
<html style="margin-top:0!important;" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700&amp;subset=vietnamese" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/Font-Awesome-master/web-fonts-with-css/css/fontawesome-all.min.css">    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts/fonts.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/bep-an-khang.ico"/>
    <!--Jquery-->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jssor.slider.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bighover.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/myjs.js"></script>

    <?php //wp_head(); ?>
    <?php
         echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
        ?>
</head>

<body <?php body_class($res_class); ?>>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=498951056967865&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    <?php 
        $active = '';
        $breadcrumb = check_current_page($active);     
        $_SESSION['active']=$active;
    ?>
    
    <div id="main-header">

        <div class="row-1">
            <div class="container main-wrapper">
                <div class="row">
                    <span class="location col-sm-6 col-xs-12"><i class="fa fa-home" aria-hidden="true"></i> 151 Tô Hiến Thành, Phường 13, Quận 10, TP HCM</span>
                    <span class="time col-sm-3 col-xs-6"><i class="fas fa-clock" aria-hidden="true"></i> 8:00 am - 8:00 pm</span>
                    <span class="hotline col-sm-3 col-xs-6"><i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo AK_DT_BAN; ?>"><?php echo AK_DT_BAN_SHOW; ?></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="row-2">
            <div class="container main-wrapper">
                <div class="row">
                    <div id="site-logo" class="col-sm-2 col-xs-12">
                        <a href="/"><img src="<?php echo PATH_TO_IMAGES; ?>logo.png" alt="Bếp từ An Khang" /></a>
                        <did id="site-name">Bep An Khang</did>
                        <div id="site-slogan">Nâng Tầm Bếp Việt</div>
                        <div id="btnShowMenu"><i class="fas fa-bars"></i></div>
                    </div>
                    <div id="menu-region" class="col-sm-10 col-xs-12">
                        <a href="/gio-hang"><div id="cart">
                            <?php if(isset($_SESSION['cart'])){ echo '(<span id="numCart">'.count($_SESSION['cart']).'</span>)'; }?>
                        </div></a>
                        <div id="main-menu">
                            <?php $class=($active=='home')?'active':''; ?>
                            <li class="<?php echo $class; ?>"><a href="/">Trang Chủ</a></li>
                            <?php $class=($active=='san-pham')?'active':''; ?>
                            <li class="<?php echo $class; ?>">
                                <a href="/san-pham">Sản Phẩm</a>
                                <!--<ul class="sub-menu sub-menu-1">
                                    <?php 
                                        $terms = get_terms( 'product-category', array(
                                            'hide_empty'=>0
                                        ));                                    
                                        foreach($terms as $term){
                                            echo '<li>';
                                                echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
                                                $children = get_terms( 'nhom-san-pham', array(
                                                    'hide_empty'=>1, 
                                                    'parent'=>$term->term_id 
                                                ));
                                                if(is_array($children)){
                                                    echo '<ul class="sub-menu sub-menu-2">';
                                                    foreach($children as $child){                                  
                                                        echo '<li><a href="'.get_term_link($child).'">'.$child->name.'</a></li>';
                                                    }   
                                                    echo '</ul>';
                                                }                                                
                                            echo '</li>';
                                        }
                                    ?>
                                                                       
                                </ul>-->
                            </li>
                            <?php $class=($active=='qna')?'active':''; ?>
                            <li class="<?php echo $class; ?>"><a href="/qna">Câu hỏi thường gặp</a></li>
                            <!--<li><a href="/kien-thuc-lien-quan">Tin Tức</a></li>-->
                            <?php $class=($active=='lien-he')?'active':''; ?>
                            <li class="<?php echo $class; ?>"><a href="/lien-he">Liên Hệ</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php if(!is_home()){ ?>    
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
<?php }?>
    
    
<?php
DEFINE('PATH_TO_IMAGES', get_template_directory_uri().'/images/');
DEFINE('AK_DT_BAN', '02838625420');
DEFINE('AK_DT_BAN_SHOW', '02838 625 420');
DEFINE('AK_HOTLINE', '0999999999');
DEFINE('AK_HOTLINE_SHOW', '0909 999 999');
require_once(get_template_directory().'/aio_image_resize.php');



function register_my_session(){
  if( !session_id() ){
    session_start();
  }
}

add_action('init', 'register_my_session');

// load scripts
function load_scripts() {   
    wp_localize_script('js', 'ajaxurl', admin_url( 'admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'load_scripts');

function bak_display_money($value){
    if(!is_numeric($value)){
        return '';
    }
    if($value==0){
        return 'Liên hệ';
    }
    return number_format($value, 0, '.', '.').'₫';
}

function bak_get_thumbnail($postID, $width=0, $height=0){
    $url = get_the_post_thumbnail_url($postID);
    if($width==0){
        return $url;
    }
    return aio_image_resize($url, $width, $height, true);
}


function bak_social_share() {
    $share = '<div id="custom_share">';
    $share .= "<script type='text/javascript'>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a class='share_facebook' title='Share to Facebook' href='http://www.facebook.com/share.php?u=<url>' onclick='return fbs_click()' target='_blank' ><div class='share facebook'></div></a>";
    $share .= '<a class="share_twitter" href="http://twitter.com/home?status=Currentlyreading" title="Share to Twitter"><div class="share twitter"></div></a>';
    $share .= '<a class="share_linkhay" title="Share to Linkhay" href="http://linkhay.com/submit"><div class="share linkhay"></div></a>';
    $share .= '<a title="Share to Zing" class="share_zing" name="zm_share" type="text"><div class="share zing"></div></a><script src="http://wb.me.zing.vn/index.php?wb=LINK&t=js&c=share_button" type="text/javascript"></script>';
    $share .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: \'vi\'}</script><g:plusone size="medium"></g:plusone>';
    $share .= '<div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false"></div>';
    $share.='</div>';
    return $share;
}

/**
    return the arr breadcrumb
*/
function check_current_page(&$active){
    if(is_home()){
        $active = 'home';
        return;
    }
    $queried_object = get_queried_object();
    //var_dump($queried_object);
    
    $arr = array();
    $arr['/']='Bếp An Khang';
    
    if(isset($queried_object->ID) && $queried_object->ID==34){
        $active='san-pham';
        $arr['/san-pham']='Sản Phẩm';    
    }
    if(isset($queried_object->post_type) && $queried_object->post_type=='product'){
        $active='san-pham';
        $arr['/san-pham']='Sản Phẩm';
        $arr[get_permalink($queried_object->ID)] = $queried_object->post_title;
    }
    if(isset($queried_object->taxonomy) && ($queried_object->taxonomy=='brand' || $queried_object->taxonomy=='product-category')){
        $active='san-pham';
        $arr['/san-pham']='Sản Phẩm';
        $arr[get_term_link($queried_object)] = $queried_object->name;
    }    
    if(isset($queried_object->ID) && $queried_object->ID==54){
        $active='qna';
        $arr['/qna']='Câu hỏi thường gặp';        
    }
    if(isset($queried_object->post_type) && $queried_object->post_type=='qna'){
        $active='qna';
        $arr['/qna']='Câu hỏi thường gặp';        
        $arr[get_permalink($queried_object->ID)] = $queried_object->post_title;
    }
    if(isset($queried_object->ID) && $queried_object->ID==46){
        $active='lien-he';
        $arr['/lien-he']='Liên Hệ';
    }
    
    return $arr;
}

function searchProduct(){
    $key = htmlspecialchars($_REQUEST['key']);
    $brand = htmlspecialchars($_REQUEST['brand']);
    $numCook = htmlspecialchars($_REQUEST['numCook']);
    $min = htmlspecialchars($_REQUEST['min']);
    $max = htmlspecialchars($_REQUEST['max']);
    // search product by these variables
    $arr = array(
        'post_type' => 'product',        
        'numberposts' => 0,
        'meta_query' => array(
            array(
                'key' => 'wpcf-product_sell_price',
                'value' => array($min, $max),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            )
        ),
        'order' =>'ASC'
    );
    if($brand!=-1){
        $arr['tax_query']=array(
            array(
                'taxonomy' => 'brand',
                'field' => 'term_ID',
                'terms' => $brand,
                'include_children' => false
            )
        );
    }
    if(!empty($key)){
        $arr['meta_query'][]=array(
                'key' => 'wpcf-product_code',
                'value' => $key,
                'compare' => 'LIKE',                
        );
    }
    if($numCook!=-1){
        $arr['meta_query'][]=array(
                'key' => 'wpcf-num_cook',
                'value' => $numCook,                         
        );
    }
    // con thieu so bep nau
    
     $products = get_posts($arr);   
    //var_dump($products);
    /* copy from product page */
    $html = '';
    foreach ($products as $product){ 
        $html.= '<div class="col-sm-4 col-xs-12">';
            $html.= '<div class="prod">';
                $html.= '<div class="thumb"><a href="'.get_permalink($product->ID).'">';
                    $html.= '<img src="'.bak_get_thumbnail($product->ID, 400, 300).'" />';
                        $html.= '</a></div>';
                    $html.= '<div class="info">';
                    $html.= '<div class="title">'.$product->post_title.'</div>';
                        $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
                        $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
                        $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                    $html.= '<div class="price">';
                        $html.= '<div class="v_d_price">'.bak_display_money($d_price).'</div>';
                        $html.= '<div class="v_s_price">'.$giaSell.'</div>';
                    $html.= '</div>';                            
                $html.= '</div>';                        
            $html.= '</div>';
        $html.= '</div>';
    } //end copy
    
    echo $html;
    die;
    
}
add_action( 'wp_ajax_searchProduct', 'searchProduct' );
add_action( 'wp_ajax_nopriv_searchProduct', 'searchProduct' );
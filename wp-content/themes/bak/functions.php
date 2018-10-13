<?php
DEFINE('PATH_TO_IMAGES', '/wp-content/themes/bak/images/');
DEFINE('AK_DT_BAN', '02838625420');
DEFINE('AK_DT_BAN_SHOW', '02838 625 420');
DEFINE('AK_HOTLINE', '0963391379');
DEFINE('AK_HOTLINE_SHOW', '0963 39 1379');
DEFINE('TID_PARENT_INDUCTION_HOB', 7);
DEFINE('TID_PARENT_HUT_MUI', 17);
require_once(get_template_directory().'/aio_image_resize.php');
require_once(get_template_directory().'/simple_html_dom.php');


function connect_db(){
    require_once 'EasyMySQLi.inc.php'; 
    $db = new EasyMySQLi('localhost', 'root', 'mysqlHaoilaHa', 'wp_bepankhang'); 
    $db->set_charset("utf8");
    return $db;
}

$db = connect_db();
//var_dump($db);

function detect_click_tac($ip){
    $db = connect_db();    
    $yesterday          = strtotime('-7 day', time());
    $result = $db->queryAllRows('SELECT url FROM k_visit WHERE IP=? AND time > ? AND google_ad=1', $ip, $yesterday);     
    $tmp = array();
    foreach($result as $item){
        $tmp[]=$item['url'];
    }    
    $result = array_count_values($tmp);
    if(count($result)>3){
        $db->queryNoResult('UPDATE k_visit SET click_tac=1 WHERE IP=?', $ip);
    }   
}


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
    //$share .= '<a title="Share to Zing" class="share_zing" name="zm_share" type="text"><div class="share zing"></div></a><script src="http://wb.me.zing.vn/index.php?wb=LINK&t=js&c=share_button" type="text/javascript"></script>';
    $share .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: \'vi\'}</script><g:plusone size="medium"></g:plusone>';
    $share .= '<div class="fb-like" data-href="https://www.facebook.com/BepAnKhang/" data-send="false" data-layout="button_count" data-show-faces="false"></div>';
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
    //var_dump($queried_object);die;
    
    $arr = array();
    $arr['/']='Bếp An Khang';
    
    if(isset($queried_object->post_type) && $queried_object->post_type=='product'){
        $cat = wp_get_post_terms($queried_object->ID, 'product-category');
        $cat = $cat[0];
        if($cat->parent!=0){
            $parent = get_term($cat->parent);    
            $arr[get_term_link($parent)]=$parent->name;
            $active = get_term_link($parent);
        }
        $arr[get_term_link($cat)]=$cat->name;
        $arr[get_permalink($queried_object->ID)]=$queried_object->post_title;
        
    }else if(isset($queried_object->taxonomy) && $queried_object->taxonomy=='product-category'){
        
        if($queried_object->parent!=0){
            $parent = get_term($queried_object->parent);    
            $arr[get_term_link($parent)]=$parent->name;
            $active = get_term_link($parent);
        }
        $arr[get_term_link($queried_object)]=$queried_object->name;
    }else{
        if($queried_object->post_type!='attachment'){            
            $tmp = str_replace( home_url(), "", get_permalink($queried_object->ID));
            $arr[$tmp] = $queried_object->post_title;
            $tmp = substr($tmp, 1, -1);
            $active=$tmp;        
        }
    }    
    return $arr;
}


function searchProduct(){
    $key = '';
    $numCook = $brand = -1;
    $min = 0;
    $max = 999999999;
    
    if(isset($_REQUEST['key'])){
        $key = htmlspecialchars($_REQUEST['key']);
    }
    if(isset($_REQUEST['slBrand'])){
        $brand = htmlspecialchars($_REQUEST['slBrand']);
    }
    if(isset($_REQUEST['slNumCook'])){
        $numCook = htmlspecialchars($_REQUEST['slNumCook']);    
    }    
    if(isset($_REQUEST['amount'])){
        $amount = str_replace(',', '', htmlspecialchars($_REQUEST['amount']));
        $tmp = explode(' - ',$amount);
        $min = $tmp[0];
        $max = $tmp[1];        
    }
    // search product by these variables
    $arr = array(
        'post_type' => 'product',        
        'numberposts' => -1,
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
                'taxonomy' => 'product-category',
                'field' => 'term_ID',
                'terms' => $brand,
                'include_children' => true
            )
        );
    }
    if(!empty($key)){
        /*$arr['meta_query'][]=array(
                'key' => 'wpcf-product_code',
                'value' => $key,
                'compare' => 'LIKE',                
        );*/
        $arr['s']=$key;
    }
    if($numCook!=-1){
        $arr['meta_query'][]=array(
                'key' => 'wpcf-num_cook',
                'value' => $numCook,                         
        );
    }
   
    
    $products = get_posts($arr);   
   
    echo '<div class="row list-products">';
    foreach ($products as $product){ 
        display_product_item($product);
    }
    echo '</div>';
    
    
    echo $html;
    
}
add_action( 'wp_ajax_searchProduct', 'searchProduct' );
add_action( 'wp_ajax_nopriv_searchProduct', 'searchProduct' );

function addToCart(){
    $pid =  htmlspecialchars($_REQUEST['pid']);    
    $existed = 0;
    $cart = array($pid);
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        if(!in_array($pid, $cart)){
            $cart[]=$pid;
        }else{
            $existed = 1;
        }
    }
    $_SESSION['cart'] = $cart;    
    echo $existed;
    die;
}
add_action( 'wp_ajax_addToCart', 'addToCart' );
add_action( 'wp_ajax_nopriv_addToCart', 'addToCart' );

function removeFromCart(){
    $pid =  htmlspecialchars($_REQUEST['pid']);        
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $cart = array_diff($cart, array($pid));
        $_SESSION['cart'] = $cart;
    }            
    die;
}
add_action( 'wp_ajax_removeFromCart', 'removeFromCart' );
add_action( 'wp_ajax_nopriv_removeFromCart', 'removeFromCart' );


function emptyCart(){
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }       
    echo 1;
    die;
}
add_action( 'wp_ajax_emptyCart', 'emptyCart' );
add_action( 'wp_ajax_nopriv_emptyCart', 'emptyCart' );

function create_shortcode_chot_ha() {      
    global $post;
    $html ='';
    $html.='<h4 id="chot-ha">';
        $html.='Nếu bạn quan tâm đến '.$post->post_title.', hoặc cần tìm hiểu thêm thông tin về các dòng bếp từ khác, xin vui lòng liên hệ với <a href="http://bepankhang.com/lien-he/">Bếp An Khang</a> để được hỗ trợ và tư vấn nhiệt tình nhất. Hy vọng bạn sẽ tìm được 1 chiếc bếp ưng ý.';
    $html .='</h4>';
    return $html;
}
add_shortcode( 'chot_ha', 'create_shortcode_chot_ha' );

/**
*   Lấy những thương hiệu của 1 loại sản phẩm
*/
function get_brand_by_product_type($type_id){
    $db = connect_db();    
    $result = $db->queryAllRows('SELECT DISTINCT(term_taxonomy_id) FROM bak_term_relationships 
    WHERE term_taxonomy_id IN (SELECT term_id FROM bak_term_taxonomy WHERE taxonomy="brand") 
    AND object_id IN (SELECT object_id FROM bak_term_relationships WHERE term_taxonomy_id=?)', $type_id);  
    $arrTID = array();
    foreach($result as $i){
        $arrTID[]=$i['term_taxonomy_id'];        
    }
    return $arrTID;
}

function display_product_item($product){
     $show = get_post_meta($product->ID, 'wpcf-show', true);
     echo '<div class="col-sm-4 col-xs-12">';
        echo '<div class="prod">';
            if(is_array($show) && count($show)>0){
                echo '<div class="best-seller"></div>';
            }
            echo '<div class="thumb"><a href="'.get_permalink($product->ID).'">';                    
                $img_html = '<img src="'.bak_get_thumbnail($product->ID, 400, 300).'" />';
                echo apply_filters( 'bj_lazy_load_html', $img_html );
            echo '</a></div>';
            echo '<div class="info">';
                echo '<div class="title"><a href="'.get_permalink($product->ID).'">'.$product->post_title.'</a></div>';
                    $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
                    $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
                    if(!empty($d_price)){
                        $percent = round(($d_price - $s_price)/($d_price)*100);                    
                    }else{
                        $percent = '';
                    }
                    $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                echo '<div class="price">';
                    if(!empty($s_price)){
                        echo '<div class="saleoff">'.$percent.'%</div>';
                    }
                    echo '<div class="v_d_price">'.bak_display_money($d_price).'</div>';
                    echo '<div class="v_s_price">'.$giaSell.'</div>';
                    //echo '<div class="v_s_price">Liên Hệ => giá tốt</div>';
                echo '</div>';                            
            echo '</div>';                        
        echo '</div>';
    echo '</div>';
}

function check_is_bep_tu($tid){
    if($tid==TID_PARENT_INDUCTION_HOB)
        return true;
    $children = get_terms( 'product-category', array(
        'hide_empty'=>0,
        'parent'=>TID_PARENT_INDUCTION_HOB
    )); 
    foreach($children as $child){
        if($child->term_id == $tid){
            return true;
        }
    }
    return false;
}

function check_is_hut_mui($tid){
    if($tid==TID_PARENT_HUT_MUI)
        return true;
    $children = get_terms( 'product-category', array(
        'hide_empty'=>0,
        'parent'=>TID_PARENT_HUT_MUI
    )); 
    foreach($children as $child){
        if($child->term_id == $tid){
            return true;
        }
    }
    return false;
}

//show_admin_bar( false );

//add_action('wp_enqueue_scripts', 'no_more_jquery'); mở cái này popup ko chạy
function no_more_jquery(){
    wp_deregister_script('jquery');
}

function my_style_script(){
    wp_enqueue_style('fontAwesome', get_template_directory_uri().'/css/Font-Awesome-master/web-fonts-with-css/css/fontawesome-all.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style('fonts', get_template_directory_uri().'/css/fonts.css');
    wp_enqueue_style('jqueryUIcss', get_template_directory_uri().'/css/jquery-ui.css');
    wp_enqueue_style('main', get_template_directory_uri().'/css/main.css');
    
    wp_enqueue_script('myjquery', get_template_directory_uri().'/js/jquery.min.js');
    wp_enqueue_script('responsiveslides', get_template_directory_uri().'/js/responsiveslides.min.js');
    wp_enqueue_script('jssor', get_template_directory_uri().'/js/jssor.slider.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js');
    wp_enqueue_script('bighover', get_template_directory_uri().'/js/jquery.bighover.js');
    wp_enqueue_script('mousewheel', get_template_directory_uri().'/js/jquery.mousewheel.js');
    wp_enqueue_script('jqueryui', get_template_directory_uri().'/js/jquery-ui.js');
    wp_enqueue_script('parallax', get_template_directory_uri().'/js/parallax.js');
    wp_enqueue_script('myjs', get_template_directory_uri().'/js/myjs.js');  
}
if(!is_admin()){
    add_action('init', 'my_style_script');
}else{
    //phpinfo();die;
}

<?php

require_once('libs/snh_image_resize.php');


define(IMG_PATH, get_template_directory_uri().'/images/');
define(PID_HOME, 10);
define(PID_ABOUT, 12);
define(PID_CONTACT, 28);
define(PID_ARTICLES, 35);
define(PID_SERVICES, 37);
define(PID_RECRUITMENT, 516);

define(TID_DESIGN, 14);
define(TID_ONLINE, 15);
define(TID_MEDIA, 20);

define(NUM_CHAR_DES, 150);



pll_register_string('s_about', 'Giới Thiệu');

/*
 * Scale & crop image
require_once('wp-image-resize.php');
$img_size_square = array(
    "w" => 600,
    "h" => 600,
    "q" => 100, // Quality
    "crop" => true // Crop image
);
 */

require_once('custom_pagination.php'); // custom paging => no need to use plugin

/* register menu location */
add_theme_support('menus');
function register_my_menu() {
    register_nav_menus(
        array('primary' => 'Sher Custom Location')
    );
}
add_action('init', 'register_my_menu');
/* END register menu location */


/* Flush buffer for redirect */
add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start(); // flush het moi redirect duoc
}
/* END Flush buffer for redirect */


/* Remote some items in admin menu*/
function snh_remove_menu_pages() {
    $u = wp_get_current_user();
    if ($u->ID != 1) {
        remove_menu_page('options-general.php');
        remove_menu_page('edit.php');
        remove_menu_page('edit.php?post_type=page');
        remove_menu_page('edit-comments.php');
        remove_menu_page('index.php');
        remove_menu_page('upload.php');
        remove_menu_page('admin.php');
        remove_menu_page('admin.php?page=wpcf-cf');
        remove_menu_page('admin.php?page=wpcf-cf7');
        remove_menu_page('admin.php?page=wpcf-ctt');
        remove_menu_page('plugins.php');
        remove_menu_page('users.php');
        remove_menu_page('tools.php');
        remove_menu_page('themes.php');

        wp_register_style('admin', get_template_directory_uri() . '/css/admin.css', array(), '1.0', 'all');
        wp_enqueue_style('admin');
    }
}

add_action('admin_menu', 'snh_remove_menu_pages');
/* END Remote some items in admin menu*/


/* Change login redirect */
add_filter( 'login_redirect', create_function( '$url,$query,$user', 'return get_admin_url(0, "edit.php?post_type=article");' ), 10, 3 );
/* END Change login redirect */


/* load fonts and style */
function load_fonts_style() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0', 'all'); 
    wp_enqueue_style('bootstrap');

    wp_register_style('jquery.mmenu.all', get_template_directory_uri() . '/css/jquery.mmenu.all.css', array(), '1.0', 'all');
    wp_enqueue_style('jquery.mmenu.all');
    
    wp_register_style('colorbox', get_template_directory_uri() . '/css/colorbox.css', array(), '1.0', 'all');
    wp_enqueue_style('colorbox');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('main');
}

add_action('wp_print_styles', 'load_fonts_style');
/* END load fonts and style */


/* load scripts */
function load_scripts() {
    //wp_register_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array()); 
    //wp_enqueue_script('jquery.min');
    
    wp_register_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array()); 
    wp_enqueue_script('bootstrap.min');

    wp_register_script('jquery.mmenu.min.all', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array());
    wp_enqueue_script('jquery.mmenu.min.all');
    
    wp_register_script('colorbox', get_template_directory_uri() . '/js/jquery.colorbox-min.js', array());
    wp_enqueue_script('colorbox');    

    wp_register_script('js', get_template_directory_uri() . '/js/js.js', array());
    wp_enqueue_script('js');

    wp_localize_script('myjs', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'load_scripts');
/* END load scripts */

/* Custom widget */
class ArticlePage_Main extends WP_Widget {

    function ArticlePage_Main() {
        parent::WP_Widget('ArticlePage_Main_Widget', 'Article Page - List Articles', array('description' => 'List các bài viết - trang bài viết'));
    }

    function widget($args, $instance) {
        $article = new Article();
        $display = new Display();
        $display->num = $instance['num'];
        $display->paging = true;

        $article->display_list_article(0, $display);
    }

    // xu ly khi admin update
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['num'] = $new_instance['num'];

        return $instance;
    }

    // display form in admin
    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('num' => 'Số bài viết trong 1 trang'));
        $num = format_to_edit($instance['num']);

        echo
        '<div>Số bài viết hiển thị trong 1 trang:
            <input type="text"
                id="' . $this->get_field_id('num') . '"
                name="' . $this->get_field_name('num') . '"
                value = "' . $num . '"
            />
        </div>';
    }

}
register_widget('ArticlePage_Main');
/* END Custom widget */

/* Kích hoạt tính năng Customizer */
//function example_customizer_menu() {
//    add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
//}
//add_action( 'admin_menu', 'example_customizer_menu' );

function customizer_support_online($wp_customize) {
    // Tạo section
    $wp_customize->add_section(
        'section_support_online', array(
            'title' => 'Support Online',
            'priority' => 24
        )
    );

    // Tạo setting
    $wp_customize->add_setting(
        'name1', 
        array(
            'default' => ''
        )           
    );
    $wp_customize->add_setting(
        'phone1', 
        array(
            'default' => ''
        )           
    );
    $wp_customize->add_setting(
        'skype1', 
        array(
            'default' => ''
        )           
    );
    $wp_customize->add_setting(
        'name2', 
        array(
            'default' => ''
        )           
    );
    $wp_customize->add_setting(
        'phone2', 
        array(
            'default' => ''
        )           
    );
    $wp_customize->add_setting(
        'skype2', 
        array(
            'default' => ''
        )           
    );
  
    // Tạo coltrol
    $wp_customize->add_control(
        'control_name1', array(
            'label' => 'Name 1',
            'section' => 'section_support_online',
            'type' => 'text',
            'settings' => 'name1'
        )
    );
    $wp_customize->add_control(
        'control_phone1', array(
            'label' => 'Phone 1',
            'section' => 'section_support_online',
            'type' => 'text',
            'settings' => 'phone1'
        )
    );
    $wp_customize->add_control(
        'control_skype1', array(
            'label' => 'Skype 1',
            'section' => 'section_support_online',
            'type' => 'text',
            'settings' => 'skype1'
        )
    );
    
    $wp_customize->add_control(
        'control_name2', array(
            'label' => 'Name 2',
            'section' => 'section_support_online',
            'type' => 'text',
            'settings' => 'name2'
        )
    );
    $wp_customize->add_control(
        'control_phone2', array(
            'label' => 'Phone 2',
            'section' => 'section_support_online',
            'type' => 'text',
            'settings' => 'phone2'
        )
    );
    $wp_customize->add_control(
        'control_skype2', array(
            'label' => 'Skype 2',
            'section' => 'section_support_online',
            'type' => 'text',
            'settings' => 'skype2'
        )
    ); 
}
add_action('customize_register', 'customizer_support_online');

function customizer_footer($wp_customize) {
    // Tạo section
    $wp_customize->add_section(
        'section_footer', array(
            'title' => 'Footer Area',
            //'description' => 'Các dòng text ở phần interview - trang chủ',
            'priority' => 25
        )
    );
    // Tạo setting
    $wp_customize->add_setting(
        'o_hotline', array(
            'default' => '0909.143.576'
        )
    );
	$wp_customize->add_setting(
        'o_phone', array(
            'default' => '0909.123.456'
        )
    );
    $wp_customize->add_setting(
        'o_email', array(
            'default' => 'ptson@snh.vn'
        )
    );
    $wp_customize->add_setting(
        'o_address', array(
            'default' => '39 Hoa Hong, F2, Q.PN'
        )
    );
    
    // add control
    $wp_customize->add_control(
        'oc_hotline', array(
            'label' => 'Hotline',
            'section' => 'section_footer',
            'type' => 'text',
            'settings' => 'o_hotline'
        )
    );
	$wp_customize->add_control(
        'oc_phone', array(
            'label' => 'Phone',
            'section' => 'section_footer',
            'type' => 'text',
            'settings' => 'o_phone'
        )
    ); 
    $wp_customize->add_control(
        'oc_email', array(
            'label' => 'Email',
            'section' => 'section_footer',
            'type' => 'text',
            'settings' => 'o_email'
        )
    ); 
     $wp_customize->add_control(
        'oc_address', array(
            'label' => 'Address',
            'section' => 'section_footer',
            'type' => 'text',
            'settings' => 'o_address'
        )
    ); 
}
add_action('customize_register', 'customizer_footer');
  
function theme_social_share() {
    $share = '<span id="custom_share" class="pull-right">';
    $share .= "<script type='text/javascript'>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a class='share_facebook' rel='nofollow' title='Share to Facebook' href='http://www.facebook.com/share.php?u=<url>' onclick='return fbs_click()' target='_blank' ><div class='share facebook'></div></a>";
    $share .= '<a class="share_twitter" rel="nofollow" href="http://twitter.com/home?status=Currentlyreading" title="Share to Twitter"><div class="share twitter"></div></a>';
    $share .= '<a class="share_linkhay" rel="nofollow" title="Share to Linkhay" href="http://linkhay.com/submit"><div class="share linkhay"></div></a>';
    //$share .= '<a title="Share to Zing" class="share_zing" name="zm_share" type="text"><div class="share zing"></div></a><script src="http://wb.me.zing.vn/index.php?wb=LINK&t=js&c=share_button" type="text/javascript"></script>';
    $share .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: \'vi\'}</script><g:plusone size="medium"></g:plusone>';
    $share .= '<div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false"></div>';
    $share.='</span>';
    return $share;

}

function theme_support_online($blockTitle=''){
    $html = '';
    $html.='<div class="block" id="block-support-online">';
        if($blockTitle){
            $html.='<h3>'.$blockTitle.'</h3>';
        }
        $html.='<div class="supporter supporter-1">';
            $tmp = get_theme_mod('name1', '');
            if(!empty($tmp)){ $html.='<div class="name">'.  $tmp.'</div>'; }
            $tmp = get_theme_mod('phone1', '');
            if(!empty($tmp)){ $html.='<div class="phone">'.  $tmp.'</div>'; }
            $tmp = get_theme_mod('skype1', '');
            if(!empty($tmp)){ $html.='<div class="skype"><a href="skype:'.$tmp.'?chat">'.  $tmp.'</a></div>'; }
            
            $tmp = get_theme_mod('name2', '');
            if(!empty($tmp)){ $html.='<div class="name">'.  $tmp.'</div>'; }
            $tmp = get_theme_mod('phone2', '');
            if(!empty($tmp)){ $html.='<div class="phone">'.  $tmp.'</div>'; }
            $tmp = get_theme_mod('skype2', '');
            if(!empty($tmp)){ $html.='<div class="skype"><a href="skype:'.$tmp.'?chat">'.  $tmp.'</a></div>'; }
        $html.='</div>';
    $html.='</div>';
    return $html;
}

function snh_get_thumbnail($postID, $width, $height){
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'thumbnail_size' );
    $url = $thumb['0'];     
    return snh_image_resize($url, $width, $height, TRUE);
}

function snh_get_description($post){
    if(is_numeric($post)){
        $post = get_post($post);        
    }
    $des = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
    if(!empty($des)){
        return $des;
    }    
    if(strlen($post->post_content)<=NUM_CHAR_DES){
        return strip_tags($post->post_content);
    }
    $pos = strpos($post->post_content, ' ', NUM_CHAR_DES);
    return strip_tags(substr($post->post_content, 0, $pos));    
}


// remove hentry
function themeslug_remove_hentry( $classes ) {
    if ( is_page() || is_single()) {
        $classes = array_diff( $classes, array( 'hentry' ) );
    }
    return $classes;
}
add_filter( 'post_class','themeslug_remove_hentry' );

// list dịch vụ
function display_list_child_service($tid){
	$args = array(
		'showposts' => 20,
		'post_type' => 'service',
		'tax_query' => array(
			array(
				'taxonomy' => 'service-category',
				'field'    => 'term_id',
				'terms'    => $tid
			),
		),
		'orderby' => 'post_date',
		'order'   => 'ASC',
	);

	$wp_query = new WP_Query($args);
	if ($wp_query->have_posts()) {            
		while ($wp_query->have_posts()) : $wp_query->the_post();
			echo '<li><a href="'.get_permalink(get_the_ID()).'"><div class="service-item">'.get_the_title().'</div></a></li>';
		endwhile;                       
	}
}
    
function remove_all_scripts() {
   foreach( wp_scripts()->registered as $script ) {
      wp_dequeue_script( $script );
      wp_deregister_script( $script );
  }
} 
//add_action('wp_enqueue_scripts', 'remove_all_scripts', PHP_INT_MAX);
//add_action('wp_footer', 'remove_all_scripts', PHP_INT_MAX);
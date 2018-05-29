<?php
/*
  Template Name: FETCH
 */
?>

<?php
//die; 
// khong bat khi khong xai den


DEFINE('CAT_ID', 40); // nhớ tự thay cái này

$title='Bếp điện âm Bosch PKF645E14E';
$content = 'some content';
$d_price = 17700000;
$s_price = 15500000;
$image_url = 'http://cdn.bepluaviet.vn/wp-content/uploads/2014/11/bep-dien-bosch-pkf645e14e.jpg'; 


/*
$parent_url = $_REQUEST['url'];
$parent_html = file_get_html($parent_url);
$grid = $parent_html->find('#grid-view', 0);
foreach($grid->find('a.woocommerce-LoopProduct-link') as $element){
    //var_dump($element->href);die;
    fetchProduct($element->href);
}
*/
fetchProduct('http://bepluaviet.vn/shop/may-hut-mui-chefs-eh-r506e7');

function fetchProduct($url){
    $html = file_get_html($url);
    $title = $html->find('h1',0);
    $title = $title->plaintext;

    $content= $html->find('#tab-description', 0);
    $content = $content->outertext;
    // nhớ xóa hết hình link từ người ta đi
    $content =  preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "", $content);


    $entry = $html->find('.entry-summary', 0);
    $d_price = $entry->find('.woocommerce-Price-amount', 0);
    $d_price = $d_price->plaintext;
    $d_price = str_replace('.', '', $d_price);
    $d_price = intval($d_price);

    $s_price = $entry->find('.woocommerce-Price-amount', 1);
    $s_price = $s_price->plaintext;
    $s_price = str_replace('.', '', $s_price);
    $s_price = intval($s_price);

    $img = $html->find('.product-images img', 0);
    $image_url = $img->attr['data-src'];








    $tmp = trim($title, ' ');
    $array = explode(' ',$tmp);
    $code = end($array);

    $tmp = trim($image_url, ' ');
    $array = explode('/',$tmp);
    $image_name = end($array);

    $my_post = array();
    $my_post['post_type']    = 'product';
    $my_post['post_title']    = $title;
    $my_post['post_content']  = $content;
    $my_post['post_status']   = 'publish';
    $my_post['post_author']   = 1;
    $my_post['tax_input'] =  array('product-category' => array(CAT_ID));

    // Insert the post into the database
    $post_id = wp_insert_post( $my_post );

    update_post_meta($post_id, 'wpcf-product_display_price', $d_price);
    update_post_meta($post_id, 'wpcf-product_sell_price', $s_price);
    update_post_meta($post_id, 'wpcf-product_code', $code);
    update_post_meta($post_id, 'wpcf-product_guarantee', '2 năm');


    // Add Featured Image to Post
    $upload_dir       = wp_upload_dir(); // Set upload folder
    $image_data       = file_get_contents($image_url); // Get image data
    $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
    $filename         = basename( $unique_file_name ); // Create image file name

    // Check folder permission and define file location
    if( wp_mkdir_p( $upload_dir['path'] ) ) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    // Create the image  file on the server
    file_put_contents( $file, $image_data );

    // Check image file type
    $wp_filetype = wp_check_filetype( $filename, null );

    // Set attachment data
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name( $filename ),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    // Create the attachment
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

    // Include image.php
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    // Define attachment metadata
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

    // Assign metadata to attachment
    wp_update_attachment_metadata( $attach_id, $attach_data );

    // And finally assign featured image to post
    set_post_thumbnail( $post_id, $attach_id );
}
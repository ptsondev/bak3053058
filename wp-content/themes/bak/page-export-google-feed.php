<?php
/*
  Template Name: Export to Google Feed csv
 */
?>


<?php

// khong bat khi khong xai den
require_once('Classes_PHPEXCEL/PHPExcel.php');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Bếp An Khang")
							 ->setLastModifiedBy("Bếp An Khang")
							 ->setTitle("Bếp An Khang - Products")
							 ->setSubject("Bếp An Khang - Sản phẩm")
							 ->setDescription("Danh sách sản phẩm Sẽ up lên Google Feed");

    

    
   $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'id')
                ->setCellValue('B1', 'tiêu đề')
                ->setCellValue('C1', 'mô tả')
                ->setCellValue('D1', 'liên kết')
                ->setCellValue('E1', 'tình trạng')
                ->setCellValue('F1', 'giá')
                ->setCellValue('G1', 'còn hàng')
                ->setCellValue('H1', 'liên kết hình ảnh')
                ->setCellValue('I1', 'gtin')
                ->setCellValue('J1', 'mpn')
                ->setCellValue('K1', 'nhãn hiệu')
                ->setCellValue('L1', 'danh mục sản phẩm của Google');




    // get products
     $products = get_posts(array( 
         'post_type' => 'product',
         'numberposts' => -1,         
     )); 

     $i=2;
    foreach($products as $product){
        $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
        $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
        $tmp_price = $d_price*0.8;
        
        $brands = get_the_terms($product->ID, 'product-category');
                                    if(is_array($brands)){
                                        $brand = array_shift($brands);                                        
                                    } 
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $product->ID)
                ->setCellValue('B'.$i, $product->post_title)
                ->setCellValue('C'.$i, mb_substr(strip_tags($product->post_content), 0, 2000))
                ->setCellValue('D'.$i, get_permalink($product->ID))
                ->setCellValue('E'.$i, 'Mới')
                ->setCellValue('F'.$i, $s_price. ' VND')
                ->setCellValue('G'.$i, 'in stock')
                ->setCellValue('H'.$i, get_the_post_thumbnail_url($product->ID));
             
                
        $i++;
    }


    // Rename worksheet
    echo date('H:i:s') , " Rename worksheet" , EOL;
    $objPHPExcel->getActiveSheet()->setTitle('ddd');
    $objPHPExcel->createSheet();
    
    
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
//$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$output = 'wp-content/uploads/export_gg.xlsx';
$objWriter->save($output);
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

echo '<a href="/'.$output.'">Download</a>';


function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}
function get_words($sentence, $count = 10) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}

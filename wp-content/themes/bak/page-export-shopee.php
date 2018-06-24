<?php
/*
  Template Name: Export to Excel - Shopee
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
							 ->setDescription("Danh sách sản phẩm tại bepankhang.com");

$children = get_terms( 'product-category', array(
    'hide_empty'=>0,
    'parent'=>TID_PARENT_INDUCTION_HOB
)); 

$styleArray = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
        'size'  => 15,
        'name'  => 'Verdana'
    ));


$sheet=0;

foreach($children as $child){
    $tmp = explode(' ', $child->name);
    $cat_name = $tmp[count($tmp)-1];
    
    
    $objPHPExcel->setActiveSheetIndex($sheet)->mergeCells('B1:D1');
    $objPHPExcel->setActiveSheetIndex($sheet)                
                ->setCellValue('A1', $child->term_id)
                ->setCellValue('B1', $child->name);
        
    cellColor('A1:B1', '#EEEEEE');
    $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('A1:B1')->applyFromArray($styleArray);
    
   $objPHPExcel->setActiveSheetIndex($sheet)
                ->setCellValue('A2', 'ID danh mục')
                ->setCellValue('B2', 'Tên sản phẩm')
                ->setCellValue('C2', 'Mô tả sản phẩm')
                ->setCellValue('D2', 'Giá')
                ->setCellValue('E2', 'Kho')
                ->setCellValue('F2', 'Khối lượng sản phẩm')
                ->setCellValue('G2', 'Chuẩn bị hàng')
                ->setCellValue('H2', 'Mã Sản Phẩm')
                ->setCellValue('I2', 'Ảnh - cột CL');


    // get products
     $products = get_posts(array( 
         'post_type' => 'product',
         'numberposts' => -1,
         'tax_query' => array(
            array( 
                'taxonomy' => 'product-category', 
                'field' => 'term_ID',
                'terms' => $child->term_id, 
                'include_children' => true
            ) 
        ) 
     )); 

    $i=3;
    foreach($products as $product){
        $d_price = get_post_meta($product->ID, 'wpcf-product_display_price', true);
        $s_price = get_post_meta($product->ID, 'wpcf-product_sell_price', true);
        $tmp_price = $d_price*0.8;
        
        $objPHPExcel->setActiveSheetIndex($sheet)
                ->setCellValue('A'.$i, 8914)
                ->setCellValue('B'.$i, $product->post_title. ' - Đúng Giá & Luôn Có Hàng')
                ->setCellValue('C'.$i, mb_substr(strip_tags($product->post_content), 0, 2000))
                ->setCellValue('D'.$i, $tmp_price)            
                ->setCellValue('E'.$i, rand(3, 5))
                ->setCellValue('F'.$i, 8000)
                ->setCellValue('G'.$i, 3)
                ->setCellValue('H'.$i, $product->ID)
                ->setCellValue('I'.$i, get_the_post_thumbnail_url($product->ID));            
        $i++;
    }


    
    // Rename worksheet
    echo date('H:i:s') , " Rename worksheet" , EOL;
    $objPHPExcel->getActiveSheet()->setTitle($child->name);
    $objPHPExcel->createSheet();
    $sheet++;

}
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
//$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$output = 'wp-content/uploads/export.xlsx';
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

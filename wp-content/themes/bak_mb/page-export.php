<?php
/*
  Template Name: Export to Excel
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

    $objPHPExcel->setActiveSheetIndex($sheet)->mergeCells('B1:D1');
    $objPHPExcel->setActiveSheetIndex($sheet)                
                ->setCellValue('A1', $child->term_id)
                ->setCellValue('B1', $child->name);
        
    cellColor('A1:B1', '#EEEEEE');
    $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('A1:B1')->applyFromArray($styleArray);
    
    $objPHPExcel->setActiveSheetIndex($sheet)
                ->setCellValue('A2', 'ID')
                ->setCellValue('B2', 'Tên sản phẩm')
                ->setCellValue('C2', 'Giá niêm yết')
                ->setCellValue('D2', 'Giá khuyến mãi');

    $objPHPExcel->setActiveSheetIndex($sheet)->getColumnDimension('B')->setWidth('30');
    $objPHPExcel->setActiveSheetIndex($sheet)->getColumnDimension('D')->setWidth('12');
    $objPHPExcel->setActiveSheetIndex($sheet)->getColumnDimension('E')->setWidth('12');

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

        $objPHPExcel->setActiveSheetIndex($sheet)
                ->setCellValue('A'.$i, $product->ID)
                ->setCellValue('B'.$i, $product->post_title)
                ->setCellValue('C'.$i, $d_price)
                ->setCellValue('D'.$i, $s_price);
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

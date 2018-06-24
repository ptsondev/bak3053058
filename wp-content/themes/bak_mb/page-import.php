<?php
/*
  Template Name: Import from Excel
 */
?>

<?php

// khong bat khi khong xai den

require_once('Classes_PHPEXCEL/PHPExcel.php');
$inputFileName = './wp-content/themes/bak/import.xlsx';

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$sheetCount = $objPHPExcel->getSheetCount();
for($i=0; $i<$sheetCount-1; $i++){

    //  Get worksheet dimensions
    $cursheet = $objPHPExcel->getSheet($i); 
    $highestRow = $cursheet->getHighestRow(); 
    $highestColumn = $cursheet->getHighestColumn();

    //  Loop through each row of the worksheet in turn
    for ($row = 2; $row <= $highestRow; $row++){ 
        //  Read a row of data into an array
        $rowData = $cursheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                        NULL,
                                        TRUE,
                                        FALSE);
        //  Insert row data array into your database of choice here

        $rowData = array_shift($rowData);
        //var_dump($rowData);
        $db = connect_db();
        $db->queryNoResult('UPDATE `bak_postmeta` SET meta_value=? 
    WHERE meta_key="wpcf-product_sell_price" AND post_id=?', $rowData[3], $rowData[0]);

    }

}

echo "done";
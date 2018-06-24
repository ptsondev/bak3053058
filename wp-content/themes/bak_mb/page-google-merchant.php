<?php
/*
  Template Name: Google Merchant
 */
?>
<?php 
//require('vendor/autoload.php');
require('google-merchant/src/NinthYard/GoogleShoppingFeed/Feed.php');
require('google-merchant/src/NinthYard/GoogleShoppingFeed/Item.php');
require('google-merchant/src/NinthYard/GoogleShoppingFeed/Node.php');
require('google-merchant/src/NinthYard/GoogleShoppingFeed/Containers/GoogleShopping.php');

use NinthYard\GoogleShoppingFeed\Containers\GoogleShopping;

GoogleShopping::title('Test Feed');
GoogleShopping::link('http://www.example.com/');
GoogleShopping::description('Test Google Shopping Feed');

$item = GoogleShopping::createItem();
$item->id('SKU0001');//A SKU code for example, or any unique identifies (eg. could be the id from a database table)
$item->title('An Example Product Title');
$item->price('29.99'); //Price one wishes to sell a product for (unless sale_price option is added, then it's the original price)
$item->mpn('ACME00001');
$item->brand('ACME');
$item->sale_price('19.99'); //The actual price one wishes to sell a product for (optional)
$item->link('http://www.example.com/example-product.html');
$item->image_link('http://www.example.com/example-image.jpg');


/** create a variant */
$variant = $item->variant();
$variant->size('L');
$variant->color('Green');

/**
 * If creating variants one should delete the initial product object as
 * the variants will have the original $item properties and will be
 * grouped under one product group with the information from the $item
 * 
 * $item->delete();
 *
**/


// boolean value true outputs to browser as XML
GoogleShopping::asRss(true);

// boolean value true outputs raw (to put in a file for example)
file_put_contents('myfeed.xml', GoogleShopping::asRss(false));
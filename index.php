<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/06/15
 * Time: 20:46
 */
require('phpQuery/phpQuery.php');
include("Product.php");
include("Scrapper.php");

$arr =  array(".s-access-title", ".s-access-image", ".s-price", ".a-size-small.a-color-secondary"); //classes or ids of the product attributes in order.
$quantity = isset($_GET['t']) ? $_GET['t'] : 1;
$scrapper = new Scrapper("Amazon", "http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=", $arr, "#result_");
$q = str_replace(" ", "+", $_GET['q']); //in amazon the space is replaced by "+"
$product = $scrapper->scrap($q, $quantity);
for($t = 0; $t<$quantity;$t++) {
    if(isset($product[$t]) && isset($product[$t][$arr[0]]) && isset($product[$t][$arr[1]]) && isset($product[$t][$arr[2]]) && isset($product[$t][$arr[3]])){
        $producto = new Product($product[$t][$arr[0]], $product[$t][$arr[1]], $product[$t][$arr[2]], $product[$t][$arr[3]]);
        echo $producto->toString();
        echo "<br><br>";
    }
}
?>
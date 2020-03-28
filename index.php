<?php
//Require Once Files
require_once "Database.php";

$products = Database::getInstance()->query("SELECT * FROM products");

if($products->showError()){
  echo 'you have eror';
}
else{

  $results = $products->count();
  var_dump($results);

}
<?php
//Require Once Files
require_once "Database.php";

#$products = Database::getInstance()->get('products', ['name', '=', 'Macbook PRO']);
#Database::getInstance()->delete('products', ['name', '=', 'test']);
//Database::getInstance()->insert('products', [
//  'name' => 'Tested',
//  'stock' => '20',
//  'price' => '1153'
//]);


Database::getInstance()->update('products', 4, [

  'name' => 'Lenovo New',
  'stock' => '200',
  'price' => '7500'

]);


//if($products->showError()){
//  echo 'you have eror';
//}
//else{
//
//  $results = $products->showResult();
//  foreach($results as $result){
//
//    var_dump($result);
//
//  }
//}
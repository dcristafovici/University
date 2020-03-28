<?php
//Require Once Files
require_once "Database.php";

$products = Database::getInstance()->query("SELECT * FROM products where name IN(?,?)", ['Dell G3 15', 'Macbook PRO']);

if($products->showError()){
  echo 'you have eror';
}
else{

  $results = $products->showResult();
  foreach($results as $result){

    echo $result->name.'<br>';

  }
}
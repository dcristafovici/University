<?php
//Require Once Files
require_once "Database.php";
require_once "Config.php";
require_once "Input.php";
require_once "Validate.php";

$GLOBALS['config']= [
  'mysql' =>[
    'host'=> 'localhost',
    'dbname' => 'university',
    'username' => 'mysql',
    'password' => 'mysql',
    'something' => [
      'something_one' =>[
        'something_two' => 'danu'
      ]
    ]
  ]
];



//$products = Database::getInstance()->get('products', ['name', '=', 'Tested']);
#Database::getInstance()->delete('products', ['name', '=', 'test']);
//Database::getInstance()->insert('products', [
//  'name' => 'Tested',
//  'stock' => '20',
//  'price' => '1153'
//]);


//Database::getInstance()->update('products', 4, [
//
//  'name' => 'Lenovo New',
//  'stock' => '200',
//  'price' => '7500'
//
//]);
//

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


if(Input::exists()){

    $validate = new Validate();

    
    $validation = $validate->check($_POST, [
			'name' => [
				'required' => true,
				'min' => 3,
				'max' => 6,
				'unique' => 'products'
			],
			'password' => [
				'required' => true,
				'min' => 3,
				'max' => 6,
			],
			'password_again' =>[
			    'required' => true,
				'matches' => 'password'
			]
    
    ]);
    
    if($validate->success()){
        echo 'passed';
    }
    else{
        $allErrors = $validate->showErrors();
        foreach($allErrors as $error){
            echo $error."<br>";
        }
     
    }
    

}

?>


<form action="" method="post">

  <div class="field">
    <label for="">Имя пользователя</label>
    <input type="text" value="<?php echo Input::get('name');?>" name="name">
  </div>

  <div class="field">
    <label for="">Пароль</label>
    <input type="password" name="password">
  </div>

  <div class="field">
    <label for="">Повторите пароль</label>
    <input type="password" name="password_again">
  </div>

  <div class="field">
      <button>Отправить</button>
  </div>

</form>

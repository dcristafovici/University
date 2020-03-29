<?php

require_once "init.php";



if(Input::exists()){
	
	if(Token::check(Input::get('token'))){
		
		$validate = new Validate();
		
		
		$validation = $validate->check($_POST, [
			'name' => [
				'required' => true,
				'min' => 3,
				'max' => 16,
				'unique' => 'products'
			],
			'email' => [
                'required' => true,
                'min' => 3,
                'email' => true,
                'max' => 35,
                'unique' => 'products'
            ],
			'password' => [
				'required' => true,
				'min' => 3,
				'max' => 16,
			],
			'password_again' =>[
				'required' => true,
				'matches' => 'password'
			]
		
		]);
		
		if($validate->success()){
			
			Session::flash('success','Да ты же  молодец');
			echo 'passed';
			$user = new User();
			$user->create([
				
				'name'=> Input::get('name'),
				'email' => Input::get('email'),
				'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
			
			]);
			
			
		}
		else{
			$allErrors = $validate->showErrors();
			foreach($allErrors as $error){
				echo $error."<br>";
			}
			
		}
		
	}
}

?>


<form action="" method="post">
	<?php echo Session::flash('success');?>
	
	<div class="field">
		<label for="">Имя пользователя</label>
		<input type="text" value="<?php echo Input::get('name');?>" name="name">
	</div>
	
    <div class="field">
        <label for="Email">E-mail</label>
        <input type="text" name="email">
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
		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
	</div>
	
	<div class="field">
		<button>Отправить</button>
	</div>

</form>
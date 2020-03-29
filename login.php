<?php
	require_once "init.php";
	
	
	if(Input::exists()){


			$validate = new Validate();
			
			$validate->check($_POST, [
				'email' => ['required' => true, 'email' => true],
				'password' => ['required' => true]
			]);
			
			if($validate->success()){
				
				$user = new User();
				$login = $user->login(Input::get('email'), Input::get('password'));
				if($login){
					
					Redirect::to('index.php');
					
				}
				else{
				    echo 'login fail';
                }
				
			}
			else{
				foreach ($validate->showErrors() as $error){
					echo $error.'<br>';
				}
			}
		
		
	}

?>


<form action="" method="POST">
	
	
	<div class="field">
		<label for="">Email</label>
		<input type="text" name="email">
	</div>
	
	<div class="field">
		<label for="">Password</label>
		<input type="password" name="password">
	</div>
	
	<div class="field">
		<button>Отправить</button>
	</div>
	
</form>

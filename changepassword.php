<?php
require_once 'init.php';
$user = new User;


if(Input::exists()){
	
	$validate = new Validate();
	$validate->check($_POST,[
		'password_current'=> ['required' => true],
		'password_new' => ['required' => true],
		'new_password_again' => ['required'=> true, 'matches'=>'password_new']
	]);
	
	if($validate->success()){
		
		if(password_verify(Input::get('password_current'), $user->data()->password)){
			$user->update(["password" => password_hash(Input::get('password_new'), PASSWORD_DEFAULT)]);
			Redirect::to('changepassword.php');
		}
		else{
			echo 'invalide current password';
		}
	}
	
	else{
		$errors = $validate->showErrors();
		foreach ($errors as $error){
			
			echo $error.'<br>';
			
		}
	}
	
}

?>


<form method="POST">
	
	<div class="field">
		<label for="">Current Password</label>
		<input type="text" name="password_current"  >
	</div>
	
	<div class="field">
		<label for="">New password</label>
		<input type="text" name="password_new">
	</div>
	
	<div class="field">
		
		<label for="">New password Again</label>
		<input type="text" name="new_password_again">
	</div>
	
	<div class="field">
		<button>Submit</button>
	</div>
</form>


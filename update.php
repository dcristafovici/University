<?php

require_once 'init.php';
$user = new User;

if(Input::exists()){
	
	$validate = new Validate();
	$validate->check($_POST,[
		'name'=> ['required' => true],
	]);
	
	if($validate->success()){
		$user = new User();
		$user->update(["name" => Input::get('name')]);
		Redirect::to('update.php');
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
        <label for="">Username</label>
        <input type="text" name="name" value="<?php echo $user->data()->name?>" >
    </div>

    <div class="field">
        <button>Submit</button>
    </div>
</form>

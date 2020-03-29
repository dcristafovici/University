<?php

require_once 'init.php';

//var_dump(Session::get(Config::get('session.user_session')));
$user = new User();
if($user->isLoggedIn()){
	echo "hello {$user->data()->name}".'<br>';
	echo "<a href='logout.php'>Logout</a>"."<br>";
	echo "<a href='update.php'>Update</a>"."<br>";
	echo "<a href='changepassword.php'>Change Password</a>" .'<br>';
	
	if($user->hasPermissions('admin')){
		echo '<h1>you are admin</h1>';
	}

	
}


else{
	echo "<a href='login.php'>Login</a>".'<br>';
	echo "<a href='register.php'>Register</a>";
}
<?php

require_once 'init.php';

//var_dump(Session::get(Config::get('session.user_session')));
$user = new User();
if($user->isLoggedIn()){
	echo "hello {$user->data()->name}".'<br>';
	echo "<a href='logout.php'>Logout</a>";
}


else{
	echo "<a href='login.php'>Login</a>".'<br>';
	echo "<a href='register.php'>Register</a>";
}
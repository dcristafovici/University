<?php

session_start();
//Require Once Files
require_once "Classes/Database.php";
require_once "Classes/Config.php";
require_once "Classes/Input.php";
require_once "Classes/Validate.php";
require_once "Classes/Session.php";
require_once "Classes/Token.php";
require_once 'Classes/User.php';
require_once "Classes/Redirect.php";

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
	],
	
	'session' =>[
		'token_name' => 'token'
	]
];
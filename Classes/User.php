<?php


class User
{
	
	private $db, $data, $session_name, $isLoggedIn;
	
	public function __construct($user = null)
	{
		$this->db = Database::getInstance();
		$this->session_name = Config::get('session.user_session');
		
		
		if(!$user){
			
			if(Session::exists(Config::get('session.user_session'))){
				$user = Session::get(Config::get('session.user_session'));
			
				if($this->find($user)){
					$this->isLoggedIn = true;
				}
				
				
				
				
			}
			
		}
		else{
			$this->find($user);
		}
		
	}
	
	public function create($fields){
		$this->db->insert('products', $fields);
	}
	
	public function login($email = null, $password = null){
		
		if($email){
			$user = $this->find($email);
			if($email){
				if(password_verify($password, $this->data->password)){;
					Session::put($this->session_name, $this->data->id);
					return true;
				}
			}
		}
		return false;
		
	}
	
	
	public  function find($value = null){
		if(is_numeric($value)){
			$this->data = $this->db->get('products', ['id','=', $value])->first();
		}
		else{
			$this->data = $this->db->get('products', ['email','=', $value])->first();
		}
		if($this->data){
			return true;
		}
		return false;
	}
	
	
	public function data(){
		return $this->data;
	}
	
	
	public function isLoggedIn(){
		
		return $this->isLoggedIn;
		
	}
	
	public function logOut(){
		
		return Session::delete($this->session_name, $this->data->id);
	}
	
}
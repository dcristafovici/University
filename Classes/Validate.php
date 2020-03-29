<?php


class Validate
{
  private $db = null, $errors = [], $success = false;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }


  public function check($source, $fields ){

		foreach ($fields as $item=>$rules) {
			
			foreach ($rules as $rule =>$rule_value) {
				
				$value = $source[$item];
			
				if($rule == 'required' && empty($value)){
					$this->addError("{$item} объязателен для заполнения");
				}
				else if(!empty($value)){
					
					switch ($rule){
						
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError("{$item} должен иметь больше {$rule_value} символов");
							}
						break;
							
						case 'max':
							if(strlen($value) > $rule_value){
								$this->addError("{$item} должен иметь меньше {$rule_value} символов");
							}
						break;
							
						case 'matches':
							if($value != $source[$rule_value]){
								$this->addError("{$rule_value} должен совпадать с {$item}" );
							}
						break;
							
						case 'unique';
							$check = $this->db->get($rule_value, [$item, '=', $value]);
							if($check->count()){
								$this->addError("${item} уже существует в базе данных");
							}
						break;
						
						case 'email';
						if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
							$this->addError("{$item} не правильный формат");
						}
						
					}
					
				}
				
				
				
				
				
				
				
			}


		}
		if(empty($this->errors)){
			$this->success = true;
		}
		return $this;
  }

  public function addError($error){

    $this->errors[] = $error;

  }

  public function showErrors(){
    return $this->errors;

  }

  public function success(){

  	return $this->success;

	}

}
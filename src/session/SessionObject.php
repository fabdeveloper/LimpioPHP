<?php

class SessionObject{
	
	private $email;
	private $token;
	private $licence;
	private $lifetime = 108000;
	
	
	
	public function __contruct($email, $token, $licence){
		$this->email = $email;
		$this->token = $token;
		$this->licence = $licence;		
	}
	
	
	public function createToken(){
		// crea el token
		$token = "token123";
		$this->token = $token;

	}
	
	public function getSaveSessionQuery($email, $token, $licence, $lifetime){
		$query = "INSERT INTO session(email, token, licence, lifetime)VALUES('" .
					$email . "', '" .
					$token . "', '" .
					$licence . "'," .
					$lifetime . ")";
		return $query;
	}
	
	public function getSaveSessionQuery(){
		$query = "INSERT INTO session(email, token, licence, lifetime)VALUES('" .
				$this->email . "', '" .
				$this->token . "', '" .
				$this->licence . "'," .
				$this->lifetime . ")";
				return $query;
	}
	
	
	
	public function getSelectSessionQuery($email){
		$query = "SELECT * FROM session WHERE email = '" . $email . "'";
		return $query;
	}
	
	public function getSelectSessionQuery(){
		$query = "SELECT * FROM session WHERE email = '" . $this->email . "'";
		return $query;
	}
	
	
	
	public function set_email($new_email) {
		$this->email = $new_email;
	}
	
	public function get_email() {
		return $this->email;
	}
	
	public function set_token($new_token) {
		$this->token = $new_token;
	}
	
	public function get_token() {
		return $this->token;
	}
	
	public function set_licence($new_licence) {
		$this->licence = $new_licence;
	}
	
	public function get_licence() {
		return $this->licence;
	}
	
}

?>
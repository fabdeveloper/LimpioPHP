<?php

 class DBManager{
 	/*
 	private $servername = "localhost";
 	private $username = "username";
 	private $password = "password";
 	private $dbname = "myDB";
 	private $conn = null;
 	
 	*/

 	
 	public function __construct( $servername, $username, $password, $dbname) {
 		$this->servername = $servername;
 		$this->username = $username;
 		$this->password = $password;
 		$this->dbname = $dbname;
 	}
 	
 	public function __destruct(){
 		$this->closeDB(); 	
 	}
 	
 	public function init(){
 		$this->conn = $this->connectDB($this->servername, $this->username, $this->password, $this->dbname, $this->conn);
 		return $this->conn; 			
 	}
 	
 	public function connectDB($servername,$username,$password,$dbname,$conn){
 		// Create connection 	
 		$conn = mysqli_connect($servername, $username, $password, $dbname);
 		// Check connection
 		if (!$conn) {
 			throw new Exception(mysqli_connect_error());
 		} 	
 		return $conn; 		
 	}
 	
 	public function closeDB(){
 		if($this->conn){
 			if(!mysqli_close($this->conn)){
 				throw new Exception("exception cerrando DB"); 				
 			}
 		} 	
 	} 	
 	
 	public function executeQuery($query){
 		if($this->conn){
 			$result = mysqli_query($this->conn, $query); 			
 		}else{
 			throw new Exception("DB no inicializada");
 		} 		
 		return $result;
 	}
 	
 	public function executeMultiQuery($query){
 		if(!$this->conn){
 			throw new Exception("DB no inicializada en DBManager->executeMultiQuery()"); 			
 		}
 		if (mysqli_multi_query($this->conn, $query)) {
 			echo "New records created successfully";
 		} else {
 			//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 			throw new Exception("ERROR DBManager->executeMultiQuery():" . mysqli_error($conn));
 			
 		}
 	}
 	
 	public function getNumRows($resultSet){
 		return mysqli_num_rows($resultSet);
 	}
 	
 	public function getNextRow($resultSet){
 		return mysqli_fetch_assoc($resultSet);
 	}
 	
 	public function set_servername($new_servername) {
 		$this->servername = $new_servername;
 	}
 	
 	public function get_servername() {
 		return $this->servername;
 	}
 	
 	public function set_username($new_username) {
 		$this->username = $new_username;
 	}
 	
 	public function get_username() {
 		return $this->username;
 	}
 	
 	public function set_password($new_password) {
 		$this->password = $new_password;
 	}
 	
 	public function get_password() {
 		return $this->password;
 	}
 	
 	public function set_myDB($new_myDB) {
 		$this->myDB = $new_myDB;
 	}
 	
 	public function get_myDB() {
 		return $this->myDB;
 	}
 	
 	public function set_conn($new_conn) {
 		$this->conn = $new_conn;
 	}
 	
 	public function get_conn() {
 		return $this->conn;
 	}
}
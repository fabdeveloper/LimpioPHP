<?php
class UserObject{

	private  $id_usuario = "";
	private $email = "";
	private $password = "";
	private $nombre = "";
	private $apellido1 = "";
	private $apellido2 = "";
	private $telefono = "";
	private $direccion = "";
	private $poblacion = "";
	private $provincia = "";
	private $pais = "";
	private $codigo_postal = "";
	private $numero_documento = "";
	private $tipo_documento = "";
	private $IBAN = "";
	private $tipo_user = "";
	private $valido = "";
	private $fecha_creacion = "";
	private $fecha_ultimoacceso = "";


	public function __construct(){

	}

	public function setUser($postData){

		$this->id_usuario = $postData["id_usuario"];
		$this->email = $postData["email"];
		$this->password = $postData["password"];
		$this->nombre = $postData["nombre"];
		$this->apellido1 = $postData["apellido1"];

		$this->apellido2 = $postData["apellido2"];
		$this->telefono = $postData["telefono"];
		$this->direccion = $postData["direccion"];
		$this->poblacion = $postData["poblacion"];
		$this->provincia = $postData["provincia"];

		$this->pais = $postData["pais"];
		$this->codigo_postal = $postData["codigo_postal"];
		$this->numero_documento = $postData["numero_documento"];
		$this->tipo_documento = $postData["tipo_documento"];

		$this->IBAN = $postData["iban"];
		$this->tipo_user = $postData["tipo_user"];
		$this->valido = $postData["valido"];
		$this->fecha_creacion = $postData["fecha_creacion"];
		$this->fecha_ultimoacceso = $postData["fecha_ultimoacceso"];
	}

	public function getInsertUserQuery(){
		$query = "INSERT INTO usuarios(nombre,apellido1,apellido2,email,password,telefono,direccion,poblacion,provincia,pais,codigo_postal,numero_documento,tipo_documento,iban)" .
				"VALUES('" .
				$this->nombre . "','" .
				$this->apellido1 . "','" .
				$this->apellido2 . "','" .
				$this->email . "','" .
				$this->password . "'," .
				$this->telefono . ",'" .
				$this->direccion . "','" .
				$this->poblacion . "','" .
				$this->provincia . "','" .
				$this->pais . "'," .
				$this->codigo_postal . ",'" .
				$this->numero_documento . "','" .
				$this->tipo_documento . "','" .
				$this->iban . "')";

				return $query;
	}

	public function getUpdateUserQuery(){

		$query = "UPDATE usuarios SET " .
				"nombre= '" . $this->nombre .
				"', apellido1='" . $this->apellido1 .
				"',apellido2='" . $this->apellido2 . 
				"',email='" . $this->email . 
				"',password='" . $this->password . 
				"',telefono=" . $this->telefono . 
				",direccion='" . $this->direccion . 
				"',poblacion='" . $this->poblacion . 
				"',provincia='" . $this->provincia . 
				"',pais='" . $this->pais . 
				"',codigo_postal=" . $this->codigo_postal . 
				",numero_documento='" . $this->numero_documento . 
				"',tipo_documento='" . $this->tipo_documento . 
				"',iban='" . $this->iban . "'" .
				" WHERE id_usuario = " . $this->id_usuario;

		return $query;
	}

	public function getPasswordFromEmailQuery($email){
		$query = "SELECT password FROM usuarios WHERE email = '" . $email . "'";
		return $query;
	}

	public function getAllQuery($email){
		$query = "SELECT * FROM usuarios WHERE email = '" . $email . "'";
		return $query;
	}
	

	// GETTERS AND SETTERS
	
	public function set_id_usuario($new_id_usuario) {
		$this->id_usuario = $new_id_usuario;
	}

	public function get_id_usuario() {
		return $this->id_usuario;
	}

	public function set_email($new_email) {
		$this->email = $new_email;
	}

	public function get_email() {
		return $this->email;
	}

	public function set_password($new_password) {
		$this->password = $new_password;
	}

	public function get_password() {
		return $this->password;
	}

	public function set_nombre($new_nombre) {
		$this->nombre = $new_nombre;
	}

	public function get_nombre() {
		return $this->nombre;
	}

	public function set_apellido1($new_apellido1) {
		$this->apellido1 = $new_apellido1;
	}

	public function get_apellido1() {
		return $this->apellido1;
	}
	public function set_apellido2($new_apellido2) {
		$this->apellido2 = $new_apellido2;
	}

	public function get_apellido2() {
		return $this->apellido2;
	}
	public function set_telefono($new_telefono) {
		$this->telefono = $new_telefono;
	}

	public function get_telefono() {
		return $this->telefono;
	}
	public function set_direccion($new_direccion) {
		$this->direccion = $new_direccion;
	}

	public function get_direccion() {
		return $this->direccion;
	}
	public function set_poblacion($new_poblacion) {
		$this->poblacion = $new_poblacion;
	}

	public function get_poblacion() {
		return $this->poblacion;
	}
	public function set_provincia($new_provincia) {
		$this->provincia = $new_provincia;
	}

	public function get_provincia() {
		return $this->provincia;
	}
	public function set_pais($new_pais) {
		$this->pais = $new_pais;
	}

	public function get_pais() {
		return $this->pais;
	}
	public function set_codigo_postal($new_codigo_postal) {
		$this->codigo_postal = $new_codigo_postal;
	}

	public function get_codigo_postal() {
		return $this->codigo_postal;
	}
	public function set_numero_documento($new_numero_documento) {
		$this->numero_documento = $new_numero_documento;
	}

	public function get_numero_documento() {
		return $this->numero_documento;
	}
	public function set_tipo_documento($new_tipo_documento) {
		$this->tipo_documento = $new_tipo_documento;
	}

	public function get_tipo_documento() {
		return $this->tipo_documento;
	}
	public function set_IBAN($new_IBAN) {
		$this->IBAN = $new_IBAN;
	}

	public function get_IBAN() {
		return $this->IBAN;
	}
	public function set_tipo_user($new_tipo_user) {
		$this->tipo_user = $new_tipo_user;
	}

	public function get_tipo_user() {
		return $this->tipo_user;
	}
	public function set_valido($new_valido) {
		$this->valido = $new_valido;
	}

	public function get_valido() {
		return $this->valido;
	}
	public function set_fecha_creacion($new_fecha_creacion) {
		$this->fecha_creacion = $new_fecha_creacion;
	}

	public function get_fecha_creacion() {
		return $this->fecha_creacion;
	}
	public function set_fecha_ultimoacceso($new_fecha_ultimoacceso) {
		$this->fecha_ultimoacceso = $new_fecha_ultimoacceso;
	}

	public function get_fecha_ultimoacceso() {
		return $this->fecha_ultimoacceso;
	}
}
?>

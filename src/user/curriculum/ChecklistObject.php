<?php

class ChecklistObject{
	
	private $id_usuario;
	private $carnet;
	private $vehiculo;	
	private $ingles;
	private $aleman;
	private $catalan;
	private $cocina;
	private $plancha;
	private $cuidado_personas;
	private $canguro;		

	public function __construct($id_usuario){
		$this->id_usuario = $id_usuario;		
	}
	
	public function setItemsValuesFromPost($post){		
		if ( ! empty( $post ) ) { 			
			$this->carnet = (isset($post['carnet']))? 1 : 0;
			$this->vehiculo = (isset($post['vehiculo']))? 1 : 0;
			$this->ingles = (isset($post['ingles']))? 1 : 0;
			$this->aleman = (isset($post['aleman']))? 1 : 0;
			$this->catalan = (isset($post['catalan']))? 1 : 0;
			$this->cocina = (isset($post['cocina']))? 1 : 0;
			$this->plancha = (isset($post['plancha']))? 1 : 0;
			$this->cuidado_personas = (isset($post['cuidado_personas']))? 1 : 0;
			$this->canguro = (isset($post['canguro']))? 1 : 0;
		}		
	}
	
	public function getInsertChecklistQueryFromPostParams($post){
		$this->setItemsValuesFromPost($post);
		return $this->getChecklistQuery();
	}
	
	public function getChecklistQuery(){
		$query = "SELECT * FROM checklist_curriculum WHERE id_usuario = " . $this->id_usuario;		
		return $query;		
	}
	
	public function getInsertChecklistQuery(){
		$query = "INSERT INTO checklist_curriculum(id_usuario, carnet, vehiculo, ingles, aleman, catalan, cocina, plancha, cuidado_personas, canguro)" .
		"VALUES(" .
			$this->id_usuario . "," .
			$this->carnet . "," .
			$this->vehiculo . "," .
			$this->ingles . "," .
			$this->aleman . "," .
			$this->catalan . "," .
			$this->cocina . "," .
			$this->plancha . "," .
			$this->cuidado_personas . "," .
			$this->canguro . ")";
		return $query;
	}	
	
	public function getDeleteChecklistQuery(){
		$query = "DELETE FROM checklist_curriculum WHERE id_usuario = " . $this->id_usuario;
		return $query;
	}
	// GETTERS AND SETTERS
	
	public function set_carnet($carnet)	{
		$this->carnet = $carnet; 
	} 
	
	public function get_carnet() {
		return $this->carnet; 
	}	
	
	public function set_vehiculo($vehiculo) {
		$this->vehiculo = $vehiculo; 
	} 
	
	public function get_vehiculo() 	{
		return $this->vehiculo; 
	}
	
	public function set_ingles($ingles) {
		$this->ingles = $ingles;
	}
	
	public function get_ingles() {
		return $this->ingles;
	}	
	
	public function set_aleman($aleman) {
		$this->aleman = $aleman;
	}
	
	public function get_aleman() {
		return $this->aleman;
	
	}
	public function set_catalan($catalan) {
		$this->catalan = $catalan;
	}
	
	public function get_catalan() {
		return $this->catalan;
	}
	
	public function set_cocina($cocina) {
		$this->cocina = $cocina;
	}
	
	public function get_cocina() {
		return $this->cocina;
	}
	
	public function set_plancha($plancha) {
		$this->plancha = $plancha;
	}
	
	public function get_plancha() {
		return $this->plancha;
	}	
	
	public function set_cuidado_personas($cuidado_personas) {
		$this->cuidado_personas = $cuidado_personas;
	}
	
	public function get_cuidado_personas() {
		return $this->cuidado_personas;
	}
	
	public function set_canguro($canguro) {
		$this->canguro = $canguro;
	}
	
	public function get_canguro() {
		return $this->canguro;
	}	
	/*
	 public function getUpdateAllQuery(){
	 $query = "";
	
	 $query .= $this->getDeleteAllItemsOfAUserQuery($id_usuario);
	
	 if ($carnet) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("carnet"), $id_usuario);
	 }
	 if ($vehiculo) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("vehiculo"), $id_usuario);
	 }
	 if ($ingles) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("ingles"), $id_usuario);
	 }
	 if ($aleman) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("aleman"), $id_usuario);
	 }
	 if ($catalan) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("catalan"), $id_usuario);
	 }
	 if ($cocina) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("cocina"), $id_usuario);
	 }
	 if ($plancha) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("plancha"), $id_usuario);
	 }
	 if ($cuidado_personas) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("cuidado_personas"), $id_usuario);
	 }
	 if ($canguro) {
	 $query .= $this->getInsertItemQuery($this->getIdFromNombreQuery("canguro"), $id_usuario);
	 }
	
	 return $query;
	 }
	
	 public function setItemsValuesFromName($item_name){
	 switch ($item_name){
	 case "carnet":
	 $this->carnet = TRUE;
	 break;
	 case "vehiculo":
	 $this->vehiculo = TRUE;
	 break;
	 case "ingles":
	 $this->ingles = TRUE;
	 break;
	 case "aleman":
	 $this->aleman = TRUE;
	 break;
	 case "catalan":
	 $this->catalan = TRUE;
	 break;
	 case "cocina":
	 $this->cocina = TRUE;
	 break;
	 case "plancha":
	 $this->plancha = TRUE;
	 break;
	 case "cuidado_personas":
	 $this->cuidado_personas = TRUE;
	 break;
	 case "canguro":
	 $this->canguro = TRUE;
	 break;
	 default:
	 break;
	 }
	 }
	
	 public function getIdFromNombreQuery($nombre){
	 $query = "SELECT * FROM item_checklist_curriculum WHERE nombre = '" . $nombre ."'";
	 return $query;
	 }
	
	 public function getNombreFromIdQuery($id_item_checklist_curriculum){
	 $query = "SELECT nombre FROM item_checklist_curriculum WHERE id_item_checklist_curriculum = " . $id_item_checklist_curriculum;
	 return $query;
	 }
	
	
	 public function getInsertItemQuery($id_item_checklist_curriculum, $id_usuario){
	 $query = "INSERT INTO checklist_curriculum_usuario(id_item_checklist_curriculum, id_usuario) VALUES("
	 . $id_item_checklist_curriculum . "," . $id_usuario . ")";
	
	 return $query;
	 }
	
	 public function getDeleteAllItemsOfAnUserQuery($id_usuario){
	 $query = "DELETE FROM checklist_curriculum_usuario WHERE id_usuario = " . $id_usuario;
	 return $query;
	 }
	
	 public function getSelectAllItemsOfAnUserQuery($id_usuario){
	 $query = "SELECT id_item_checklist_curriculum FROM checklist_curriculum_usuario WHERE id_usuario = " . $id_usuario;
	 return $query;
	 }	
	 */	
}

?>

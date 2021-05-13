<?php
/*
* Da_evs_key_component_gcm
* Key Component of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_key_component_gcm
* Key Component of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_key_component_gcm
* Key Component of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_key_component_gcm
* Key Component of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_key_component_gcm extends evs_model {		
	
	public $kcg_id; //Number Sequence	
	public $kcg_key_component_detail_en; //compentency detaIl english
	public $kcg_key_component_detail_th; //compentency detaIl thai	
	public $kcg_year; //Year of evaluate	
	public $kcg_cpg_id; //Competency Sequence	

	function __construct() {
		parent::__construct();
		

	}
	/*
	* insert
	* Insert Key Compentency into database
	* @input kcg_compentency_detal, kcg_cpg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Key Compentency into database
	* @input kcg_compentency_detal, kcg_cpg_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 	$sql = "INSERT INTO evs_database.evs_key_component_gcm (kcg_key_component_detail_en, kcg_key_component_detail_th, kcg_cpg_id)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->kcg_key_component_detail_en, $this->kcg_key_component_detail_th, $this->kcg_cpg_id));
	
	 }

	/*
	* update
	* Update Key Compentency into database
	* @input kcg_id, kcg_compentency_detal, kcg_year, kcg_cpg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Key Compentency into database
	* @input kcg_id, kcg_compentency_detal, kcg_year, kcg_cpg_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {

	 	$sql = "UPDATE evs_database.evs_key_component_gcm 
	 			SET	kcg_key_component_detail_en=?, kcg_key_component_detail_th=?, kcg_cpg_id=? 
	 			WHERE kcg_id=?";
		
		$this->db->query($sql, array( $this->kcg_key_component_detail_en, $this->kcg_key_component_detail_th, $this->kcg_cpg_id, $this->kcg_id));
		
	 }

	/*
	* delete
	* Delete Key Compentency from database
	* @input kcg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function delete() {
	 	$sql = "DELETE FROM evs_database.evs_key_component_gcm
	 			WHERE kcg_id=?";
	 	$this->db->query($sql, array($this->kcg_id));
		
	 }

	/*
	* get_by_key
	* Get Key Compentency from database
	* @input kcg_id
	* @output kcg_id, kcg_compentency_detal, kcg_year, kcg_cpg_id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Key Compentency from database
	* @input kcg_id
	* @output kcg_id, kcg_compentency_detal, kcg_year, kcg_cpg_id
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component_gcm
				WHERE kcg_id=?";
		$this->db->query($sql, array($this->kcg_id));
		return $query;
	}

	
}	 
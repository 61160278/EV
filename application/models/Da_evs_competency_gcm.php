<?php
/*
* Da_evs_competency_gcm
* Competency of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_competency_gcm
* Competency of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_competency_gcm
* Competency of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_competency_gcm
* Competency of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/
class Da_evs_competency_gcm extends evs_model {		
	public $cpg_id; //Number Sequence	
	public $cpg_competency_detail_en; //competency detail english	
	public $cpg_competency_detail_tn; //competency detail thai	
	public $cpg_definition_detail_en; //competency definition english
	public $cpg_definition_detail_th; //competency definition thai

	function __construct() {
		parent::__construct();
		
	}
	/*
	* insert
	* Insert Competency into database
	* @input cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_en, cpg_definition_th
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Competency into database
	* @input cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_en, cpg_definition_th
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 	 
	 	$sql = "INSERT INTO evs_database.evs_competency_gcm   (cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_detail_en, cpg_definition_detail_th)
	 			VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->cpg_competency_detail_en, $this->cpg_competency_detail_th, $this->cpg_definition_detail_en, $this->cpg_definition_detail_th));
	 }

	/*
	* update
	* Update Competency into database
	* @input cpg_id,cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_en, cpg_definition_th
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Competency into database
	* @input cpg_id,cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_en, cpg_definition_th
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	 	
	 	$sql = "UPDATE evs_database.evs_competency_gcm 
	 			SET	cpg_competency_detail_en=?, cpg_competency_detail_th=?, cpg_definition_detail_en=? , cpg_definition_detail_th=?
	 			WHERE cpg_id=?";
		
		$this->db->query($sql, array($this->cpg_competency_detail_en, $this->cpg_competency_detail_th,$this->cpg_definition_detail_en,$this->cpg_definition_detail_th, $this->cpg_id));
		
	 }

	/*
	* delete
	* Delete Competency from database
	* @input cpg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_competency_gcm
	 			WHERE cpg_id=?";
	 	$this->db->query($sql, array($this->cpg_id));
		
	 }
	
	/*
	* get_by_key
	* Get Competency from database
	* @input cpg_id
	* @output cpg_id,cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_en, cpg_definition_th
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Competency from database
	* @input cpg_id
	* @output cpg_id,cpg_competency_detail_en, cpg_competency_detail_th, cpg_definition_en, cpg_definition_th
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_competency_gcm
				WHERE cpg_id=?";
		$query = $this->db->query($sql, array($this->cpg_id));
		return $query;
	}

	
}	
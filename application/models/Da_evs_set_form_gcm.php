<?php
/*
* Da_evs_set_form_gcm
* Competency Weight of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_set_form_gcm
* Competency Weight of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
/*
* Da_evs_set_form_gcm
* Competency Weight of Position Management
* @author Jakkarin Pimpaeng
* @update Date 2563-12-08
*/
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_set_form_gcm
* Competency Weight of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_set_form_gcm
* Competency Weight of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/
/*
* Da_evs_set_form_gcm
* Competency Weight of Position Management
* @author Jakkarin Pimpaeng
* @update Date 2563-12-08
*/
class Da_evs_set_form_gcm extends evs_model {		
	public $sgc_id; //Number Sequence	
	public $sgc_weight; //competency score	
	public $sgc_pay_id; //Year of evaluate	
	public $sgc_pos_id; //Position Sequence	
	public $sgc_cpg_id; //Competency Sequence	
	
	function __construct() {
		parent::__construct();
		
	}
	/*
	* insert
	* Insert Competency Weight into database
	* @input sgc_weight, sgc_pos_id, sgc_cpg_id, sgc_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Competency Weight into database
	* @input sgc_weight, sgc_pos_id, sgc_cpg_id, sgc_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function insert() {
	 	 
	 	$sql = "INSERT INTO evs_database.evs_set_form_gcm (sgc_weight, sgc_pos_id, sgc_cpg_id, sgc_pay_id)
	 			VALUES( ?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->sgc_weight, $this->sgc_pos_id, $this->sgc_cpg_id, $this->sgc_pay_id));
	
	 }

	/*
	* update
	* Update Competency Weight into database
	* @input sgc_id, sgc_weight, sgc_pay_id, sgc_pos_id, sgc_cpg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Competency Weight into database
	* @input sgc_id, sgc_weight, sgc_pay_id, sgc_pos_id, sgc_cpg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function update() {
	 	$sql = "UPDATE evs_database.evs_set_form_gcm 
	 			SET	sgc_weight=?, sgc_pay_id=? sgc_pos_id=? sgc_cpg_id=?  
	 			WHERE sgc_pos_id=?";
	 	$this->db->query($sql, array($this->sgc_id, $this->sgc_weight, $this->sgc_pay_id, $this->sgc_pos_id, $this->sgc_cpg_id));
		
	 }

	/*
	* delete
	* Delete Competency Weight from database
	* @input sgc_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Competency Weight from database
	* @input sgc_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function delete() {
	 	$sql = "DELETE FROM evs_database.evs_set_form_gcm
	 			WHERE sgc_pos_id=?";
	 	$this->db->query($sql, array($this->sgc_pos_id));
		
	 }
	 
	/*
	* get_by_key
	* Get Competency Weight from database
	* @input sgc_id
	* @output sgc_id, sgc_weight, sgc_pay_id, sgc_pos_id, sgc_cpg_id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Competency Weight from database
	* @input sgc_id
	* @output sgc_id, sgc_weight, sgc_pay_id, sgc_pos_id, sgc_cpg_id
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_gcm
				WHERE sgc_pos_id=?";
		$query = $this->db->query($sql, array($this->sgc_pos_id));
		return $query;
	}

	
}	 
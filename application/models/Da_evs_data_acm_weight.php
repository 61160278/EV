<?php
/*
* Da_evs_data_acm_weight
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_data_acm_weight
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_data_acm_weight
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_data_acm_weight
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_data_acm_weight extends evs_model {		
	
	public $dta_id; 
	public $dta_evs_emp_id; 
	public $dta_sfa_id; 
	public $dta_weight; 


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input dta_data_acm_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input dta_data_acm_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_acm_weight (dta_evs_emp_id,dta_sfa_id,dta_weight,dta_approver)
	 			VALUES(?, ?, ?,?)";
		 
	 	$this->db->query($sql, array($this->dta_evs_emp_id, $this->dta_sfa_id,$this->dta_weight,$this->dta_approver));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input dta_id, dta_data_acm_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input dta_id, dta_data_acm_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_acm_weight 
	 			SET	dta_evs_emp_id=?, dta_sfa_id=?, dta_weight=?, dta_approver = ?
	 			WHERE dta_id=?";
		
		$this->db->query($sql, array($this->dta_evs_emp_id, $this->dta_sfa_id, $this->dta_weight,$this->dta_approver, $this->dta_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input dta_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input dta_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_acm_weight
	 			WHERE dta_id=?";
	 	$this->db->query($sql, array($this->dta_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input dta_id
	* @output dta_id, dta_data_acm_weight_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input dta_id
	* @output dta_id, dta_data_acm_weight_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_acm_weight
				WHERE dta_id=?";
		$query = $this->db->query($sql, array($this->dta_id));
		return $query;
	}

	
}	 
?>
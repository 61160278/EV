<?php
/*
* Da_evs_data_g_and_o_weight
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_data_g_and_o_weight
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_data_g_and_o_weight
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_data_g_and_o_weight
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_data_g_and_o_weight extends evs_model {		
	
	public $dgw_id; 
	public $dgw_evs_emp_id; 
	public $dgw_dgo_id; 
	public $dgw_evaluator_review;
	public $dgw_weight; 


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input dgw_data_g_and_o_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input dgw_data_g_and_o_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_g_and_o_weight (dgw_evs_emp_id,dgw_dgo_id,dgw_evaluator_review,dgw_weight,dgw_approver)
	 			VALUES(?, ?, ?, ?,?)";
		 
	 	$this->db->query($sql, array($this->dgw_evs_emp_id, $this->dgw_dgo_id, $this->dgw_evaluator_review,$this->dgw_weight,$this->dgw_approver));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input dgw_id, dgw_data_g_and_o_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input dgw_id, dgw_data_g_and_o_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_g_and_o_weight 
	 			SET	dgw_evs_emp_id=?, dgw_dgo_id=?, dgw_weight=?, dgw_evaluator_review=?, dgw_approver=?
	 			WHERE dgw_id=?";
		
		$this->db->query($sql, array($this->dgw_evs_emp_id, $this->dgw_dgo_id, $this->dgw_weight, $this->dgw_evaluator_review,$this->dgw_approver, $this->dgw_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input dgw_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input dgw_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_g_and_o_weight
	 			WHERE dgw_id=?";
	 	$this->db->query($sql, array($this->dgw_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input dgw_id
	* @output dgw_id, dgw_data_g_and_o_weight_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input dgw_id
	* @output dgw_id, dgw_data_g_and_o_weight_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_g_and_o_weight
				WHERE dgw_id=?";
		$query = $this->db->query($sql, array($this->dgw_id));
		return $query;
	}

	
}	 
?>
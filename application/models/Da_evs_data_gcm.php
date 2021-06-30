<?php
/*
* Da_evs_data_gcm
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_data_gcm
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_data_gcm
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_data_gcm
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_data_gcm extends evs_model {		
	
	public $dtg_id; 
	public $dtg_evs_emp_id; 
	public $dtg_sgc_id; 
	public $dtg_weight; 


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input dtg_data_gcm_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input dtg_data_gcm_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_gcm (dtg_evs_emp_id,dtg_sgc_id,dtg_weight)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->dtg_evs_emp_id, $this->dtg_sgc_id,$this->dtg_weight));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input dtg_id, dtg_data_gcm_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input dtg_id, dtg_data_gcm_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_gcm 
	 			SET	dtg_evs_emp_id=?, dtg_sgc_id=?, dtg_weight=?
	 			WHERE dtg_id=?";
		
		$this->db->query($sql, array($this->dtg_evs_emp_id, $this->dtg_sgc_id, $this->dtg_weight, $this->dtg_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input dtg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input dtg_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_gcm
	 			WHERE dtg_id=?";
	 	$this->db->query($sql, array($this->dtg_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input dtg_id
	* @output dtg_id, dtg_data_gcm_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input dtg_id
	* @output dtg_id, dtg_data_gcm_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_gcm
				WHERE dtg_id=?";
		$query = $this->db->query($sql, array($this->dtg_id));
		return $query;
	}

	
}	 
?>
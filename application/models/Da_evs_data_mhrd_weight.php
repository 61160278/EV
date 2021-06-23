<?php
/*
* Da_evs_data_mhrd_weight
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_data_mhrd_weight
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_data_mhrd_weight
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_data_mhrd_weight
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_data_mhrd_weight extends evs_model {		
	
	public $mhw_id; 
	public $mhw_evs_emp_id; 
	public $mhw_sfi_id; 
	public $mhw_weight_1;
	public $mhw_weight_2;  


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input mhw_data_mhrd_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input mhw_data_mhrd_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_mhrd_weight (mhw_evs_emp_id,mhw_sfi_id,mhw_weight_1,mhw_weight_2,mhw_approver)
	 			VALUES(?, ?, ?, ?,?)";
		 
	 	$this->db->query($sql, array($this->mhw_evs_emp_id, $this->mhw_sfi_id,$this->mhw_weight_1,$this->mhw_weight_2,$this->mhw_approver));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input mhw_id, mhw_data_mhrd_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input mhw_id, mhw_data_mhrd_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_mhrd_weight 
	 			SET	mhw_evs_emp_id=?, mhw_sfi_id=?, mhw_weight_1=?,mhw_weight_2=?, mhw_approver=?
	 			WHERE mhw_id=?";
		
		$this->db->query($sql, array($this->mhw_evs_emp_id, $this->mhw_sfi_id, $this->mhw_weight_1,$this->mhw_weight_2,$this->mhw_approver, $this->mhw_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input mhw_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input mhw_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_mhrd_weight
	 			WHERE mhw_id=?";
	 	$this->db->query($sql, array($this->mhw_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input mhw_id
	* @output mhw_id, mhw_data_mhrd_weight_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input mhw_id
	* @output mhw_id, mhw_data_mhrd_weight_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mhrd_weight
				WHERE mhw_id=?";
		$query = $this->db->query($sql, array($this->mhw_id));
		return $query;
	}

	
}	 
?>
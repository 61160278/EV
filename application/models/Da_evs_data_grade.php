<?php
/*
* Da_evs_data_grade
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_data_grade
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_data_grade
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_data_grade
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_data_grade extends evs_model {		
	
	public $dgr_id; 
	public $dgr_grade; 
	public $dgr_comment;
	public $dgr_status;
	public $dgr_emp_id; 
	public $dgr_pay_id;
	 


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input mhw_data_grade_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input mhw_data_grade_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_grade (dgr_grade,dgr_comment,dgr_status,dgr_emp_id,dgr_pay_id)
	 			VALUES(?, ?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->dgr_grade,$this->dgr_comment,$this->dgr_status,$this->dgr_emp_id,$this->dgr_pay_id));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input dgr_id, mhw_data_grade_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input dgr_id, mhw_data_grade_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_grade 
	 			SET	dgr_grade=?, dgr_comment=?, dgr_status=? ,dgr_emp_id=?, dgr_pay_id=?
	 			WHERE dgr_id=?";
		
		$this->db->query($sql, array($this->dgr_grade,$this->dgr_comment,$this->$dgr_status,$this->dgr_emp_id, $this->dgr_pay_id, $this->dgr_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input dgr_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input dgr_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_grade
	 			WHERE dgr_id=?";
	 	$this->db->query($sql, array($this->dgr_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input dgr_id
	* @output dgr_id, mhw_data_grade_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input dgr_id
	* @output dgr_id, mhw_data_grade_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_grade
				WHERE dgr_id=?";
		$query = $this->db->query($sql, array($this->dgr_id));
		return $query;
	}

	
}	 
?>
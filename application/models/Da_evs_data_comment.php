<?php
/*
* Da_evs_data_comment
* data comment	
* @author Kunanya singmee
* @update Date 2564-8-19
*/ 
?>
<?php
include_once("evs_model.php");
class Da_evs_data_comment extends evs_model {		
	
	public $dgr_id; 
	public $dgr_grade; 
	public $dgr_comment;
	
	public $dgr_emp_id; 
	public $dgr_pay_id;
	 


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert
	* @input 
	* @output -
	* @author Kunanya singmee
	* @Create Date 2564-8-19
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_comment (dcm_comment,dcm_emp_id,dcm_aprprover)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->dcm_comment,$this->dcm_emp_id,$this->dcm_aprprover));
	
	 }
	 
	/*
	* update
	* Update 
	* @input
	* @output -
	* @author Kunanya singmee
	* @Create Date 2564-8-19
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_comment 
	 			SET	dcm_comment=?, dcm_emp_id=?,dcm_aprprover=?
	 			WHERE dcm_id=?";
		
		$this->db->query($sql, array($this->dcm_comment,$this->dcm_emp_id, $this->dcm_aprprover, $this->dcm_id));
		 
	 }

	/*
	* delete
	* Delete
	* @input 
	* @output -
	* @author Kunanya singmee
	* @Create Date 2564-8-19
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_comment
	 			WHERE dcm_id=?";
	 	$this->db->query($sql, array($this->dcm_id));
		
	 }

	/*
	* get_by_key
	* Get
	* @input 
	* @output 
	* @author Kunanya singmee
	* @Create Date 2564-8-19
	*/

	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_comment
				WHERE dcm_id=?";
		$query = $this->db->query($sql, array($this->dcm_id));
		return $query;
	}

	
}	 
?>
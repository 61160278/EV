<?php
/*
* Da_evs_data_mbo
* 
* @author Kunanya Singmee
* @Create Date 2564-04-19
*/ 


include_once("evs_model.php");

/*
* Da_evs_data_mbo
* 
* @author Kunanya Singmee
* @Create Date 2564-04-19
*/ 
 
class Da_evs_data_g_and_o_approve extends evs_model {		
	
	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-27
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_g_and_o_approve (dga_approve1	,dga_approve2,dga_dtm_emp_id,dga_emp_id)
	 	VALUES(?,?,?,?)";
		 
	 	$this->db->query($sql, array($this->dga_approve1, $this->dga_approve2, $this->dga_dtm_emp_id, $this->dga_emp_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-27
	*/

	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_g_and_o_approve 
	 			SET dga_approve1=?, dga_approve2=?, dga_dtm_emp_id=?
	 			WHERE dga_emp_id=?";
		
		$this->db->query($sql, array($this->dga_approve1, $this->dga_approve2, $this->dga_dtm_emp_id, $this->dga_emp_id));
		 
	 }

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-27
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_g_and_o_approve 
		WHERE  dga_id = ? ";
	 	$this->db->query($sql, array($this->dga_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-27
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_g_and_o_approve
				WHERE dga_id=?";
		$query = $this->db->query($sql, array($this->dga_id));
		return $query;
	}

}		 
?>
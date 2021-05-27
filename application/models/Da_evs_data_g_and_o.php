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
 
class Da_evs_data_g_and_o extends evs_model {		
	
	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-19
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_g_and_o (dgo_type, dgo_sdgs, dgo_item, dgo_weight,dgo_self_review, dgo_emp_id, dgo_evs_emp_id)
	 	VALUES(?,?,?,?,?,?,?)";
		 
	 	$this->db->query($sql, array( $this->dgo_type, $this->dgo_sdgs, $this->dgo_item, $this->dgo_weight, $this->dgo_self_review, $this->dgo_emp_id, $this->dgo_evs_emp_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-19
	*/

	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_g_and_o 
	 			SET dgo_type=?, dgo_sdgs=?, dgo_item=?, dgo_weight=?, dgo_self_review=?, dgo_emp_id=? , dgo_evs_emp_id=?
	 			WHERE dgo_id=?";
		
		$this->db->query($sql, array($this->dgo_type, $this->dgo_sdgs, $this->dgo_item, $this->dgo_weight,$this->dgo_self_review, $this->dgo_emp_id, $this->dgo_evs_emp_id, $this->dgo_id));
		 
	 }

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-19
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_g_and_o 
		WHERE  dgo_id = ? ";
	 	$this->db->query($sql, array($this->dgo_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-19
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_g_and_o
				WHERE dgo_id=?";
		$query = $this->db->query($sql, array($this->dgo_id));
		return $query;
	}

}		 
?>
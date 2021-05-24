<?php
/*
* Da_evs_data_mbo
* 
* @author Kunanya Singmee
* @Create Date 2564-04-20
*/ 


include_once("evs_model.php");

/*
* Da_evs_data_g_and_o_level
* 
* @author Kunanya Singmee
* @Create Date 2564-04-20
*/ 
 
class Da_evs_data_g_and_o_level extends evs_model {		
	
	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-20
	*/
	 
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_g_and_o_level (dgol_level, dgol_dgo_id)
	 	VALUES(?,?)";
	 	$this->db->query($sql, array( $this->dgol_level, $this->dgol_dgo_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-20
	*/

	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_g_and_o_level 
	 			SET dgol_level=?
	 			WHERE dgol_id=?";
		
		$this->db->query($sql, array($this->dgol_level,$this->dgol_id));
		 
	 }

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-20
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_g_and_o_level 
		WHERE  dgol_id = ? ";
	 	$this->db->query($sql, array($this->dgo_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-20
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_g_and_o_level
				WHERE dgol_id=?";
		$query = $this->db->query($sql, array($this->dgo_id));
		return $query;
	}

}		 
?>
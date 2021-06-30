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
 
class Da_evs_data_mbo_approve extends evs_model {		
	
	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-26
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_mbo_approve (dma_approve1	,dma_approve2,dma_dtm_emp_id,dma_emp_id)
	 	VALUES(?,?,?,?)";
		 
	 	$this->db->query($sql, array($this->dma_approve1, $this->dma_approve2, $this->dma_dtm_emp_id, $this->dma_emp_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-26
	*/

	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_mbo_approve 
	 			SET dma_approve1=?, dma_approve2=?, dma_dtm_emp_id=?
	 			WHERE dma_emp_id=?";
		
		$this->db->query($sql, array($this->dma_approve1, $this->dma_approve2, $this->dma_dtm_emp_id, $this->dma_emp_id));
		 
	 }

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-26
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_mbo_approve 
		WHERE  dma_id = ? ";
	 	$this->db->query($sql, array($this->dtm_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mbo_approve
				WHERE dma_id=?";
		$query = $this->db->query($sql, array($this->dma_id));
		return $query;
	}

}		 
?>
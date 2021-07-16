<?php
/*
* Da_evs_reject_form
* 
* @author Jakkarin Pimpaeng
* @Create Date 2564-04-19
*/ 


include_once("evs_model.php");

/*
* Da_evs_reject_form
* 
* @author Jakkarin Pimpaeng
* @Create Date 2564-04-19
*/ 
 
class Da_evs_reject_form extends evs_model {		
	
	public $rjf_id ; //
	public $rjf_comment ; //
	public $rjf_status ; //
	public $rjf_dma_id ; //
	

	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-19
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_reject_form (rjf_comment, rjf_status,rjf_dma_id)
	 	VALUES(?,?,?)";
		 
	 	$this->db->query($sql, array($this->rjf_comment, $this->rjf_status, $this->rjf_dma_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-19
	*/

	function update() {
	
	 	$sql = "UPDATE evs_database.evs_reject_form 
	 			SET  rjf_comment=?, rjf_status=?, rjf_dma_id=? 
	 			WHERE rjf_id=?";
		
		$this->db->query($sql, array( $this->rjf_comment, $this->rjf_status, $this->rjf_dma_id, $this->rjf_id));
		 
	 }

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-19
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_reject_form 
		WHERE  rjf_id = ? ";
	 	$this->db->query($sql, array($this->rjf_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-19
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_reject_form
				WHERE rjf_dma_id=? ";
		$query = $this->db->query($sql, array($this->rjf_dma_id));
		return $query;
	}

}		 
?>
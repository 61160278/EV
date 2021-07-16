<?php
/*
* M_evs_reject_form
* M_evs_reject_form
* @author 	Jakkarin Pimpaeng
* @Create Date 2564-04-08
*/ 
?>
<?php
include_once("Da_evs_reject_form.php");

class M_evs_reject_form extends Da_evs_reject_form {
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2564-04-08
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_reject_form" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all 
	
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2564-04-08
	*/
	function get_all_by_dma_id_and_rjf_status(){	
		$sql = "SELECT * 
				FROM evs_database.evs_reject_form
				WHERE rjf_status = ? AND rjf_dma_id = ?" ;
		$query = $this->db->query($sql,array($this->rjf_status, $this->rjf_dma_id));
		return $query;
	}//get_all 

/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-19
	*/

	function delete_by_dma_id() {
	 	
		$sql = "DELETE FROM evs_database.evs_reject_form 
	   			WHERE rjf_status = ? AND rjf_dma_id = ?" ;
		$query = $this->db->query($sql,array($this->rjf_status, $this->rjf_dma_id));
	}


} 
?>


<?php
include_once("Da_evs_data_mbo_approve.php");

class M_evs_data_mbo_approve extends Da_evs_data_mbo_approve {
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-26
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mbo_approve" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6

	function get_by_id(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mbo_approve
				WHERE dma_emp_id = ?" ;
				
		$query = $this->db->query($sql, array($this->dma_emp_id));
		return $query;
	}//get_all WHERE NOT pos_psl_id=6

} 
?>

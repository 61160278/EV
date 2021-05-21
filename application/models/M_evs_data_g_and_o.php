<?php
/*
* M_evs_group
* M_evs_group
* @author 	Tippawan Aiemsaad
* @Create Date 2564-04-08
*/ 
?>
<?php
include_once("Da_evs_data_g_and_o.php");

class M_evs_data_g_and_o extends Da_evs_data_g_and_o {
	/*
	* get_all
	* Get All g&O from database
	* @input  -
	* @output g&O all
	* @author 	Kunanya Singmee
	* @Create Date 2564-05-19
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_g_and_o" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all 

	function get_to_insert(){
		$sql = "SELECT * 
		FROM evs_database.evs_data_g_and_o
		WHERE dgo_evs_emp_id=?" ;
		$query = $this->db->query($sql,array($this->dgo_evs_emp_id) );
		return $query;
	}
	// get_to_insert

	function get_by_empID(){
		$sql = "SELECT *
		FROM evs_database.evs_data_g_and_o
		INNER JOIN evs_database.evs_data_g_and_o_level
		ON dgol_dgo_id = dgo_id 
		INNER JOIN evs_database.evs_sdgs
		ON sdg_id = dgo_sdgs
		WHERE dgo_emp_id = ? AND dgo_evs_emp_id = ?" ;
		$query = $this->db->query($sql,array($this->dgo_emp_id, $this->dgo_evs_emp_id) );
		return $query;
	}
	// get_to_insert

	

} 
?>
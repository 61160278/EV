<?php
/*
* M_evs_group
* M_evs_group
* @author 	Tippawan Aiemsaad
* @Create Date 2564-04-08
*/ 
?>
<?php
include_once("Da_evs_data_mbo.php");

class M_evs_data_mbo extends Da_evs_data_mbo {
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Tippawan Aiemsaad
	* @Create Date 2564-04-08
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mbo" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6
	
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Tippawan Aiemsaad
	* @Create Date 2564-04-08
	*/
	function get_by_empID(){	
		$sql = "SELECT *
				FROM evs_database.evs_data_mbo as mbo
				INNER JOIN evs_database.evs_sdgs as sdg
				ON sdg.sdg_id = mbo.dtm_sdg
				WHERE dtm_emp_id = ? AND dtm_evs_emp_id = ?";
		$query = $this->db->query($sql, array($this->dtm_emp_id, $this->dtm_evs_emp_id));
		return $query;
	
	}//get_all_com
} 
?>

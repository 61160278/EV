<?php
/*
* M_evs_sdgs
* M_evs_sdgs
* @author 	Kunanya Singmee
* @Create Date 2564-05-14
*/ 
?>
<?php
include_once("Da_evs_sdgs.php");

class M_evs_sdgs extends Da_evs_sdgs {

	/*
	* get_all
	* Get All SDGS
	* @input  -
	* @output SSDGS
	* @author 	Kunanya Singmee
	* @Create Date 2564-05-14
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_sdgs" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6
	



} 
?>

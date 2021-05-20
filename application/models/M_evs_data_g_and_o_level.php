<?php
/*
* M_evs_group
* M_evs_group
* @author 	Tippawan Aiemsaad
* @Create Date 2564-04-08
*/ 
?>
<?php
include_once("Da_evs_data_g_and_o_level.php");

class M_evs_data_g_and_o_level extends Da_evs_data_g_and_o_level {
	/*
	* get_all
	* Get All g&O level from database
	* @input  -
	* @output g&O level all
	* @author 	Kunanya Singmee
	* @Create Date 2564-05-20
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_g_and_o_level" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all 
} 
?>
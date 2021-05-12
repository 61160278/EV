<?php
/*
* M_evs_quota_actual
* set quota management 
* @author 	Piyasak Srijan
* @Create Date 2564-05-12
*/ 

?>
<?php
include_once("Da_evs_quota_actual.php");

/*
* M_evs_quota_actual
* set quota management 
* @author 	Piyasak Srijan
* @Create Date 2564-05-12
*/ 
class M_evs_quota_actual extends Da_evs_quota_actual {


	/*
	* get_all
	* Get All quota actual from database
	* @input  -
	* @output quota all
	* @author Piyasak Srijan
	* @Create Date 2564-05-12
	*/
	function get_all(){	
		$sql = "SELECT * 
        FROM evs_database.evs_quota_actual";
		$query = $this->db->query($sql);
		return $query;
	}//get_all 

} //end class
?>
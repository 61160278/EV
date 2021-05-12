<?php
/*
* M_evs_quota_plan
* set quota management 
* @author 	Piyasak Srijan
* @Create Date 2564-05-12
*/ 

?>
<?php
include_once("Da_evs_quota_plan.php");

/*
* M_evs_quota_plan
* set quota management 
* @author 	Piyasak Srijan
* @Create Date 2564-05-12
*/ 
class M_evs_quota_plan extends Da_evs_quota_plan {


	/*
	* get_all
	* Get All quota plan from database
	* @input  -
	* @output quota all
	* @author Piyasak Srijan
	* @Create Date 2564-05-12
	*/
	function get_all(){	
		$sql = "SELECT * 
        FROM evs_database.evs_quota_plan";
		$query = $this->db->query($sql);
		return $query;
	}//get_all 

} //end class
?>
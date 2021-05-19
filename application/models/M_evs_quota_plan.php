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
	function get_quota_plan_id(){	
		$sql = "SELECT *
		FROM evs_database.evs_quota_plan
		LEFT JOIN evs_database.evs_quota
		ON evs_quota_plan.qup_qut_id = evs_quota.qut_id
		WHERE evs_quota_plan.qup_qut_id = ? AND evs_quota_plan.qup_Position_ID = ?";
		$query = $this->db->query($sql, array($this->qup_qut_id,$this->qup_Position_ID));
		return $query;
	}//get_quota_plan_id 

	function get_id_quota_position_plan(){	
		$sql = "SELECT *
		FROM evs_database.evs_quota_plan
		WHERE evs_quota_plan.qup_qut_id = ? AND evs_quota_plan.qup_Position_ID = ?";
		$query = $this->db->query($sql,array($this->qup_qut_id,$this->qup_Position_ID));
		return $query;
	}//get_id_quota_position_plan 

} //end class
?>
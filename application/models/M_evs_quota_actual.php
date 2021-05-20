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

	function get_id_quota_position_actual(){	
		$sql = "SELECT * FROM evs_database.evs_quota_actual WHERE evs_quota_actual.qua_qut_id = ? AND evs_quota_actual.qua_Position_ID = ?";
		$query = $this->db->query($sql,array($this->qua_qut_id,$this->qua_Position_ID));
		return $query;
	}//get_id_quota_position_plan 

	function get_quota_actual_id(){	
		$sql = "SELECT * FROM evs_database.evs_quota_actual as evq WHERE evq.qua_id = ?";
		$query = $this->db->query($sql, array($this->qua_id));
		return $query;
	
	}//get_by_id
	
} //end class
?>
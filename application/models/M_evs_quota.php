<?php
/*
* M_evs_quota
* set quota management 
* @author 	Piyasak Srijan
* @Create Date 2564-05-10
*/ 
/*
* M_evs_quota
* set quota management 
* @author 	Piyasak Srijan
* @Update Date 2564-05-10
*/ 
?>
<?php
include_once("Da_evs_quota.php");

/*
* M_evs_quota
* set quota management 
* @author 	Piyasak Srijan
* @Create Date 2564-05-10
*/ 
class M_evs_quota extends Da_evs_quota {


	/*
	* get_all
	* Get All quota from database
	* @input  -
	* @output quota all
	* @author Lapatrada puttamongkol
	* @Create Date 2564-05-11
	*/
	function get_all(){	
		$sql = "SELECT * 
        FROM evs_database.evs_quota";
		$query = $this->db->query($sql);
		return $query;
	}//get_all 
	function get_quota_id(){	
		$sql = "SELECT *
				FROM evs_database.evs_quota as evq
				WHERE evq.qut_id = ? ";
		$query = $this->db->query($sql, array($this->qut_id));
		return $query;
	
	}//get_by_id

	function get_quota_plan(){	
		$sql = "SELECT * FROM evs_database.evs_quota
		WHERE qut_type = ? AND qut_pos = ?";
		$query = $this->db->query($sql,array($this->qut_type,$this->qut_pos));
		return $query;
	}//get_quota_plan

	function get_qut_pos_id(){	
		$sql = "SELECT * FROM evs_database.evs_quota
		WHERE qut_type = ? AND qut_pos = ?";
		$query = $this->db->query($sql, array($this->qut_type,$this->qut_pos));
		return $query;
	}//get_quota_plan_id 

} //end class
?>
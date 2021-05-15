<?php
/*
* M_evs_expected_behavior_gcm
* set expected behavior management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_expected_behavior_gcm
* set expected behavior management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
?>
<?php
include_once("Da_evs_expected_behavior_gcm.php");

/*
* M_evs_expected_behavior_gcm
* set expected behavior management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_expected_behavior_gcm
* set expected behavior management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_expected_behavior_gcm extends Da_evs_expected_behavior_gcm {

	/*
	* get_all
	* Get all indicator by gcm from database
	* @input  -
	* @output expected behavior data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-29
	*/

	function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_expected_behavior_gcm";
		$query = $this->db->query($sql);
		return $query;
	}//get_all

	/*
	* get_all_by_pos
	* Get all indicator by gcm from database
	* @input  -
	* @output expected behavior data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-03-10
	*/

	function get_all_by_pos() {	
		$sql = "SELECT * 
				FROM evs_database.evs_expected_behavior_gcm
				left join evs_database.evs_key_component_gcm
				on kcg_id = epg_kcg_id
				";
		$query = $this->db->query($sql );
		return $query;
	}//get_all_by_pos

	/*
	* get_insert
	* get data for insert in to database
	* @input kcg_id
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
	function get_insert() {	
		$sql = "SELECT * 
				FROM evs_database.evs_expected_behavior_gcm
				INNER join dbmc.position
				on epg_pos_id = pos_id
				WHERE epg_kcg_id=?";
		$query = $this->db->query($sql, array($this->epg_kcg_id));
		return $query;
	}//get_insert

	/*
	* get_expecandpos
	* get data to database
	* @input -
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
	function get_expecandpos() {	
		$sql = "SELECT * 
				FROM evs_database.evs_expected_behavior_gcm
				INNER join dbmc.position
				on epg_pos_id = pos_id";
		$query = $this->db->query($sql);
		return $query;
	}//get_expecandpos

	/*
	* get_all_key_component_by_id
	* get data by id to database 
	* @input position id and component id
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/	
	function get_all_key_component_by_id(){	
		$sql = "SELECT * 
				from evs_database.evs_expected_behavior_gcm as epg
                inner join evs_database.evs_key_component_gcm as kcg 
                on epg.epg_kcg_id = kcg.kcg_id
                inner join evs_database.evs_competency_gcm as cpg
				on kcg.kcg_cpg_id = cpg.cpg_id
				where epg.epg_pos_id = ? AND kcg.kcg_cpg_id = ?
				group by kcg_key_component_detail_en
				order by kcg_key_component_detail_en ASC";
		$query = $this->db->query($sql ,array($this->epg_pos_id,$this->kcg_cpg_id));
		return $query;
	}//get_all_key_component_by_id

	/*
	* get_all_expected_by_id
	* get data by id to database 
	* @input position id and component id
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/	
	function get_all_expected_by_id(){	
		$sql = "SELECT * 
				from evs_database.evs_expected_behavior_gcm as epg
                inner join evs_database.evs_key_component_gcm as kcg 
                on epg.epg_kcg_id = kcg.kcg_id
                inner join evs_database.evs_competency_gcm as cpg
				on kcg.kcg_cpg_id = cpg.cpg_id
				where epg.epg_pos_id = ? AND epg.epg_kcg_id = ?
				group by epg_expected_detail_en
				order by epg_expected_detail_en ASC";
		$query = $this->db->query($sql ,array($this->epg_pos_id,$this->epg_kcg_id));
		return $query;
	}//get_all_expected_by_id

	/*
	* get_all_indicator_by_gcm
	* get data to database
	* @input -
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/	
	function get_all_indicator_by_gcm(){	
		$sql = "SELECT * 
				from evs_database.evs_expected_behavior_gcm as epg
                inner join evs_database.evs_key_component_gcm as kcg 
                on epg.epg_kcg_id = kcg.kcg_id
                inner join evs_database.evs_competency_gcm as cpg
                on kcg.kcg_cpg_id = cpg.cpg_id";
		$query = $this->db->query($sql);
		return $query;
	}//get_all_indicator_by_gcm

	/*
	* get_all_indicator_by_gcm_weight
	* get data to database
	* @input position id 
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/	
	function get_all_indicator_by_gcm_weight(){	
		$sql = "SELECT * 
				from evs_database.evs_expected_behavior_gcm as epg
                inner join evs_database.evs_key_component_gcm as kcg 
                on epg.epg_kcg_id = kcg.kcg_id
                inner join evs_database.evs_competency_gcm as cpg
				on kcg.kcg_cpg_id = cpg.cpg_id
				inner join evs_database.evs_competency_gcm_weight as cpw
				on cpw.cpw_cpg_id = cpg.cpg_id
				where cpw.cpw_pos_id = ?
				order by cpw.cpw_pos_id ASC";
		$query = $this->db->query($sql ,array($this->cpw_pos_id));
		return $query;
	}//get_all_indicator_by_gcm_weight

	/*
	* get_form_by_position_weight
	* get data to database
	* @input -
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/	
	function get_form_by_position_weight($pos_ID){	
		$sql = "SELECT * 
				from evs_database.evs_expected_behavior_gcm as epg
                inner join evs_database.evs_key_component_gcm as kcg 
                on epg.epg_kcg_id = kcg.kcg_id
                inner join evs_database.evs_competency_gcm as cpg
				on kcg.kcg_cpg_id = cpg.cpg_id
				inner join evs_database.evs_competency_gcm_weight as cpw
				on cpw.cpw_cpg_id = cpg.cpg_id
				where = $pos_ID";
		$query = $this->db->query($sql);
		return $query;
	}//get_form_by_position_weight

	/*
	* get_all_competency_by_id
	* get data to database 
	* @input position id 
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_competency_by_id() {	
        $sql = "SELECT * 
				FROM evs_database.evs_competency_gcm
				LEFT JOIN evs_database.evs_key_component_gcm
				ON cpg_id = kcg_cpg_id
				LEFT JOIN evs_database.evs_expected_behavior_gcm
				ON epg_kcg_id = kcg_id
				WHERE epg_pos_id = ?
				group by cpg_competency_detail_en
				order by cpg_competency_detail_en ASC";	
		$query = $this->db->query($sql, array($this->epg_pos_id));
    	return $query;
	}//get_all_competency_by_id
	
	/*
	* get_all_indicator_by_gcm_group_by
	* get data to database
	* @input position id and component id
	* @output expected behavior data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2564-02-04
	*/	
	function get_all_indicator_by_gcm_group_by(){	
		$sql = "SELECT * 
				from evs_database.evs_expected_behavior_gcm as epg
                inner join evs_database.evs_key_component_gcm as kcg 
                on epg.epg_kcg_id = kcg.kcg_id
                inner join evs_database.evs_competency_gcm as cpg
				on kcg.kcg_cpg_id = cpg.cpg_id
				WHERE epg_pos_id=? AND kcg_cpg_id=?
				group by epg_expected_detail_en
				order by kcg_key_component_detail_en ASC";
		$query = $this->db->query($sql ,array($this->epg_pos_id,$this->kcg_cpg_id));
		return $query;
	}//get_all_indicator_by_gcm_group_by

    
	

} 
?>
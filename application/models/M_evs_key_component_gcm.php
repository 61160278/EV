<?php
/*
* M_evs_key_component_gcm
* set key component management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_key_component_gcm
* set key component management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
include_once("Da_evs_key_component_gcm.php");
/*
* M_evs_key_component_gcm
* set key component management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_key_component_gcm
* set key component management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_key_component_gcm extends Da_evs_key_component_gcm {

	/*
	* get_all
	* Get Year from database
	* @input 
	* @output key component data
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component_gcm";
		$query = $this->db->query($sql);
		return $query;
	}//get_all

	/*
	* get_insert
	* Get Year from database
	* @input  kcg_id
	* @output  key component data
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_insert() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component_gcm
				WHERE kcg_id=?" ;
		$query = $this->db->query($sql, array($this->kcg_id));
		return $query;
		
	}//get_insert

	/*
	* get_all_by_pos
	* get data to database
	* @input -
	* @output key component data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/	
	function get_all_by_pos(){	
		$sql = "SELECT * 
				from evs_database.evs_key_component_gcm as kcg
                inner join evs_database.evs_competency_gcm as cpg
                on kcg.kcg_cpg_id = cpg.cpg_id";
		$query = $this->db->query($sql);
		return $query;
	}//get_all_by_pos

	/*
	* get_key_by_component_id
	* Get data from database by kcg_cpg_id
	* @input  kcg_cpg_id
	* @output data key component by component id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_key_by_component_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component_gcm
				WHERE kcg_cpg_id=?" ;
		$query = $this->db->query($sql, array($this->kcg_cpg_id));
		return $query;
		
	}//get_key_by_component_id

	/*
	* get_key_and_expected_behavior
	* Get Year from database
	* @input  kcg_id
	* @output data key component by key component id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-02-02
	*/
	function get_key_and_expected_behavior_by_kcg_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component_gcm
				LEFT JOIN evs_database.evs_expected_behavior_gcm
				ON epg_kcg_id = kcg_id
				LEFT JOIN dbmc.position
				ON epg_pos_id = Position_ID
				WHERE kcg_id=?
				ORDER BY epg_expected_detail_en ASC";
		$query = $this->db->query($sql, array($this->kcg_id));
		return $query;	
	}//get_key_and_expected_behavior

} 
?>
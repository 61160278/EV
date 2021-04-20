<?php
/*
* M_evs_key_component
* set key component management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_key_component
* set key component management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
include_once("Da_evs_key_component.php");
/*
* M_evs_key_component
* set key component management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_key_component
* set key component management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_key_component extends Da_evs_key_component {

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
				FROM evs_database.evs_key_component";
		$query = $this->db->query($sql);
		return $query;
	}//get_all

	/*
	* get_insert
	* Get Year from database
	* @input  kcp_id
	* @output  key component data
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_insert() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component
				WHERE kcp_id=?" ;
		$query = $this->db->query($sql, array($this->kcp_id));
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
				from evs_database.evs_key_component as kcp
                inner join evs_database.evs_competency as cpn
                on kcp.kcp_cpn_id = cpn.cpn_id";
		$query = $this->db->query($sql);
		return $query;
	}//get_all_by_pos

	/*
	* get_key_by_component_id
	* Get data from database by kcp_cpn_id
	* @input  kcp_cpn_id
	* @output data key component by component id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_key_by_component_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component
				WHERE kcp_cpn_id=?" ;
		$query = $this->db->query($sql, array($this->kcp_cpn_id));
		return $query;
		
	}//get_key_by_component_id

	/*
	* get_key_and_expected_behavior
	* Get Year from database
	* @input  kcp_id
	* @output data key component by key component id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-02-02
	*/
	function get_key_and_expected_behavior_by_kcp_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_key_component
				LEFT JOIN evs_database.evs_expected_behavior
				ON ept_kcp_id = kcp_id
				LEFT JOIN dbmc.position
				ON ept_pos_id = Position_ID
				WHERE kcp_id=?
				ORDER BY ept_expected_detail_en ASC";
		$query = $this->db->query($sql, array($this->kcp_id));
		return $query;	
	}//get_key_and_expected_behavior

} 
?>
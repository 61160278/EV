<?php
/*
* M_evs_competency
* set competency management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_competency
* set competency management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
include_once("Da_evs_competency.php");

/*
* M_evs_competency
* set competency management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_competency
* set competency management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_competency extends Da_evs_competency {

    /*
	* get_competency_table
	* get data to database update
	* @input competency id
	* @output data competency
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
	/*
	* get_competency_table
	* get data to database update
	* @input competency id
	* @output data competency
	* @author 	Kunanya Singmee
	* @Update Date 2563-11-03
	*/
    function get_competency_table() {	
        $sql = "SELECT *
                FROM evs_database.evs_key_component
				LEFT JOIN evs_database.evs_competency
				ON cpn_id = kcp_cpn_id
                LEFT JOIN evs_database.evs_expected_behavior
				ON ept_kcp_id = kcp_id
				LEFT JOIN dbmc.position
				ON Position_ID = ept_pos_id
				WHERE kcp_cpn_id = ?
				order by kcp_id,cpn_competency_detail_en,ept_expected_detail_en ASC";
				
		$query = $this->db->query($sql, array($this->kcp_cpn_id));
        return $query;
	}
	// get_competency_table
		

	/*
	* get_competency_table_by_poslv
	* get data to database update
	* @input competency id and position level
	* @output data competency
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-07
	*/
    function get_competency_table_by_poslv() {	
        $sql = "SELECT *
                FROM evs_database.evs_key_component
                LEFT JOIN evs_database.evs_expected_behavior
				ON ept_kcp_id = kcp_id
				LEFT JOIN dbmc.position
				ON Position_ID = ept_pos_id
				WHERE kcp_cpn_id=? AND position_level_id=?
				order by kcp_id,ept_expected_detail_en ASC";
				
		$query = $this->db->query($sql, array($this->kcp_cpn_id,$this->pos_psl_id));
        return $query;
        }//get_competency_table_by_poslv
        
    /*
	* get_all
	* get data to database update
	* @input -
	* @output data competency
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
    function get_all() {	
		$sql = "SELECT * 
			FROM evs_database.evs_competency";
		$query = $this->db->query($sql);
		return $query;
    }//get_all

	/*
	* get_competency_join
	* get data to database update
	* @input -
	* @output data competency
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
    function get_competency_join() {	
        $sql = "SELECT * 
                FROM evs_database.evs_competency
                LEFT JOIN evs_database.evs_key_component
                ON cpn_id = kcp_cpn_id
                LEFT JOIN evs_database.evs_expected_behavior
				ON ept_kcp_id = kcp_id
				order by cpn_id";
        $query = $this->db->query($sql);
        return $query;
    }//get_competency_join

	/*
	* get_competency_join_by_id
	* get data to database update
	* @input position id
	* @output data competency
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
    function get_competency_join_by_id() {	
        $sql = "SELECT * 
                FROM evs_database.evs_competency
                LEFT JOIN evs_database.evs_key_component
                ON cpn_id = kcp_cpn_id
                LEFT JOIN evs_database.evs_expected_behavior
				ON ept_kcp_id = kcp_id
				where ept_pos_id = ?
				order by cpn_competency_detail_en ASC";
        $query = $this->db->query($sql, array($this->ept_pos_id));
        return $query;
    }//get_competency_join_by_id

	
}
?>
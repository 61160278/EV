<?php
/*
* M_evs_set_form_ability
* set form ability management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_set_form_ability
* set form ability management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
?>
<?php
include_once("Da_evs_set_form_ability.php");

/*
* M_evs_set_form_ability
* set form ability management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_set_form_ability
* set form ability management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_set_form_ability extends Da_evs_set_form_ability {
/*
	* get_all
	* get all data ability form  database 
	* @input position id and patten and year id
	* @output ability form data 
	* @author 	jakkarin pimpaeng
	* @Create Date 2563-26-01
	*/
    function get_all() {	
		$sql = "SELECT * 
			FROM evs_database.evs_set_form_ability";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all


	/*
	* get_all_by_id_by_year
	* get all by id and year ability form  database 
	* @input position id and patten and year id
	* @output ability form data by id and year
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-01-04
	*/
    function get_all_by_id_by_year() {	
		$sql = "SELECT * 
			FROM evs_database.evs_set_form_ability
			where sfa_pos_id = ? AND sfa_pay_id = ?";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_by_id_by_year

	/*
	* get_all_by_indicator
	* get all competency by ability form  database 
	* @input position id and patten and year id
	* @output competency by ability form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_by_indicator() {	
		$sql = "SELECT * 
            FROM evs_set_form_ability
            left join evs_database.evs_competency
			on sfa_cpn_id = cpn_id
			left join evs_database.evs_key_component
			on sfa_kcp_id = kcp_id
			left join evs_database.evs_expected_behavior
			on kcp_id = ept_kcp_id
			where sfa_pos_id = ? AND sfa_pay_id = ?
			order by cpn_competency_detail_en ASC";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_by_indicator

 	/*
	* get_all_competency_by_indicator
	* get all competency by ability form  database 
	* @input position id and patten and year id
	* @output competency by ability form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_competency_by_indicator() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_ability
            left join evs_database.evs_competency
			on sfa_cpn_id = cpn_id
			where sfa_pos_id = ? AND sfa_pay_id = ?
			order by cpn_competency_detail_en ASC";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_competency_by_indicator

	/*
	* get_all_key_component_by_indicator
	* get all key component by ability form  database 
	* @input position id and patten and year id
	* @output key component by ability form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_key_component_by_indicator() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_ability
			left join evs_database.evs_key_component
			on sfa_cpn_id = kcp_cpn_id
			where sfa_pos_id = ? AND sfa_pay_id = ?
			group by kcp_key_component_detail_en
			order by sfa_cpn_id ASC, kcp_key_component_detail_en ASC";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_key_component_by_indicator

	/*
	* get_all_expected_by_indicator
	* get all expected by ability form to database 
	* @input position id and patten and year id
	* @output expected by ability form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_expected_by_indicator() {	
		$sql = "SELECT * 
			FROM evs_database.evs_set_form_ability
			left join evs_database.evs_key_component
			on sfa_cpn_id = kcp_cpn_id
			left join evs_database.evs_expected_behavior
			on kcp_id = ept_kcp_id
			where ept_pos_id = ? AND sfa_pay_id=?
			group by ept_expected_detail_en
			order by sfa_cpn_id ASC ";
		$query = $this->db->query($sql ,array($this->ept_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_expected_by_indicator
	

	/*
	* get_all_by_key_by_year
	* get data to database by id by year
	* @input position id and patten and year id
	* @output ability form data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-26
	*/
    function get_all_by_key_by_year() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_ability
            WHERE sfa_pos_id = ? AND sfa_pay_id = ?";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_by_key_by_year



	/*
	* delete
	* Delete Competency Weight from database
	* @input sfa_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function delete_competency() {
	 	$sql = "DELETE FROM evs_database.evs_set_form_ability
	 			WHERE sfa_pos_id=? AND sfa_pay_id=? ";
	 	$this->db->query($sql, array($this->sfa_pos_id,$this->sfa_pay_id));
		
	 } 
	//  delete_competency


	 function get_all_by_pos() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_ability as sfa
            left join evs_database.evs_competency as com
			on com.cpn_id = sfa.sfa_cpn_id
			left join evs_database.evs_key_component as keycom
			on keycom.kcp_cpn_id = com.cpn_id
			left join evs_database.evs_expected_behavior as ex
			on ex.ept_kcp_id = keycom.kcp_id
			where sfa_pos_id = ? AND sfa_pay_id = ?
			order by cpn_competency_detail_en ASC";
		$query = $this->db->query($sql,array($this->sfa_pos_id,$this->sfa_pay_id));
		return $query;
	}
	//get_all_by_indicator


} 

?>
<?php
/*
* M_evs_set_form_gcm
* set form gcm management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_set_form_gcm
* set form gcm management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
?>
<?php
include_once("Da_evs_set_form_gcm.php");

/*
* M_evs_set_form_gcm
* set form gcm management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_set_form_gcm
* set form gcm management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_set_form_gcm extends Da_evs_set_form_gcm {
/*
	* get_all
	* get all data gcm form  database 
	* @input position id and patten and year id
	* @output gcm form data 
	* @author 	jakkarin pimpaeng
	* @Create Date 2563-26-01
	*/
    function get_all() {	
		$sql = "SELECT * 
			FROM evs_database.evs_set_form_gcm";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all


	/*
	* get_all_by_id_by_year
	* get all by id and year gcm form  database 
	* @input position id and patten and year id
	* @output gcm form data by id and year
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-01-04
	*/
    function get_all_by_id_by_year() {	
		$sql = "SELECT * 
			FROM evs_database.evs_set_form_gcm
			where sgc_pos_id = ? AND sgc_pay_id = ?";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_by_id_by_year

	/*
	* get_all_by_indicator
	* get all competency by gcm form  database 
	* @input position id and patten and year id
	* @output competency by gcm form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_by_indicator() {	
		$sql = "SELECT * 
            FROM evs_set_form_gcm
            left join evs_database.evs_competency_gcm
			on sgc_cpg_id = cpg_id
			left join evs_database.evs_key_component_gcm
			on sgc_kcg_id = kcg_id
			left join evs_database.evs_expected_behavior_gcm
			on kcg_id = epg_kcg_id
			where sgc_pos_id = ? AND sgc_pay_id = ?
			order by cpg_competency_detail_en ASC";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_by_indicator

 	/*
	* get_all_competency_by_indicator
	* get all competency by gcm form  database 
	* @input position id and patten and year id
	* @output competency by gcm form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_competency_by_indicator() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_gcm
            left join evs_database.evs_competency_gcm
			on sgc_cpg_id = cpg_id
			where sgc_pos_id = ? AND sgc_pay_id = ?
			order by cpg_competency_detail_en ASC";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_competency_by_indicator

	/*
	* get_all_key_component_by_indicator
	* get all key component by gcm form  database 
	* @input position id and patten and year id
	* @output key component by gcm form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_key_component_by_indicator() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_gcm
			left join evs_database.evs_key_component_gcm
			on sgc_cpg_id = kcg_cpg_id
			where sgc_pos_id = ? AND sgc_pay_id = ?
			group by kcg_key_component_detail_en
			order by sgc_cpg_id ASC, kcg_key_component_detail_en ASC";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_key_component_by_indicator

	/*
	* get_all_expected_by_indicator
	* get all expected by gcm form to database 
	* @input position id and patten and year id
	* @output expected by gcm form
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
    function get_all_expected_by_indicator() {	
		$sql = "SELECT * 
			FROM evs_database.evs_set_form_gcm
			left join evs_database.evs_key_component_gcm
			on sgc_cpg_id = kcg_cpg_id
			left join evs_database.evs_expected_behavior_gcm
			on kcg_id = epg_kcg_id
			where epg_pos_id = ? AND sgc_pay_id=?
			group by epg_expected_detail_en
			order by sgc_cpg_id ASC ";
		$query = $this->db->query($sql ,array($this->epg_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_expected_by_indicator
	

	/*
	* get_all_by_key_by_year
	* get data to database by id by year
	* @input position id and patten and year id
	* @output gcm form data
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-26
	*/
    function get_all_by_key_by_year() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_gcm
            WHERE sgc_pos_id = ? AND sgc_pay_id = ?";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_by_key_by_year



	/*
	* delete
	* Delete Competency Weight from database
	* @input sgc_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function delete_competency() {
	 	$sql = "DELETE FROM evs_database.evs_set_form_gcm
	 			WHERE sgc_pos_id=? AND sgc_pay_id=? ";
	 	$this->db->query($sql, array($this->sgc_pos_id,$this->sgc_pay_id));
		
	 } 
	//  delete_competency


	 function get_all_by_pos() {	
		$sql = "SELECT * 
            FROM evs_database.evs_set_form_gcm as sgc
            left join evs_database.evs_competency_gcm as com
			on com.cpg_id = sgc.sgc_cpg_id
			left join evs_database.evs_key_component_gcm as keycom
			on keycom.kcg_cpg_id = com.cpg_id
			left join evs_database.evs_expected_behavior_gcm as ex
			on ex.epg_kcg_id = keycom.kcg_id
			where sgc_pos_id = ? AND sgc_pay_id = ?
			order by cpg_competency_detail_en ASC";
		$query = $this->db->query($sql,array($this->sgc_pos_id,$this->sgc_pay_id));
		return $query;
	}
	//get_all_by_indicator


} 

?>
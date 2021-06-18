<?php
/*
* M_evs_person
* set person management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_person
* set person management 
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
?>
<?php
include_once("Da_evs_position_from.php");

/*
* M_evs_pattern_and_year
* set person management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_person
* set person management 
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_position_from extends Da_evs_position_from {

	/*
	* get_all_by_pos
	* Get person from database
	* @input  -
	* @output person  data
	* @author Piyasak Srijan
	* @Create Date 2563-09-01
	*/
    function get_all_by_pos(){
		$sql = "SELECT * 
				FROM evs_database.evs_position_from
        left join dbmc.position 
		ON ps_pos_id = Position_ID
		ORDER BY ps_pos_id";
		$query = $this->evs->query($sql);
		return $query;
	}//get_all_by_pos

		/*
	* get_form_by_pos
	* Get person from database
	* @input  -
	* @output person  data
	* @author Kunanya Singmee
	* @Create Date 2564-5-25
	*/
    function get_form_by_pos(){
		$sql = "SELECT * 
				FROM evs_database.evs_position_from AS evs_form
				INNER JOIN evs_database.evs_pattern_and_year AS evs_pay
				ON evs_pay.pay_id = evs_form.ps_pay_id
				WHERE ps_pos_id = ?
				ORDER BY ps_pos_id";
		$query = $this->evs->query($sql, array($this->ps_pos_id));
		return $query;
	}//get_all_by_pos


	 /*
    * get_all
	* Get person from database
 	* @input  -
	* @output person  data
    * @author Tanadon Tangjaimongkhon
    * @Create Date 2563-10-01
    */ 
	function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_position_from";
		$query = $this->db->query($sql);
		return $query;
	}//get_all

	/*
	* get_by_pos
	* Get person from database
	* @input  -
	* @output data from by position id
	* @author Piyasak Srijan
	* @Create Date 2563-09-01
	*/
	/*
	* get_by_pos
	* Get person from database
	* @input  -
	* @output data from by position id 
	* @author jakkarin pimpaeng
	* @Update Date 2563-15-12
	*/
    function get_by_pos(){
		$sql = "SELECT * 
		FROM evs_database.evs_position_from
		left join dbmc.position 
		ON ps_pos_id = Position_ID
		left join dbmc.position_level 
		ON psl_id = position_level_id
		WHERE position_level_id =? and ps_pay_id=?
		ORDER BY Position_ID";
		$query = $this->evs->query($sql, array($this->pos_psl_id,$this->ps_pay_id));
		return $query;
	}//get_by_pos

	/*
	* update_status_ce
	* Update Person into database
	* @input ps_status_set_form_ce,Position_ID
	* @output person data
	* @author Tanadon Tangjaimonghon
	* @Create Date 2563-09-28	
	*/
	function update_status_ce() {
		$sql = "UPDATE evs_database.evs_position_from 
				SET ps_status_set_form_ce = ?
				WHERE ps_pos_id = ?";
	   
		$this->db->query($sql, array($this->ps_status_set_form_ce, $this->ps_pos_id));
	   
	}//update_status_ce

	/*
	* update_status_pe
	* Update Person into database
	* @input ps_status_set_form_pe,ps_pos_id
	* @output person data
	* @author Tanadon Tangjaimonghon
	* @Create Date 2563-09-28	
	*/
	function update_status_pe() {
		$sql = "UPDATE evs_database.evs_position_from 
				SET ps_status_set_form_pe = ?
				WHERE ps_pos_id = ?";
	   
		$this->db->query($sql, array($this->ps_status_set_form_pe, $this->ps_pos_id));
	   
	}//update_status_pe

		/*
	* get_by_level_pos
	* Get person from database
	* @input  pos_psl_id
	* @output person data
	* @author Piyasak Srijan
	* @Create Date 2563-09-01
	*/
    function get_by_level_pos(){
		$sql = "SELECT * 
				FROM evs_database.evs_position_from
        left join dbmc.position 
		ON ps_pos_id = Position_ID
		left join dbmc.position_level
		ON position_level_id = psl_id
		WHERE position_level_id=? AND ps_pay_id = ?
		ORDER BY ps_pos_id";
		$query = $this->evs->query($sql, array($this->pos_psl_id,$this->ps_pay_id));
		return $query;
	}//get_by_level_pos

	/*
	* update_by_pay_id
	* Update Person into database
	* @input ps_pos_id, ps_form_pe, ps_form_ce, ps_ratio_pe, ps_ratio_atd_pe, ps_ratio_ce, ps_ratio_atd_ce, ps_status_form_pe, ps_status_edit, ps_status_form_ce, ps_status_set_form_ce, ps_status_from_update, ps_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-10-26	
	*/
	function update_by_pay_id() {
		$sql = "UPDATE evs_database.evs_position_from 
				SET ps_form_pe = ? 
				, ps_form_ce = ? 
				, ps_ratio_pe = ? 
				, ps_ratio_atd_pe = ? 
				, ps_ratio_ce = ? 
				, ps_ratio_atd_ce = ? 
				, ps_status_form_pe = ?
				, ps_status_form_ce = ?
				, ps_status_set_form_pe = ?
				, ps_status_set_form_ce = ?
				, ps_status_form_update = ?
				WHERE ps_pos_id = ? and ps_pay_id = ?";
	   
		$this->db->query($sql, array($this->ps_form_pe, $this->ps_form_ce, $this->ps_ratio_pe, $this->ps_ratio_atd_pe, 
		$this->ps_ratio_ce, $this->ps_ratio_atd_ce, $this->ps_status_form_pe,
		$this->ps_status_form_ce, $this->ps_status_set_form_pe, $this->ps_status_set_form_ce, $this->ps_status_form_update, $this->ps_pos_id, $this->ps_pay_id));
	   
	}//update_by_pay_id

	/*
    * get_all_by_key_by_year
    * @input  ps_pos_id , ps_pay_id
	* @output form data by year
    * @author 	Tanadon Tangjaimongkhon
    * @Create Date 2563-12-26
    */ 
	function get_all_by_key_by_year() {	
		$sql = "SELECT * 
				FROM evs_database.evs_position_from
				WHERE ps_pos_id = ? AND ps_pay_id = ?";
		$query = $this->db->query($sql,array($this->ps_pos_id, $this->ps_pay_id));
		return $query;
	}//get_all_by_key_by_year


} 
?>
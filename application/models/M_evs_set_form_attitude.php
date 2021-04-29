<?php
/*
* M_evs_set_form_attitude
* set form attitude management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-5
*/ 
/*
* M_evs_set_form_attitude
* set form attitude management 
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-11-20
*/
?>
<?php
include_once("Da_evs_set_form_attitude.php");

/*
* M_evs_set_form_attitude
* set form attitude management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-05
*/ 
/*
* M_evs_set_form_attitude
* set form attitude management 
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-11-20
*/
class M_evs_set_form_attitude extends Da_evs_set_form_attitude {

	/*
	* get_all
	* Get Category  all from database
	* @input -
	* @output Category Weight all
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-15
	*/
	function get_all(){
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_attitude";
        $query = $this->db->query($sql);
		return $query;

	}
	//get_all

	/*
	* get_all_category
	* Get Category  all from database
	* @input -
	* @output Category Weight all
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-15
	*/
	function get_all_category(){
		$sql = "SELECT *
				FROM evs_database.evs_set_form_attitude";
        $query = $this->db->query($sql);
		return $query;

	}
	//get_all_category

	/*
	* get_category_identification_by_position
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_category_identification_by_position(){
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN evs_database.evs_set_form_attitude
				ON sft_ctg_id = idf_ctg_id
				where sft_pos_id = ?";
        $query = $this->db->query($sql, array($this->sft_pos_id));
		return $query;

	}
	//get_category_identification_by_position

	/*
	* get_category_weight_all
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-25
	*/
	function get_category_weight_all(){
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_attitude
				LEFT JOIN evs_database.evs_category
				ON sft_ctg_id = ctg_id
				LEFT JOIN evs_database.evs_identification
				ON ctw_ctg_id = idf_ctg_id
				where sft_pos_id = ?
				group by ctg_category_detail_en
				order by sft_id ASC";
        $query = $this->db->query($sql, array($this->sft_pos_id));
		return $query;

	}
	//get_category_weight_all


	
	/*
	* get_category_identification_by_position_sort
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_category_by_position_sort(){
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN evs_database.evs_set_form_attitude
				ON sft_ctg_id = idf_ctg_id
				where sft_pos_id=? AND sft_pay_id = ?
				group by ctg_category_detail_en
				order by ctg_category_detail_en ASC ";
        $query = $this->db->query($sql, array($this->sft_pos_id, $this->sft_pay_id));
		return $query;

	}
	//get_category_identification_by_position_sort
	
	/*
	* get_by_key_data
	* Get data by position ID from database
	* @input position ID
	* @output status true or false
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-01
	*/
	function get_by_key_data($withSetAttributeValue=FALSE) { 
		$sql = "SELECT * 
		  FROM evs_database.evs_set_form_attitude 
		  WHERE sft_pos_id=?";
		$query = $this->db->query($sql, array($this->sft_pos_id));
		if ( $withSetAttributeValue ) {
		 
		} else {
		 return $query ;
		}
	}//get_by_key_data

	/*
	* get_all_by_key_by_year
	* Get all by id by year
	* @input position id and patten and year id
	* @output form attitude by year by id data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-26
	*/
	function get_all_by_key_by_year(){
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_attitude
				WHERE sft_pos_id = ? AND sft_pay_id = ?";
        $query = $this->db->query($sql, array($this->sft_pos_id, $this->sft_pay_id));
		return $query;

	}
	//get_all_by_key_by_year
	
	/*
	* delete_data
	* Delete Category Weight from database
	* @input sft_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2564-04-29
	*/
	function delete_data() {
	 
		$sql = "DELETE FROM evs_database.evs_set_form_attitude
				WHERE sft_pos_id=? AND sft_pay_id = ?";
		$this->db->query($sql, array($this->sft_pos_id, $this->sft_pay_id));
	   
	}

} 
?>
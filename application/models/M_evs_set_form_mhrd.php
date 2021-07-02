<?php
/*
* M_evs_set_form_mhrd
* set form mhrd management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-5
*/ 
/*
* M_evs_set_form_mhrd
* set form mhrd management 
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-11-20
*/
?>
<?php
include_once("Da_evs_set_form_mhrd.php");

/*
* M_evs_set_form_mhrd
* set form mhrd management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-05
*/ 
/*
* M_evs_set_form_mhrd
* set form mhrd management 
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-11-20
*/
class M_evs_set_form_mhrd extends Da_evs_set_form_mhrd {

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
				FROM evs_database.evs_set_form_mhrd";
        $query = $this->db->query($sql);
		return $query;

	}
	//get_all

	/*
	* get_all_item
	* Get Category  all from database
	* @input -
	* @output Category Weight all
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-15
	*/
	function get_all_item(){
		$sql = "SELECT *
				FROM evs_database.evs_set_form_mhrd";
        $query = $this->db->query($sql);
		return $query;

	}
	//get_all_item

	/*
	* get_item_description_by_position
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_item_description_by_position(){
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN evs_database.evs_set_form_mhrd
				ON sfi_itm_id = dep_itm_id
				where sfi_pos_id = ?";
        $query = $this->db->query($sql, array($this->sfi_pos_id));
		return $query;

	}
	//get_item_description_by_position

	/*
	* get_item_weight_all
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-25
	*/
	function get_item_weight_all(){
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_mhrd
				LEFT JOIN evs_database.evs_item
				ON sfi_itm_id = itm_id
				LEFT JOIN evs_database.evs_description
				ON ctw_itm_id = dep_itm_id
				where sfi_pos_id = ?
				group by itm_item_detail_en
				order by sfi_id ASC";
        $query = $this->db->query($sql, array($this->sfi_pos_id));
		return $query;

	}
	//get_item_weight_all


	
	/*
	* get_item_description_by_position_sort
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_item_by_position_sort(){
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN evs_database.evs_set_form_mhrd
				ON sfi_itm_id = dep_itm_id
				where sfi_pos_id=? AND sfi_pay_id = ?
				group by itm_item_detail_en
				order by itm_item_detail_en ASC ";
        $query = $this->db->query($sql, array($this->sfi_pos_id, $this->sfi_pay_id));
		return $query;

	}
	//get_item_description_by_position_sort
	
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
		  FROM evs_database.evs_set_form_mhrd 
		  WHERE sfi_pos_id=?";
		$query = $this->db->query($sql, array($this->sfi_pos_id));
		if ( $withSetAttributeValue ) {
		 
		} else {
		 return $query ;
		}
	}//get_by_key_data

	/*
	* get_all_by_key_by_year
	* Get all by id by year
	* @input position id and patten and year id
	* @output form mhrd by year by id data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-26
	*/
	function get_all_by_key_by_year(){
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_mhrd
				WHERE sfi_pos_id = ? AND sfi_pay_id = ?";
        $query = $this->db->query($sql, array($this->sfi_pos_id, $this->sfi_pay_id));
		return $query;

	}
	//get_all_by_key_by_year
	
	/*
	* delete_data
	* Delete Category Weight from database
	* @input sfi_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2564-04-29
	*/
	function delete_data() {
	 
		$sql = "DELETE FROM evs_database.evs_set_form_mhrd
				WHERE sfi_pos_id=? AND sfi_pay_id = ?";
		$this->db->query($sql, array($this->sfi_pos_id, $this->sfi_pay_id));
	   
	}

	/*
	* get_all_by_key_by_year
	* Get all by id by year
	* @input position id and patten and year id
	* @output form mhrd by year by id data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-26
	*/
	function get_all_by_key_by_year_and_satatus(){
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_mhrd
				WHERE sfi_pos_id = ? AND sfi_pay_id = ? AND sfi_excel_import = ?";
        $query = $this->db->query($sql, array($this->sfi_pos_id, $this->sfi_pay_id,$this->sfi_excel_import));
		return $query;

	}
	//get_all_by_key_by_year

	

} 
?>
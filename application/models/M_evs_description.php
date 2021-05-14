<?php
/*
* M_evs_description
* set description management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 

?>
<?php
include_once("Da_evs_description.php");

/*
* M_evs_description
* set description management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
class M_evs_description extends Da_evs_description {
    
	/*
	* get_description_all
	* get data to database
	* @input -
	* @output data description
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-10-18
	*/
    function get_description_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_description";
        $query = $this->db->query($sql);
		return $query;
	}
	// get_description_all 

	/*
	* get_item_description_by_position_sort
	* Get Category Weight by position ID from database
	* @input position ID
	* @output Category Weight by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_description_by_position_sort(){
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				where dep_pos_id=?
				group by dep_description_detail_en
				order by dep_description_detail_en ASC ";
        $query = $this->db->query($sql, array($this->dep_pos_id));
		return $query;

	}
	//get_item_description_by_position_sort

	/*
	* get_description_all_by_pos
	* get data to database
	* @input -
	* @output data description
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2564-04-10
	*/
    function get_description_all_by_pos() {	
		$sql = "SELECT * 
				FROM evs_database.evs_description
				where dep_pos_id = ?";
        $query = $this->db->query($sql, array($this->dep_pos_id));
		return $query;
	}
	// get_description_all_by_pos 



	

} 
?>
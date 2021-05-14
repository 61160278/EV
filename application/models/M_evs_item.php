<?php
/*
* M_evs_item
* set item management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_item
* set item management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_item.php");

/*
* M_evs_item
* set item management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_item
* set item management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_item extends Da_evs_item {

	/*
	* get_item_all
	* get data to database
	* @input -
	* @output data item
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_item_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_item_all

	/*
	* get_item_table
	* get data to database
	* @input -
	* @output data item
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
		/*
	* get_item_table
	* get data to database
	* @input item id
	* @output data item
	* @author 	Kunanya Singmee
	* @Update Date 2563-12-20
	*/
	function get_item_table() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN dbmc.position
				ON Position_ID = dep_pos_id
				WHERE itm_id=?";
        $query = $this->db->query($sql, array($this->itm_id));
		return $query;
	}
	//get_item_table

	/*
	* get_item_table_all
	* get data to database
	* @input -
	* @output data item
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-20
	*/
	function get_item_table_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN dbmc.position
				ON Position_ID = dep_pos_id
				ORDER BY dep_itm_id ASC, itm_id ASC";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_item_table_all

	/*
	* get_item_table_pos_itm
	* get data to database
	* @input item id and position level id
	* @output data item
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-20
	*/

	function get_item_table_pos_itm() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN dbmc.position
				ON Position_ID = dep_pos_id
				WHERE itm_id=? AND position_level_id=?
				ORDER BY dep_itm_id ASC, itm_id ASC";
        $query = $this->db->query($sql, array($this->itm_id,$this->pos_psl_id));
		return $query;
	}
	//get_item_table_pos_itm

		/*
	* get_item_table_pos
	* get data to database
	* @input position level id
	* @output data item
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-20
	*/

	function get_item_table_pos() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN dbmc.position
				ON Position_ID = dep_pos_id
				WHERE position_level_id=?
				ORDER BY dep_itm_id ASC, itm_id ASC";
        $query = $this->db->query($sql, array($this->pos_psl_id));
		return $query;
	}
	//get_item_table_pos


	/*
	* get_item_table_id
	* get data to database
	* @input  item id 
	* @output data item
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_item_table_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN dbmc.position
				ON Position_ID = dep_pos_id
				WHERE itm_id = ?
				ORDER BY dep_itm_id ASC, itm_id ASC";
        $query = $this->db->query($sql, array($this->itm_id));
		return $query;
	}
	//get_item_table_id

	/*
	* get_item_table_for_update
	* get data to database update
	* @input item id 
	* @output data item update
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_item_table_for_update() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				LEFT JOIN dbmc.position
				ON Position_ID = dep_pos_id
				WHERE itm_id = ?
				ORDER BY itm_id ASC,itm_item_detail_en ASC";
        $query = $this->db->query($sql, array($this->itm_id));
		return $query;
	}//get_item_table_for_update

	/*
	* get_item_description_by_position
	* get item and description from database
	* @input item id and position  id
	* @output item and description
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_item_description_by_position(){
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				where dep_pos_id = ? AND dep_itm_id = ? AND itm_id = ?
				ORDER BY itm_item_detail_en ASC , dep_description_detail_en ASC";
        $query = $this->db->query($sql, array($this->dep_pos_id,$this->dep_itm_id,$this->itm_id));
		return $query;

	}//get_item_description_by_position

	/*
	* get_item_description
	* get item and description from database
	* @input -
	* @output item and description
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_item_description(){
		$sql = "SELECT * 
				FROM evs_database.evs_item
				LEFT JOIN evs_database.evs_description
				ON dep_itm_id = itm_id
				group by itm_item_detail_en
				ORDER BY itm_item_detail_en ASC";
        $query = $this->db->query($sql);
		return $query;

	}//get_item_description



} 
?>
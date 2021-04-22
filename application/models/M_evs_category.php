<?php
/*
* M_evs_category
* set category management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_category
* set category management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_category.php");

/*
* M_evs_category
* set category management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_category
* set category management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_category extends Da_evs_category {

	/*
	* get_category_all
	* get data to database
	* @input -
	* @output data category
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_category_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_category_all

	/*
	* get_category_table
	* get data to database
	* @input -
	* @output data category
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
		/*
	* get_category_table
	* get data to database
	* @input category id
	* @output data category
	* @author 	Kunanya Singmee
	* @Update Date 2563-12-20
	*/
	function get_category_table() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN dbmc.position
				ON Position_ID = idf_pos_id
				WHERE ctg_id=?";
        $query = $this->db->query($sql, array($this->ctg_id));
		return $query;
	}
	//get_category_table

	/*
	* get_category_table_all
	* get data to database
	* @input -
	* @output data category
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-20
	*/
	function get_category_table_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN dbmc.position
				ON Position_ID = idf_pos_id
				ORDER BY idf_ctg_id ASC, ctg_id ASC";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_category_table_all

	/*
	* get_category_table_pos_ctg
	* get data to database
	* @input category id and position level id
	* @output data category
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-20
	*/

	function get_category_table_pos_ctg() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN dbmc.position
				ON Position_ID = idf_pos_id
				WHERE ctg_id=? AND position_level_id=?
				ORDER BY idf_ctg_id ASC, ctg_id ASC";
        $query = $this->db->query($sql, array($this->ctg_id,$this->pos_psl_id));
		return $query;
	}
	//get_category_table_pos_ctg

		/*
	* get_category_table_pos
	* get data to database
	* @input position level id
	* @output data category
	* @author 	Kunanya Singmee
	* @Create Date 2563-12-20
	*/

	function get_category_table_pos() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN dbmc.position
				ON Position_ID = idf_pos_id
				WHERE position_level_id=?
				ORDER BY idf_ctg_id ASC, ctg_id ASC";
        $query = $this->db->query($sql, array($this->pos_psl_id));
		return $query;
	}
	//get_category_table_pos


	/*
	* get_category_table_id
	* get data to database
	* @input  category id 
	* @output data category
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_category_table_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN dbmc.position
				ON Position_ID = idf_pos_id
				WHERE ctg_id = ?
				ORDER BY idf_ctg_id ASC, ctg_id ASC";
        $query = $this->db->query($sql, array($this->ctg_id));
		return $query;
	}
	//get_category_table_id

	/*
	* get_category_table_for_update
	* get data to database update
	* @input category id 
	* @output data category update
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_category_table_for_update() {	
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				LEFT JOIN dbmc.position
				ON Position_ID = idf_pos_id
				WHERE ctg_id = ?
				ORDER BY ctg_id ASC,ctg_category_detail_en ASC";
        $query = $this->db->query($sql, array($this->ctg_id));
		return $query;
	}//get_category_table_for_update

	/*
	* get_category_identification_by_position
	* get category and identification from database
	* @input category id and position  id
	* @output category and identification
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_category_identification_by_position(){
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				where idf_pos_id = ? AND idf_ctg_id = ? AND ctg_id = ?
				ORDER BY ctg_category_detail_en ASC , idf_identification_detail_en ASC";
        $query = $this->db->query($sql, array($this->idf_pos_id,$this->idf_ctg_id,$this->ctg_id));
		return $query;

	}//get_category_identification_by_position

	/*
	* get_category_identification
	* get category and identification from database
	* @input -
	* @output category and identification
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-11-20
	*/
	function get_category_identification(){
		$sql = "SELECT * 
				FROM evs_database.evs_category
				LEFT JOIN evs_database.evs_identification
				ON idf_ctg_id = ctg_id
				group by ctg_category_detail_en
				ORDER BY ctg_category_detail_en ASC";
        $query = $this->db->query($sql);
		return $query;

	}//get_category_identification



} 
?>
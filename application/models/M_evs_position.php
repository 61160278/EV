<?php
/*
* M_evs_position
* set position management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_position
* set position management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
?>
<?php
include_once("Da_evs_position.php");

/*
* M_evs_position
* set position management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_position
* set position management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_position extends Da_evs_position {


	/*
	* get_all
	* Get All Position Level from database
	* @input  -
	* @output position all
	* @author Piyasak Srijan
	* @Create Date 2563-09-01
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM dbmc.position 
				WHERE NOT position_level_id = '6'";
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6

	
	/*
	* get_position
	* Get Year from database
	* @input  position id
	* @output position by id
	* @author 	Piyasak Srijan
	* @Create Date 2563-09-01
	*/
	function get_position() {	
		$sql = "SELECT * 
				FROM dbmc.position
				WHERE position.Position_ID=?" ;
		$query = $this->db->query($sql, array($this->pos_id));
		return $query;
	}//get_position

	/*
	* get_position_level
	* Get Year from database
	* @input  -
	* @output position level all data 
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function get_position_level() {	
		$sql = "SELECT * 
				FROM dbmc.position
				left join dbmc.position_level
				on position_level.psl_id = position.position_level_id" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_position_level


	/*
	* get_position_level_by_id
	* Get Year from database
	* @input  position id
	* @output position level by position ID
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function get_position_level_by_id() {	
		$sql = "SELECT * 
				FROM dbmc.position
				left join dbmc.position_level
				on psl_id = position_level_id
				where Position_ID= ?" ;
		$query = $this->db->query($sql, array($this->pos_id));
		return $query;
	}//get_position_level_by_id


	/*
	* get_position_level_by_pls_id
	* Get Year from database
	* @input  position level id
	* @output position level by position level ID
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-12-15
	*/
	function get_position_level_by_pls_id() {	
		$sql = "SELECT * 
				FROM dbmc.position
				left join dbmc.position_level
				on position_level.psl_id = position.position_level_id
				where position_level_id= ?" ;
		$query = $this->db->query($sql, array($this->pos_psl_id));
		return $query;
	}//get_position_level_by_pls_id

	/*
	* get_pos_com_dep
	* Get company position department from database
	* @input  
	* @output company
	* @author Piyasak Srijan
	* @Create Date 2563-04-21
	*/	

	function get_pos_com_dep(){	
		$sql = "SELECT company.Company_shortname,position.Position_name,department.Dep_Name,position.Position_ID,department.Dep_id
				FROM dbmc.department,dbmc.position,dbmc.company
				WHERE company.Company_shortname ='SDM'
				AND NOT position.Position_name = 'No-Data' 
				AND NOT position.Position_name = 'Orther'
				AND NOT position.Position_name = 'President'
				AND NOT position.Position_name = 'Managing Director'
				AND NOT position.Position_name = 'Vice President'
				GROUP BY position.Position_name";
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6
} 
?>

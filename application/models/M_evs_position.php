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

	function get_pos_com_dep($sql_data){	
		$sql = " SELECT *
		FROM dbmc.employee
		LEFT JOIN dbmc.position
		ON employee.Position_ID = position.Position_ID
		LEFT JOIN dbmc.position_level
		ON position.position_level_id = position_level.psl_id
		LEFT JOIN dbmc.sectioncode
		ON employee.Sectioncode_ID = sectioncode.Sectioncode
		LEFT JOIN dbmc.department
		ON sectioncode.dep_id = department.Dep_id
		LEFT JOIN dbmc.company
		ON department.Company_ID = company.Company_ID
        WHERE ".$sql_data."
        GROUP BY  position.Position_ID ";
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6
	
	function get_pos_com_dep_all(){	
		$sql = " SELECT * 
		FROM dbmc.employee 
		LEFT JOIN dbmc.position 
		ON employee.Position_ID = position.Position_ID 
		LEFT JOIN dbmc.position_level 
		ON position.position_level_id = position_level.psl_id 
		LEFT JOIN dbmc.sectioncode 
		ON employee.Sectioncode_ID = sectioncode.Sectioncode 
		LEFT JOIN dbmc.department 
		ON sectioncode.dep_id = department.Dep_id 
		LEFT JOIN dbmc.company 
		ON department.Company_ID = company.Company_ID 
		
				";
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6

	function get_department_by_id(){
		$sql = "SELECT *
		FROM dbmc.department
		WHERE Company_ID = ? ";
			$query = $this->db->query($sql, array($this->Company_ID));
		return $query;
	}//get_department_by_id
	function get_department(){
		$sql = "SELECT *
		FROM dbmc.department";
			$query = $this->db->query($sql);
		return $query;
	}//get_department

	
	function get_position_all(){
		$sql = "SELECT * 
					FROM dbmc.position
				
				";
			$query = $this->db->query($sql);
			return $query;
	}
	function get_com_dep_pos_detail(){
		$sql = "SELECT position.Position_ID,company.Company_name,department.Dep_Name,position.Position_name
		FROM dbmc.employee 
		LEFT JOIN dbmc.position 
		ON employee.Position_ID = position.Position_ID 
		LEFT JOIN dbmc.position_level 
		ON position.position_level_id = position_level.psl_id 
		LEFT JOIN dbmc.sectioncode 
		ON employee.Sectioncode_ID = sectioncode.Sectioncode 
		LEFT JOIN dbmc.department 
		ON sectioncode.dep_id = department.Dep_id 
		LEFT JOIN dbmc.company 
		ON department.Company_ID = company.Company_ID
        WHERE position.Position_ID = ?
        GROUP BY position.Position_ID";
			$query = $this->db->query($sql, array($this->Position_ID));
		return $query;
	}//get_com_dep_pos_detail



}//end Class
?>
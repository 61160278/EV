<?php
/*
* M_evs_data_grade
* set data_grade management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_grade
* set data_grade management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_grade.php");

/*
* M_evs_data_grade
* set data_grade management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_data_grade
* set data_grade management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_data_grade extends Da_evs_data_grade {

	/*
	* get_data_grade_all
	* get data to database
	* @input -
	* @output data data_grade
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_grade";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_data_grade_all

	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Tippawan Aiemsaad
	* @Create Date 2564-04-08
	*/
	function get_by_empID(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_grade
		WHERE dgr_evs_emp_id = ?
		ORDER BY `evs_data_grade`.`dgr_id` ASC";
		$query = $this->db->query($sql, array($this->dgr_evs_emp_id));
		return $query;
	
	}//get_all_com
	
	/*
	* get_data_grade_all
	* get data to database
	* @input -
	* @output data data_grade
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_all_by_year() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_grade
				WHERE dgr_pay_id = ?
				";
        $query = $this->db->query($sql, array($this->dgr_pay_id));
		return $query;
	}
	//get_data_grade_all


} 
?>
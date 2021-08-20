<?php
/*
* M_evs_grade_auto
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_grade_auto
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_grade_auto.php");

/*
* M_evs_grade_auto
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_grade_auto
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_grade_auto extends Da_evs_grade_auto {

	/*
	* get_all
	* get data to database
	* @input -
	* @output data data_mbo_weight
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_grade_auto";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_all

	function get_data_by_pay_id(){	
		$sql = "SELECT *
		FROM evs_database.evs_grade_auto AS grat
		INNER JOIN evs_database.evs_employee AS evs_emp
		ON evs_emp.emp_id = grat.grd_emp_id 
		INNER JOIN dbmc.employee AS emp
		ON evs_emp.emp_employee_id = emp.Emp_ID
		INNER JOIN dbmc.sectioncode AS sec
		ON sec.Sectioncode = emp.Sectioncode_ID
		WHERE evs_emp.emp_pay_id = ?
		ORDER BY evs_emp.emp_employee_id ASC";
		$query = $this->db->query($sql, array($this->emp_pay_id));
		return $query;
	
	}//get_data_show_mhrd

	function delete_emp_id() {
	 	
		$sql = "DELETE FROM evs_database.evs_grade_auto
				WHERE grd_emp_id=?";
		$this->db->query($sql, array($this->grd_emp_id));
	   
	}



} 
?>
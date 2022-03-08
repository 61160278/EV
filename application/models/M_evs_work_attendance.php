<?php
/*
* M_evs_work_attendance
* -
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
include_once("Da_evs_work_attendance.php");

/*
* M_evs_work_attendance
* -
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
 
class M_evs_work_attendance extends Da_evs_work_attendance {

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
				FROM evs_database.evs_work_attendance";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_all

	function get_data_by_pay_id(){	
		$sql = "SELECT *
		FROM evs_database.evs_work_attendance AS work_att
		INNER JOIN evs_database.evs_employee AS evs_emp
		ON evs_emp.emp_id = work_att.wad_emp_id 
		INNER JOIN dbmc.employee AS emp
		ON evs_emp.emp_employee_id = emp.Emp_ID
		WHERE evs_emp.emp_pay_id = ?
		ORDER BY evs_emp.emp_employee_id ASC";
		$query = $this->db->query($sql, array($this->emp_pay_id));
		return $query;
	
	}//get_data_show_mhrd


	function get_data_by_pay_id_and_emp_id(){	
		$sql = "SELECT *
		FROM evs_database.evs_work_attendance AS work_att
		INNER JOIN evs_database.evs_employee AS evs_emp
		ON evs_emp.emp_id = work_att.wad_emp_id 
		INNER JOIN dbmc.employee AS emp
		ON evs_emp.emp_employee_id = emp.Emp_ID
		WHERE evs_emp.emp_pay_id = ? AND wad_emp_id = ?
		ORDER BY evs_emp.emp_employee_id ASC";
		$query = $this->db->query($sql, array($this->emp_pay_id,$this->wad_emp_id));
		return $query;
	
	}//get_data_show_mhrd

	function get_data_by_emp_id() {
		$sql = "SELECT * 
				FROM evs_database.evs_work_attendance
				WHERE wad_emp_id=?";
		$query = $this->db->query($sql, array($this->wad_emp_id));
		return $query;
	}



} 
?>
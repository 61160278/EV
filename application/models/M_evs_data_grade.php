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
	
	}//get_by_empID
	
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


	function get_by_gorup(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_grade as grd
		INNER JOIN evs_database.evs_employee as evs_emp
		ON evs_emp.emp_id = grd.dgr_emp_id
		INNER JOIN evs_database.evs_data_approve as app
		ON app.dma_dtm_emp_id = evs_emp.emp_employee_id
		INNER JOIN dbmc.employee as emp
		on emp.Emp_ID = evs_emp.emp_employee_id
		INNER JOIN evs_database.evs_group as grp		
		on grp.gru_id = evs_emp.emp_gru_id
		INNER JOIN dbmc.group_secname AS gsec 
		ON gsec.Sectioncode = emp.Sectioncode_ID
		INNER JOIN dbmc.position AS pos
		ON pos.Position_ID = emp.Position_ID
		WHERE grp.gru_head_dept = ? AND app.dma_status = ?
		ORDER BY evs_emp.emp_id";
		$query = $this->db->query($sql, array($this->gru_head_dept,$this->dma_status));
		return $query;
	
	}//get_by_empID

	function get_by_approver1(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_grade as grd
		INNER JOIN evs_database.evs_employee as evs_emp
		ON evs_emp.emp_id = grd.dgr_emp_id
		INNER JOIN evs_database.evs_data_approve as app
		ON app.dma_dtm_emp_id = evs_emp.emp_employee_id
		INNER JOIN dbmc.employee as emp
		on emp.Emp_ID = evs_emp.emp_employee_id
		INNER JOIN evs_database.evs_group as grp		
		on grp.gru_id = evs_emp.emp_gru_id
		INNER JOIN dbmc.group_secname AS gsec 
		ON gsec.Sectioncode = emp.Sectioncode_ID
		INNER JOIN dbmc.position AS pos
		ON pos.Position_ID = emp.Position_ID
		WHERE app.dma_approve1 = ? AND app.dma_status = ?
		ORDER BY evs_emp.emp_id";
		$query = $this->db->query($sql, array($this->dma_approve1,$this->dma_status));
		return $query;
	
	}//get_by_approver1

	function get_by_approver2(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_grade as grd
		INNER JOIN evs_database.evs_employee as evs_emp
		ON evs_emp.emp_id = grd.dgr_emp_id
		INNER JOIN evs_database.evs_data_approve as app
		ON app.dma_dtm_emp_id = evs_emp.emp_employee_id
		INNER JOIN dbmc.employee as emp
		on emp.Emp_ID = evs_emp.emp_employee_id
		INNER JOIN evs_database.evs_group as grp		
		on grp.gru_id = evs_emp.emp_gru_id
		INNER JOIN dbmc.group_secname AS gsec 
		ON gsec.Sectioncode = emp.Sectioncode_ID
		INNER JOIN dbmc.position AS pos
		ON pos.Position_ID = emp.Position_ID
		WHERE app.dma_approve2 = ? AND app.dma_status = ?
		ORDER BY evs_emp.emp_id";
		$query = $this->db->query($sql, array($this->dma_approve2,$this->dma_status));
		return $query;
	
	}//get_by_approver2

} 
?>
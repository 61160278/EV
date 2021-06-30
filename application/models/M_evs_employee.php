<?php
/*
* M_evs_employee
* M_evs_employee
* @author 	Kunanya Singmee
* @Create Date 2564-04-06
*/ 
?>
<?php
include_once("Da_evs_employee.php");

class M_evs_employee extends Da_evs_employee {

	/*
	* get_all
	* Get All Employee from database
	* @input  -
	* @output Employee all
	* @author Kunanya Singmee
	* @Create Date 2564-04-06
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM dbmc.position" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6
	
	
	function get_insert(){	
		$sql = "SELECT * 
				FROM dbmc.position";
		$query = $this->db->query($sql);
		return $query;
	}//get_insert WHERE NOT pos_psl_id=6
	
	
	/*
	* get_by_empid
	* Get employee by Emp_ID
	* @input  Emp_ID
	* @output Employee by Emp_ID
	* @author Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function get_by_empid(){	
		$sql = "SELECT * 
				FROM dbmc.employee AS emp
				INNER JOIN dbmc.group_secname AS gsec 
				ON gsec.Sectioncode = emp.Sectioncode_ID
				INNER JOIN dbmc.position AS pos
				ON pos.Position_ID = emp.Position_ID
				INNER JOIN evs_database.evs_employee AS evs_emp
				ON evs_emp.emp_employee_id = emp.Emp_ID
				WHERE emp.Emp_ID=? AND evs_emp.emp_pay_id=?" ;
		$query = $this->db->query($sql,array($this->Emp_ID, $this->emp_pay_id));
		return $query;
	}//get_by_empid
	
		/*
	* get_by_empid
	* Get employee by Emp_ID
	* @input  Emp_ID
	* @output Employee by Emp_ID
	* @author Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function get_by_Empid_group(){	
		$sql = "SELECT * 
				FROM dbmc.employee AS emp
				INNER JOIN dbmc.group_secname AS gsec 
				ON gsec.Sectioncode = emp.Sectioncode_ID
				INNER JOIN dbmc.position AS pos
				ON pos.Position_ID = emp.Position_ID
				INNER JOIN dbmc.sectioncode AS sec
				ON sec.Sectioncode = emp.Sectioncode_ID
				WHERE emp.Emp_ID=?" ;
		$query = $this->db->query($sql,array($this->Emp_ID));
		return $query;
	}//get_by_Empid_group

		/*
	* get_by_appid
	* Get employee by Emp_ID
	* @input  Emp_ID
	* @output Employee by Emp_ID
	* @author Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function get_by_appid(){	
		$sql = "SELECT * 
				FROM dbmc.employee AS emp
				INNER JOIN dbmc.group_secname AS gsec 
				ON gsec.Sectioncode = emp.Sectioncode_ID
				INNER JOIN dbmc.position AS pos
				ON pos.Position_ID = emp.Position_ID
				WHERE emp.Emp_ID=?" ;
		$query = $this->db->query($sql,array($this->Emp_ID));
		return $query;
	}//get_by_appid

		/*
	* get_his_by_id
	* Get employee by get_his_by_id
	* @input  dma_emp_id
	* @output Employee by dma_emp_id
	* @author Kunanya Singmee
	* @Create Date 2564-04-28
	*/
	function get_his_by_id(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_approve AS evs_mbo
				INNER JOIN evs_database.evs_employee AS evs_emp
				ON evs_emp.emp_employee_id = evs_mbo.dma_dtm_emp_id
				INNER JOIN evs_database.evs_pattern_and_year AS evs_pay
				ON evs_pay.pay_id = evs_emp.emp_pay_id
				WHERE evs_mbo.dma_dtm_emp_id=? " ;
		$query = $this->db->query($sql,array($this->dma_dtm_emp_id));
		return $query;
	}//get_his_by_id 

	/*
	* get_empid_group
	* Get employee by Emp_ID
	* @input  Emp_ID
	* @output Employee by Emp_ID
	* @author Tippawan Aiemsaad
	* @Create Date 2564-04-07
	*/
	function get_empid_group(){	
		$sql = "SELECT emp.Emp_ID, emp.Empname_eng, emp.Empsurname_eng, group.Sectioncode_code
				FROM employee AS emp
				INNER JOIN group_secname AS group 
				ON group.Sectioncode = emp.Sectioncode_ID
				WHERE Emp_ID=?" ;
		$query = $this->db->query($sql,array($this->Emp_ID));
		return $query;
	}//get_empid_group

	/*
	* get_all_group
	* Get employee by Emp_ID
	* @input  Emp_ID
	* @output Employee by Emp_ID
	* @author Tippawan Aiemsaad
	* @Create Date 2564-04-07
	*/
	function get_all_group(){	
		$sql = "SELECT *
				FROM group_secname" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all_group
	
	/*
	* get_all_company
	* Get employee by Company_ID
	* @input  Company_ID
	* @output 
	* @author Jirayu Jaravichit
	* @Create Date 2564-04-08
	*/
	function get_all_company(){	
		$sql = "SELECT *
				FROM employee" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all_company	
	
	/*
	* get_all_emp
	* Get employee by Emptype_ID
	* @input  Emptype_ID
	* @output 
	* @author Kanchanaphitcha Meesuk
	* @Create Date 2564-04-09
	*/
	function get_all_emp(){	

		$sql = "SELECT *	
		FROM dbmc.employee	
		left join dbmc.group_secname		
		on group_secname.Sectioncode = employee.Sectioncode_ID
		left join dbmc.position		
		on position.Position_ID = employee.Position_ID
		WHERE Emptype_ID = 5	
		AND Statuswork_ID = 1
		AND Emp_startingdate <= ?" ;
	
		$query = $this->db->query($sql, array($this->Emp_startingdate));
	
	
		return $query;
		}//get_all_emp 

		function get_all_emp_delete(){	

			$sql = "SELECT *	
			FROM evs_database.evs_employee	
			left join dbmc.employee
			on employee.Emp_ID=evs_employee.emp_employee_id 
			left join dbmc.group_secname		
			on group_secname.Sectioncode = evs_employee.emp_section_code_ID
			left join dbmc.position
			on position.Position_ID = evs_employee.emp_position_id
			WHERE emp_pay_id = ?";
			
		
			$query = $this->db->query($sql, array($this->emp_pay_id));
		
		
			return $query;
			}//get_all_emp 
		

		/*
	* get_by_evs_emp_id
	* 
	* @input dta_id
	* @output dta_id, dta_data_acm_name
	* @author jakkarin pimpaeng
	* @update Date 2563-10-26
	*/
	function get_by_evs_emp_id() {	
		$sql = "SELECT * 
				FROM evs_database.evs_employee
				WHERE emp_employee_id=? AND emp_pay_id = ?";
		$query = $this->db->query($sql, array($this->emp_employee_id,$this->emp_pay_id));
		return $query;
	}


	function get_all_by_year(){	

		$sql = "SELECT *	
		FROM evs_database.evs_employee	
		left join dbmc.employee
		on employee.Emp_ID=evs_employee.emp_employee_id 
		left join evs_database.evs_group			
		on evs_group.gru_id = evs_employee.emp_gru_id
		left join evs_database.evs_pattern_and_year			
		on evs_pattern_and_year.pay_id = evs_employee.emp_pay_id
		";
		
	
		$query = $this->db->query($sql);
	
	
		return $query;
		}//get_all_emp 

	
}

?>
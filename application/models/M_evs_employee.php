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
				WHERE Emp_ID=?" ;
		$query = $this->db->query($sql,array($this->Emp_ID));
		return $query;
	}//get_by_empid

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

		

	
}

?>

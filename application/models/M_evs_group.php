<?php
/*
* M_evs_group
* M_evs_group
* @author 	Tippawan Aiemsaad
* @Create Date 2564-04-08
*/ 
?>
<?php
include_once("Da_evs_group.php");

class M_evs_group extends Da_evs_group {
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Tippawan Aiemsaad
	* @Create Date 2564-04-08
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_group" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all WHERE NOT pos_psl_id=6
	
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Tippawan Aiemsaad
	* @Create Date 2564-04-08
	*/
	function get_all_com(){	
		$sql = "SELECT *
				FROM evs_database.evs_group as evg
				LEFT JOIN dbmc.employee as emp ON emp.Emp_ID = evg.gru_head_dept
				WHERE evg.gru_company_id = ? ";
		$query = $this->db->query($sql, array($this->gru_company_id));
		return $query;
	
	}//get_all_com

	function get_by_id(){	
		$sql = "SELECT *
				FROM evs_database.evs_group as evg
				LEFT JOIN dbmc.employee as emp ON emp.Emp_ID = evg.gru_head_dept
				WHERE evg.gru_id = ? ";
		$query = $this->db->query($sql, array($this->gru_id));
		return $query;
	
	}//get_by_id

	

	function get_name_emp_by_IDemp_sdm(){	
		$sql = "SELECT *
				FROM dbmc.employee
				WHERE employee.Emp_ID = ? AND employee.Company_ID = 1";
		$query = $this->db->query($sql, array($this->Emp_ID));
		return $query->result();
	}
	
	function get_name_emp_by_IDemp_skd(){	
		$sql = "SELECT *
				FROM dbmc.employee
				WHERE employee.Emp_ID = ? AND employee.Company_ID = 2";
		$query = $this->db->query($sql, array($this->Emp_ID));
		return $query->result();

	}//get_all_com  INNER JOIN dbmc.employee as emp ON emp.Emp_ID = evg.gru_head_dept
	
	function connect(){
		$sql = "SELECT *
				FROM evs_database.evs_group
				LEFT JOIN dbmc.employee
				ON employee.Emp_ID = evs_group.gru_head_dept";
		$query = $this->db->query($sql);
		return $query;
	}
	// connect

	function get_all_group(){	
		$sql = "SELECT gru_id, gru_name
				FROM evs_database.evs_group as evg
				WHERE evg.gru_company_id = ? ";
		$query = $this->db->query($sql, array($this->gru_company_id));
		return $query;
	
	}//get_all_com


	function get_group(){	
		$sql = "SELECT *
				FROM evs_database.evs_employee as evg
				LEFT JOIN dbmc.employee as em
				ON em.Emp_ID = evg.emp_employee_id
				WHERE evg.emp_gru_id = ? AND emp_pay_id = ?";
		$query = $this->db->query($sql, array($this->emp_gru_id,$this->emp_pay_id));
		return $query;
	
	}//get_group

	function update_group() {
	
		$sql = "UPDATE evs_database.evs_employee 
				SET emp_gru_id = ? 
				WHERE emp_employee_id = ? AND emp_pay_id = ?" ;
	     
	     $this->db->query($sql, array($this->emp_gru_id, $this->emp_employee_id ,$this->emp_pay_id));
	    
	}//update_group

	
	function get_group_by_head_dept(){
		$sql = "SELECT * 
				FROM evs_database.evs_group as gru
				INNER JOIN evs_database.evs_employee as eem
				ON gru.gru_id =  eem.emp_gru_id
				INNER JOIN evs_database.evs_pattern_and_year as pay
				ON pay.pay_id = eem.emp_pay_id
				INNER JOIN dbmc.employee as dem
				ON eem.emp_employee_id =  dem.Emp_ID
				WHERE emp_pay_id = ? AND gru_head_dept = ?
				ORDER BY `dem`.`Emp_ID` ASC";
		$query = $this->db->query($sql, array($this->emp_pay_id, $this->gru_head_dept));
		return $query;
	}

	function get_group_and_name_head_dept(){
		$sql = "SELECT * 
		FROM evs_database.evs_group as gru
		 LEFT JOIN dbmc.employee as dem
		ON gru.gru_head_dept =  dem.Emp_ID
         INNER JOIN evs_database.evs_employee as emem
        ON emem.emp_gru_id = gru.gru_id
        INNER JOIN evs_database.evs_data_approve as dap
         ON emem.emp_id =  dap.dma_emp_id
		 WHERE dma_status = '4'
		 GROUP BY gru_name";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function get_group_by_group_head_dept(){
		$sql = "SELECT * 
				FROM evs_database.evs_group as gru
				INNER JOIN evs_database.evs_employee as eem
				ON gru.gru_id =  eem.emp_gru_id
				INNER JOIN dbmc.employee as dem
				ON eem.emp_employee_id =  dem.Emp_ID
				WHERE emp_pay_id = ? AND gru_head_dept = ? AND gru_name = ?
				ORDER BY `dem`.`Emp_ID` ASC";
		$query = $this->db->query($sql, array($this->emp_pay_id, $this->gru_head_dept, $this->gru_name));
		return $query;
	}


} 
?>
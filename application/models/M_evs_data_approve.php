<?php
include_once("Da_evs_data_approve.php");

class M_evs_data_approve extends Da_evs_data_approve {
	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-26
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_approve" ;
				
		$query = $this->db->query($sql);
		return $query;
	}//get_all 

	function get_by_id(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_approve
				WHERE dma_emp_id = ?" ;
				
		$query = $this->db->query($sql, array($this->dma_emp_id));
		return $query;
	}//get_by_id

	function get_by_emp_and_status(){	
		$sql = "SELECT * 
			FROM evs_database.evs_data_approve AS evs_app
			INNER JOIN evs_database.evs_employee AS evs_emp
			ON evs_emp.emp_employee_id = evs_app.dma_dtm_emp_id
			WHERE evs_emp.emp_employee_id = ? AND evs_app.dma_status = ?" ;
		
	$query = $this->db->query($sql, array($this->emp_employee_id, $this->dma_status));
	return $query;
	}//get_by_emp and status

	function get_by_update(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_approve
				WHERE dma_emp_id = ? AND dma_emp_id=?";
				
		$query = $this->db->query($sql, array($this->dma_emp_id, $this->dma_emp_id));
		return $query;
	}//get_by_id

	function get_by_approver1(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_approve AS evs_app
				INNER JOIN evs_database.evs_employee AS evs_emp
				ON evs_emp.emp_employee_id = evs_app.dma_dtm_emp_id
				INNER JOIN dbmc.employee AS dbmc_emp
				ON dbmc_emp.Emp_ID = evs_app.dma_dtm_emp_id
				INNER JOIN dbmc.group_secname AS gsec 
				ON gsec.Sectioncode = dbmc_emp.Sectioncode_ID
				INNER JOIN dbmc.position AS pos
				ON pos.Position_ID = dbmc_emp.Position_ID
				WHERE dma_approve1 = ? AND evs_emp.emp_pay_id = ? AND evs_app.dma_status = 1" ;
				
		$query = $this->db->query($sql, array($this->dma_approve1, $this->emp_pay_id));
		return $query;
	}//get_by_approver 1 

	function get_by_approver2(){	
		$sql = "SELECT * 
				FROM evs_database.evs_data_approve AS evs_app
				INNER JOIN evs_database.evs_employee AS evs_emp
				ON evs_emp.emp_employee_id = evs_app.dma_dtm_emp_id
				INNER JOIN dbmc.employee AS dbmc_emp
				ON dbmc_emp.Emp_ID = evs_app.dma_dtm_emp_id
				INNER JOIN dbmc.group_secname AS gsec 
				ON gsec.Sectioncode = dbmc_emp.Sectioncode_ID
				INNER JOIN dbmc.position AS pos
				ON pos.Position_ID = dbmc_emp.Position_ID
				WHERE dma_approve2 = ? AND evs_emp.emp_pay_id = ? AND evs_app.dma_status = 2" ;
				
		$query = $this->db->query($sql, array($this->dma_approve1, $this->emp_pay_id));
		return $query;
	}//get_by_approver 2
	
	function update_status() {
	
		$sql = "UPDATE evs_database.evs_data_approve 
				SET dma_status=?
				WHERE dma_dtm_emp_id=?";
	   
	   $this->db->query($sql, array($this->dma_status, $this->dma_dtm_emp_id));
	}



} 
?>
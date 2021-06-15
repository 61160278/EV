<?php
/*
* Da_evs_employee
* Da_evs_employee
* @author Kunanya Singmee
* @Create Date 2564-04-06
*/ 

?>
<?php
include_once("evs_model.php");

/*
* Da_evs_employee
* Da_evs_employee
* @author Kunanya Singmee
* @Create Date 2564-04-06
*/ 

class Da_evs_employee extends evs_model {		
	

	function __construct() {
		parent::__construct();
	}

	/*
	* insert
	* Insert Category into database
	* @input ctg_category_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/

	function insert() {
	 
		$sql = "INSERT INTO evs_database.evs_employee (emp_employee_id,emp_company_id,emp_position_id,emp_section_code_ID,emp_pay_id,emp_gru_id)
				VALUES(?, ?, ? , ? , ? , ?)";
		
		$this->db->query($sql, array($this->emp_employee_id, $this->emp_company_id,$this->emp_position_id,$this->emp_section_code_ID,$this->emp_pay_id,$this->emp_gru_id));
   
	}

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Tippawan Aiemsaad
	* @Create Date 2564-04-8
	*/

	function delete() {
	 	
		$sql = "DELETE FROM evs_database.evs_employee 
	   WHERE  emp_id = ? ";
		$this->db->query($sql, array($this->emp_id));
	}

	

	
}
// Da_evs_employee
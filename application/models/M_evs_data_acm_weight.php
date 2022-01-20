<?php
/*
* M_evs_data_acm_weight
* set data_acm_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_acm_weight
* set data_acm_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_acm_weight.php");

/*
* M_evs_data_acm_weight
* set data_acm_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_data_acm_weight
* set data_acm_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_data_acm_weight extends Da_evs_data_acm_weight {

	/*
	* get_data_acm_weight_all
	* get data to database
	* @input -
	* @output data data_acm_weight
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_data_acm_weight_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_acm_weight";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_data_acm_weight_all

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
		FROM evs_database.evs_data_acm_weight AS acm
		WHERE acm.dta_evs_emp_id = ?
		ORDER BY acm.dta_id ASC";
		$query = $this->db->query($sql, array($this->dta_evs_emp_id));
		return $query;
	
	}//get_by_empID

	function get_by_emp_app(){	
		$sql = "SELECT dta_approver,log_role
				FROM evs_database.evs_data_acm_weight as acm
				INNER JOIN evs_database.evs_login as evslog
				ON evslog.log_user_id = acm.dta_approver
				WHERE acm.dta_evs_emp_id = ?
				GROUP BY acm.dta_approver
				ORDER BY acm.dta_id ASC";
		$query = $this->db->query($sql, array($this->dta_evs_emp_id));
		return $query;
	
	}//get_by_emp_app 	

	function get_by_empID_app2(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_acm_weight AS acm
        INNER JOIN evs_database.evs_data_approve  AS app
        ON app.dma_emp_id = acm.dta_evs_emp_id
		WHERE acm.dta_evs_emp_id = ? AND acm.dta_approver = ?
		ORDER BY acm.dta_id ASC";
		$query = $this->db->query($sql, array($this->dta_evs_emp_id,$this->dta_approver));
		return $query;
	
	}//get_by_empID_app2

	function get_by_empID_app(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_acm_weight AS acm
		WHERE acm.dta_evs_emp_id = ? AND acm.dta_approver = ?
		ORDER BY acm.dta_id ASC";
		$query = $this->db->query($sql, array($this->dta_evs_emp_id,$this->dta_approver));
		return $query;
	
	}//get_by_empID_app
	/*
	* update
	* Update Category into database
	* @input dta_id, dta_data_acm_weight_name
	* @output -
	* @author jakkarin pimpaeng
	* @update Date 2563-10-26
	*/
	function update() {
	
		$sql = "UPDATE evs_database.evs_data_acm_weight 
				SET	 dta_weight=?
				WHERE dta_evs_emp_id=? AND dta_sfa_id=? ";
	   
	   $this->db->query($sql, array( $this->dta_weight, $this->dta_evs_emp_id, $this->dta_sfa_id));
		
	}

} 
?>
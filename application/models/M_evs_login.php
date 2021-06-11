<?php
/*
* Da_evs_login
* login to system
* @author Jakkarin Pimpaeng
* @Create Date 2563-10-4
*/
/*
* M_evs_pattern_and_year
* -
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/

include_once("Da_evs_login.php");

/*
* Da_evs_login
* login to system
* @author Jakkarin Pimpaeng
* @Create Date 2563-10-4
*/
/*
* M_evs_pattern_and_year
* -
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
class M_evs_login extends Da_evs_login {
	
    function check_login() {	
		$sql = "SELECT * 
				FROM evs_database.evs_login AS evs_log
                INNER JOIN evs_database.evs_employee AS evs_emp
				ON evs_emp.emp_employee_id = evs_log.log_user_id
				INNER JOIN evs_database.evs_pattern_and_year AS evs_pay
				ON evs_pay.pay_id = evs_emp.emp_pay_id
				WHERE log_user_id = ? AND log_password = ?";
		$query = $this->db->query($sql, array($this->log_user_id, $this->log_password));
		return $query;
	}

} 
?>
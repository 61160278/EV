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
* Da_evs_login
* login to system
* @author Jakkarin Pimpaeng
* @Update Date 2564-06-11
*/
class M_evs_login extends Da_evs_login {
	
    function check_login() {	
		$sql = "SELECT * 
				FROM evs_database.evs_login AS evs_log
                INNER JOIN evs_database.evs_employee AS evs_emp
				ON evs_emp.emp_employee_id = evs_log.log_user_id
				INNER JOIN evs_database.evs_pattern_and_year AS evs_pay
				ON evs_pay.pay_id = evs_emp.emp_pay_id
                INNER JOIN dbmc.employee AS dbmc_emp
                ON dbmc_emp.Emp_id = evs_emp.emp_employee_id
                left join dbmc.group_secname AS dbmc_sec
                on dbmc_sec.Sectioncode = dbmc_emp.Sectioncode_ID
                left join dbmc.position AS dbmc_pos
                on dbmc_pos.Position_ID = dbmc_emp.Position_ID
				WHERE log_user_id = ? AND log_password = ?";
		$query = $this->db->query($sql, array($this->log_user_id, $this->log_password));
		return $query;
	}

} 
?>